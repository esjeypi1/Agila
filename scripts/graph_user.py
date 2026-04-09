import pandas as pd
import json
import os

# Read the CSV file
file_path = '/csv/5year_quarter.csv'
data = pd.read_csv(file_path)

# Initialize the structure for the JSON data
json_data = {}

# Extract the unique years and quarters
data['Year'] = data['Quarter'].apply(lambda x: x.split()[0])
data['Quarter'] = data['Quarter'].apply(lambda x: x.split()[1])
years = data['Year'].unique()
quarters = data['Quarter'].unique()

# Prepare data for each year and quarter
for year in years:
    json_data[year] = {}
    for quarter in quarters:
        quarter_data = data[(data['Year'] == year) & (data['Quarter'] == quarter)]
        json_data[year][quarter] = {
            "labels": quarter_data['Station'].tolist(),
            "datasets": []
        }

        # Create datasets for each crime type
        crime_types = ["MURDER", "HOMICIDE", "PHYSICAL INJURIES", "RAPE", "ROBBERY", "THEFT", "CARNAPPING MV", "CARNAPPING MC"]
        for crime in crime_types:
            dataset = {
                "label": crime,
                "data": quarter_data[crime].tolist(),
                "fill": False
            }
            json_data[year][quarter]["datasets"].append(dataset)

output_dir = '/menu/user'
os.makedirs(output_dir, exist_ok=True)

# Save the JSON data to a file
output_file_path = os.path.join(output_dir, 'data.json')
with open(output_file_path, 'w') as json_file:
    json.dump(json_data, json_file, indent=4)

output_file_path
