USE vehassitancemsdb;
CREATE TABLE booking_history (
id INT AUTO_INCREMENT PRIMARY KEY,
vehicle_name VARCHAR(100),
issue TEXT,
status VARCHAR(50),
booking_type VARCHAR(50),
created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
INSERT INTO booking_history (vehicle_name, issue, status, booking_type) VALUES
('Camry','Tyre puncture','Pending','Normal'),
('Malibu','Check engine light','Accepted','Normal'),
('F-150','Brake failure emergency','Completed','Emergency');