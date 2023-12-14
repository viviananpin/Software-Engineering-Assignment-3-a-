-- Create database
CREATE DATABASE shop_db;

-- Select database
USE shop_db;

-- Create users table
CREATE TABLE users (
  id INT(11) PRIMARY KEY AUTO_INCREMENT,
  username VARCHAR(100) UNIQUE NOT NULL,
  password VARCHAR(255) NOT NULL,
  role ENUM('customer', 'manager', 'logistics') NOT NULL
);

-- Create some sample data
--INSERT INTO users (username, password, role) VALUES
--  ('john', '$2y$10$MWFmMjNkMGNkZWRhNmRkOOX6aUC8WnNvZnNoYS5zdWJTZHZCV1dN.', 'customer'),
--  ('mary', '$2y$10$zlL9tyB7XdORwB2ofvAKA.VTOxd0S658mBAXx2IiEsimkCEe1XCA6', 'manager'),
--  ('peter', '$2y$10$ctJTxAMrsLS4Nq9ba46g0.eR6Hr7p4inRu6rTGWKwAsPKfQFWXKju', 'logistics');
