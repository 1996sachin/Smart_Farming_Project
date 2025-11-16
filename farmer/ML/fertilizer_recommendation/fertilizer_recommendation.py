import pandas as pd
import joblib
import numpy as np
import matplotlib.pyplot as plt
from sklearn.metrics import classification_report
from sklearn.metrics import confusion_matrix
from sklearn.metrics import cohen_kappa_score
from sklearn import metrics
from sklearn import tree
import sys
import json
import warnings
from sklearn.preprocessing import LabelEncoder, OneHotEncoder
warnings.filterwarnings('ignore')

# Arguments are now passed in training data order:
# 1. Temperature, 2. Humidity, 3. Soil Moisture, 4. Soil Type, 5. Crop Type, 6. Nitrogen, 7. Potassium, 8. Phosphorous
jsont = sys.argv[1]
jsonh = sys.argv[2]
jsonsm = sys.argv[3]
jsonsoil = sys.argv[4]
jsoncrop = sys.argv[5]
jsonn = sys.argv[6]
jsonk = sys.argv[7]
jsonp = sys.argv[8]

t_params = json.loads(jsont)
h_params = json.loads(jsonh)
sm_params = json.loads(jsonsm)
n_params = json.loads(jsonn)
k_params = json.loads(jsonk)
p_params = json.loads(jsonp)

# Decode JSON strings for soil and crop
soil_type = json.loads(jsonsoil)
crop_type = json.loads(jsoncrop)

# Load the label encoders for soil type and crop type
with open('ML/fertilizer_recommendation/label_encoder.pkl', 'rb') as f:
    le_soil, le_crop = joblib.load(f)

# Check if soil type and crop type are in the encoder's classes
if soil_type not in le_soil.classes_:
    print("ERROR: Soil type '{}' not found in training data. Available types: {}".format(soil_type, list(le_soil.classes_)), file=sys.stderr)
    sys.exit(1)

if crop_type not in le_crop.classes_:
    print("ERROR: Crop type '{}' not found in training data. Available types: {}".format(crop_type, list(le_crop.classes_)), file=sys.stderr)
    sys.exit(1)

# Perform label encoding on soil type and crop type
st_encoded = le_soil.transform([soil_type])[0]
c_encoded = le_crop.transform([crop_type])[0]

# Load the model
with open('ML/fertilizer_recommendation/fertilizerrecommendation.pkl', 'rb') as f:
    fm = joblib.load(f)

# Prepare data array - Order MUST match training data:
# Training data order: [Temparature, Humidity, Soil Moisture, Soil Type, Crop Type, Nitrogen, Potassium, Phosphorous]
# So the correct order is: [t_params, h_params, sm_params, st_encoded, c_encoded, n_params, k_params, p_params]
data = np.array([[t_params, h_params, sm_params, st_encoded, c_encoded, n_params, k_params, p_params]])

# Debug: Print input values to stderr (won't affect output)
print("DEBUG: Input values - T={}, H={}, SM={}, Soil={}({}), Crop={}({}), N={}, K={}, P={}".format(
    t_params, h_params, sm_params, soil_type, st_encoded, crop_type, c_encoded, n_params, k_params, p_params
), file=sys.stderr)

# Get prediction
prediction = fm.predict(data)

# Also get prediction probabilities to see confidence scores
if hasattr(fm, 'predict_proba'):
    probabilities = fm.predict_proba(data)[0]
    class_names = fm.classes_
    # Get top 3 predictions
    top_indices = probabilities.argsort()[-3:][::-1]
    print("DEBUG: Top 3 predictions:", file=sys.stderr)
    for idx in top_indices:
        print("  {}: {:.2%}".format(class_names[idx], probabilities[idx]), file=sys.stderr)
    print("DEBUG: Selected prediction: {} with {:.2%} confidence".format(
        prediction[0], probabilities[class_names == prediction[0]][0]
    ), file=sys.stderr)
else:
    print("DEBUG: Model does not support predict_proba", file=sys.stderr)

print(str(prediction[0]))


