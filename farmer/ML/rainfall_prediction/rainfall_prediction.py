import pandas as pd
import sys

# Load the dataset into a dataframe
df = pd.read_csv('ML/rainfall_prediction/climate_data.csv')

# Define a function to predict rainfall for a given district and month
def predict_rainfall(district, month):
    # Filter the dataframe to only include rows with the given district
    district_data = df[df['DISTRICT'] == district]

    # Calculate the average rainfall for the given month across all the years
    avg_rainfall = district_data[month].mean()
    
    # Return the predicted rainfall for the given month
    return avg_rainfall

# Get the input parameters as command line arguments
Jregion = sys.argv[1]
Jmonth = sys.argv[2]

#predicted_rainfall = predict_rainfall('Arghankhanchi', 'JAN')

predicted_rainfall = predict_rainfall(Jregion, Jmonth)
print(predicted_rainfall)


