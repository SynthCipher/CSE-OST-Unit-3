-- 1. Create the Database
CREATE DATABASE IF NOT EXISTS college;

-- 2. Use the Database
USE college;

-- 3. Create the Students Table
CREATE TABLE IF NOT EXISTS students (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    roll_no VARCHAR(20) NOT NULL,
    course VARCHAR(50) DEFAULT 'BCA',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- 4. Insert Sample Data
INSERT INTO students (name, roll_no, course) VALUES 
('Rahul Sharma', 'PL-001', 'BCA'),
('Ali Khan', 'PL-002', 'MCA');

-- 5. Show the Data
SELECT * FROM students;
