import pandas as pd
import numpy as np
from statsmodels.tsa.arima.model import ARIMA
from statsmodels.tsa.stattools import adfuller
from statsmodels.discrete.count_model import ZeroInflatedPoisson
import warnings
import time
from sklearn.metrics import mean_absolute_error, mean_squared_error

warnings.filterwarnings("ignore")

# Start the timer
start_time = time.time()

# Load the CSV file
file_path = '/home/agila-agatha/htdocs/agila-agatha.com/csv/historical_statistics.csv'
data = pd.read_csv(file_path)

# Function to perform ADF test and return differenced series if not stationary
def ensure_stationarity(series):
    series = pd.Series(series)
    result = adfuller(series)
    
    if result[1] > 0.05:  # p-value greater than 0.05 indicates non-stationarity
        # Apply differencing
        diff_series = series.diff().dropna()
        return diff_series
    return series

# Function to determine the best ARIMA parameters using the Box-Jenkins method
def determine_best_arima(data):
    data = ensure_stationarity(data)
    p = range(0, 4)
    d = range(0, 2)
    q = range(0, 4)
    
    best_aic = float('inf')
    best_order = None
    best_model = None

    for i in p:
        for j in d:
            for k in q:
                try:
                    model = ARIMA(data, order=(i, j, k))
                    model_fit = model.fit()
                    aic = model_fit.aic
                    if aic < best_aic:
                        best_aic = aic
                        best_order = (i, j, k)
                        best_model = model_fit
                except:
                    continue

    return best_order, best_model

# Function to fit and forecast using ARIMA for non-zero values
def forecast_arima_non_zero(data, order):
    model = ARIMA(data, order=order)
    model_fit = model.fit()
    forecast = model_fit.forecast(steps=1)
    forecast_value = max(0, forecast[0])
    return forecast_value, model_fit

results = []

# Unique stations
stations = data['STATION'].unique()

# Get the most recent year and quarter
most_recent_year = data['YEAR'].max()
most_recent_quarter = data[data['YEAR'] == most_recent_year]['QUARTER'].max()

# Determine the last 20 quarters
quarters = ['Q1', 'Q2', 'Q3', 'Q4']
all_quarters = []
for year in range(most_recent_year - 4, most_recent_year + 1):
    for quarter in quarters:
        if year == most_recent_year and quarters.index(quarter) > quarters.index(most_recent_quarter):
            break
        all_quarters.append((year, quarter))

last_20_quarters = all_quarters[-20:]

# Convert last 20 quarters to a DataFrame for easier filtering
last_20_quarters_df = pd.DataFrame(last_20_quarters, columns=['YEAR', 'QUARTER'])

# Summary statistics collection
summary_stats = []

# Forecast the next quarter for each station and each crime type
for station in stations:
    station_data = data[data['STATION'] == station].copy()
    
    # Filter to the last 20 quarters
    station_data = station_data.merge(last_20_quarters_df, on=['YEAR', 'QUARTER'])
    station_data.sort_values(by=['YEAR', 'QUARTER'], inplace=True)
    
    # Define next_year and next_quarter before try-except block
    next_year = station_data['YEAR'].max() + 1 if station_data['QUARTER'].iloc[-1] == 'Q4' else station_data['YEAR'].max()
    next_quarter = 'Q1' if station_data['QUARTER'].iloc[-1] == 'Q4' else 'Q' + str(int(station_data['QUARTER'].iloc[-1][1]) + 1)

    for crime_type in ['MURDER', 'HOMICIDE', 'PHYSICAL INJURIES', 'RAPE', 'ROBBERY', 'THEFT', 'CARNAPPING MV', 'CARNAPPING MC']:
        time_series = station_data[crime_type].values
        
        try:
            # Apply Zero-Inflated Poisson (ZIP) model for zero inflation handling
            endog = time_series
            exog = np.ones_like(endog)  # We can use a simple constant as exog

            if len(endog) > 1:  # Ensure there are enough values to fit the model
                zip_model = ZeroInflatedPoisson(endog, exog).fit(disp=False)
                zero_prob = zip_model.predict(np.ones(1), which='prob-zero')[0]
                non_zero_prob = 1 - zero_prob

                # Separate the non-zero part for ARIMA
                non_zero_part = endog[endog > 0]
                
                # Determine the best ARIMA parameters for the non-zero part
                if len(non_zero_part) > 1:
                    best_params, best_model = determine_best_arima(non_zero_part)
                    if best_params is not None:
                        # Forecast using the best parameters
                        forecasted_value, model_fit = forecast_arima_non_zero(non_zero_part, best_params)
                        
                        # Calculate performance metrics
                        fitted_values = model_fit.fittedvalues
                        mae = mean_absolute_error(non_zero_part, fitted_values)
                        rmse = mean_squared_error(non_zero_part, fitted_values, squared=False)
                        mape = np.mean(np.abs((non_zero_part - fitted_values) / non_zero_part)) * 100
                        
                        # Collect summary statistics
                        summary_stats.append({
                            'STATION': station,
                            'CRIME_TYPE': crime_type,
                            'ARIMA_ORDER': best_params,
                            'AIC': model_fit.aic,
                            'Log Likelihood': model_fit.llf,
                            'Coefficients': model_fit.params,
                            'Std Err': model_fit.bse,
                            'z': model_fit.tvalues,
                            'P>|z|': model_fit.pvalues,
                            'MAE': mae,
                            'RMSE': rmse,
                            'MAPE': mape
                        })
                    else:
                        forecasted_value = 0
                else:
                    forecasted_value = 0

                # Combine the zero inflation and ARIMA results
                combined_forecast = zero_prob * 0 + non_zero_prob * forecasted_value
            else:
                combined_forecast = 0
            
            # Prepare the result row
            result = {
                'YEAR': next_year,
                'QUARTER': next_quarter,
                'STATION': station,
                crime_type: int(round(combined_forecast))
            }
            results.append(result)
        
        except Exception as e:
            print(f"Error with ARIMA for {crime_type} at {station}: {e}")
            result = {
                'YEAR': next_year,
                'QUARTER': next_quarter,
                'STATION': station,
                crime_type: 0
            }
            results.append(result)

# Convert results to DataFrame
forecasted_df = pd.DataFrame(results)

# Debugging: Print the first few rows and column names
print("First few rows of the results dataframe:")
print(forecasted_df.head())

print("Column names of the results dataframe:")
print(forecasted_df.columns)

# Check if the necessary columns are present
if 'YEAR' not in forecasted_df.columns or 'QUARTER' not in forecasted_df.columns or 'STATION' not in forecasted_df.columns:
    raise KeyError("One or more required columns are missing from the forecasted dataframe")

# Merge forecasted values to get one row per station with all crime types
forecasted_df = forecasted_df.groupby(['YEAR', 'QUARTER', 'STATION']).first().reset_index()

# Fill in missing columns with zeros (for columns without forecasted data)
for column in data.columns:
    if column not in forecasted_df.columns:
        forecasted_df[column] = 0

# Reorder columns to match the original data
forecasted_df = forecasted_df[data.columns]

# Ensure no decimal points
forecasted_df = forecasted_df.applymap(lambda x: int(x) if isinstance(x, float) else x)

output_file_path = '/home/agila-agatha/htdocs/agila-agatha.com/csv/forecasted_crimes.csv'
forecasted_df.to_csv(output_file_path, index=False)

print("Forecasted data saved to:", output_file_path)

summary_stats_text = ""
summary_stats_text += "\nSummary Statistics:\n"
for stat in summary_stats:
    summary_stats_text += f"\nStation: {stat['STATION']}, Crime Type: {stat['CRIME_TYPE']}\n"
    summary_stats_text += f"ARIMA Order: {stat['ARIMA_ORDER']}\n"
    summary_stats_text += f"AIC: {stat['AIC']}\n"
    summary_stats_text += f"Log Likelihood: {stat['Log Likelihood']}\n"
    summary_stats_text += f"Coefficients: {stat['Coefficients']}\n"
    summary_stats_text += f"Std Err: {stat['Std Err']}\n"
    summary_stats_text += f"z: {stat['z']}\n"
    summary_stats_text += f"P>|z|: {stat['P>|z|']}\n"
    summary_stats_text += f"MAE: {stat['MAE']}\n"
    summary_stats_text += f"RMSE: {stat['RMSE']}\n"
    summary_stats_text += f"MAPE: {stat['MAPE']}\n"

print(summary_stats_text)

with open('/home/agila-agatha/htdocs/agila-agatha.com/csv/ARIMA_statistics.txt', 'w') as file:
    file.write(summary_stats_text)

end_time = time.time()
duration = end_time - start_time
print(f"\nScript duration: {int(duration)} seconds")