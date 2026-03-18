import pandas as pd
from sklearn.ensemble import RandomForestClassifier
import pickle

# Load dataset
data = pd.read_csv("vehicle_breakdown_dataset_500.csv")

features = [
    "vehicle_type","brand","fuel_type","vehicle_age",
    "days_since_last_service","daily_usage_km","total_km_driven","service_history",
    "road_type","traffic_level","weather_condition",
    "engine_overheating","abnormal_sound","starting_trouble","brake_issue","smoke","vibration",
    "engine_temperature","battery_voltage","oil_level","tire_pressure","fuel_efficiency",
    "battery_health","charging_cycles","motor_efficiency"
]

X = data[features]
y = data["breakdown_risk"]

# Better model settings (IMPORTANT for accuracy)
model = RandomForestClassifier(
    n_estimators=200,
    max_depth=10,
    random_state=42
)

model.fit(X, y)

# Save model
pickle.dump(model, open("model.pkl", "wb"))

print("✅ Model trained and saved as model.pkl")