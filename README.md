# Task Manager App

## Description
Simple PHP and MySQL task management application with authentication.

## Installation
1. Import the provided SQL structure:
   ```sql
   CREATE TABLE users (
       id INT AUTO_INCREMENT PRIMARY KEY,
       username VARCHAR(50) UNIQUE,
       password VARCHAR(255)
   );

   CREATE TABLE tasks (
       id INT AUTO_INCREMENT PRIMARY KEY,
       title VARCHAR(255),
       user_id INT
   );
