import sys
import json
import pandas as pd
from sklearn.ensemble import RandomForestClassifier
from sklearn.model_selection import train_test_split

# ✅ Load dataset
data = pd.read_csv("vehicle_breakdown_dataset_500.csv")

# ✅ Features (MUST MATCH CSV & PHP ORDER)
features = [
    "vehicle_type","brand","fuel_type","vehicle_age",
    "days_since_last_service","daily_usage_km","total_km_driven","service_history",
    "road_type","traffic_level","weather_condition",
    "engine_overheating","abnormal_sound","starting_trouble","brake_issue","smoke","vibration",
    "engine_temperature","battery_voltage","oil_level","tire_pressure","fuel_efficiency",
    "battery_health","charging_cycles","motor_efficiency"
]

# ✅ Target
target = "breakdown_risk"

X = data[features]
y = data[target]

# ✅ Train model
model = RandomForestClassifier(n_estimators=150, random_state=42)
model.fit(X, y)

# ✅ GET INPUT FROM PHP
try:
    input_values = list(map(float, sys.argv[1:]))  # 25 values
except:
    print(json.dumps({"error": "Invalid input"}))
    sys.exit()

if len(input_values) != 25:
    print(json.dumps({"error": "Expected 25 parameters"}))
    sys.exit()

# ✅ Prediction
prediction = model.predict([input_values])[0]
probability = model.predict_proba([input_values])[0][1]

# ✅ Output JSON
result = {
    "risk": "HIGH" if prediction == 1 else "LOW",
    "probability": round(probability * 100, 2)
}

print(json.dumps(result))