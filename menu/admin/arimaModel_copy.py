import pandas as pd
import numpy as np
from statsmodels.tsa.arima.model import ARIMA
from statsmodels.tsa.stattools import adfuller
import statsmodels.api as sm
import warnings

warnings.filterwarnings("ignore")


# Load the CSV file
current_dir = os.path.dirname(__file__)
csv_folder = os.path.join(current_dir, '..', 'csv')
file_path = os.path.join(csv_folder, 'historical_statistics.csv')
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
                except:
                    continue

    return best_order

# Function to fit and forecast using ARIMA for non-zero values
def forecast_arima_non_zero(data, order):
    model = ARIMA(data, order=order)
    model_fit = model.fit()
    forecast = model_fit.forecast(steps=1)
    forecast_value = max(0, forecast[0])
    return forecast_value

# Prepare the results dataframe
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
            # Split the data into zero and non-zero components
            zero_part = (time_series == 0).astype(int)
            non_zero_part = time_series[time_series > 0]
            
            # Fit a logistic regression for zero inflation
            zero_model = sm.Logit(zero_part, np.ones_like(zero_part)).fit(disp=False)
            zero_prob = zero_model.predict(np.ones(1))[0]
            
            # Determine the best ARIMA parameters for the non-zero part
            if len(non_zero_part) > 1:  # Ensure there are enough non-zero values to fit the model
                best_params = determine_best_arima(non_zero_part)
                if best_params is not None:
                    # Forecast using the best parameters
                    forecasted_value = forecast_arima_non_zero(non_zero_part, best_params)
                else:
                    forecasted_value = 0
            else:
                forecasted_value = 0
            
            # Combine the zero inflation and ARIMA results
            combined_forecast = zero_prob * 0 + (1 - zero_prob) * forecasted_value
            
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

# Save the forecasted data to a CSV file
output_file_path = os.path.join(csv_folder, 'forecasted_crimes.csv')
forecasted_df.to_csv(output_file_path, index=False)

print("Forecasted data saved to:", output_file_path)