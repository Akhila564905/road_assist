USE vehassitancemsdb;

CREATE TABLE prediction_history (
id INT AUTO_INCREMENT PRIMARY KEY,
vehicle_name VARCHAR(100),
fuel_type VARCHAR(50),
location VARCHAR(100),
risk_level VARCHAR(50),
risk_percent INT,
created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
INSERT INTO prediction_history (vehicle_name,fuel_type,location,risk_level,risk_percent) VALUES
('Toyota','Petrol','City','High',85),
('Honda','Petrol','Highway','High',75);