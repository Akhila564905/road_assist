CREATE TABLE booking_details (

id INT AUTO_INCREMENT PRIMARY KEY,
service_type VARCHAR(50),
full_name VARCHAR(100),
phone VARCHAR(20),
email VARCHAR(100),
make VARCHAR(100),
model VARCHAR(100),
year INT,
issue_description TEXT,
location VARCHAR(200),
vehicle_image VARCHAR(200),
booking_status VARCHAR(50) DEFAULT 'Pending',
created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP

);
INSERT INTO booking_details 
(service_type,full_name,phone,email,make,model,year,issue_description,location,booking_status)

VALUES

('Emergency Service','Bob Martinez','555-0202','bob@email.com','Ford','F-150',2021,'Complete brake failure on highway. Cannot slow down safely. URGENT!','Highway 101, Mile Marker 42','Accepted'),

('Emergency Service','David Kim','555-0404','david@email.com','BMW','3 Series',2020,'Smoke coming from under hood. Overheating warning light on.','88 Park Blvd, Northside','In Progress'),

('Normal Service','Alex Brown','555-2323','alex@email.com','Ford','F-150',2021,'Flat tyre on highway. Need roadside assistance','Route 24','Pending');