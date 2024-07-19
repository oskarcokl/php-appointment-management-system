-- init_db.sql

DROP TABLE IF EXISTS users;

CREATE TABLE IF NOT EXISTS users (
    id SERIAL PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    surname VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    phone VARCHAR(20) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Insert initial data
INSERT INTO users (name, surname, password, email, phone) VALUES
('admin', 'admin', '$2y$10$p639U4uXnqykwjGNhW5uceFWWt8Ji9VLfCd2m48rXw9FY7v0YH2cW%', 'admin@example.com', '123123123'),
('John', 'Doe', '$2y$10$p639U4uXnqykwjGNhW5uceFWWt8Ji9VLfCd2m48rXw9FY7v0YH2cW%', 'user@example.com', '123123123');
