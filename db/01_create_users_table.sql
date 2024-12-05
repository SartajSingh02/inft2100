--- SARTAJ SINGH
-- 01_CREATE_USERS_TABLE
-- 10 OCTOBER 2024
-- INFT2100

-- Create the users table
CREATE TABLE users (
    user_id BIGINT PRIMARY KEY,            -- Primary key for the users table
    first_name TEXT NOT NULL,              -- First name of the user
    last_name TEXT NOT NULL,               -- Last name of the user
    email VARCHAR(100) UNIQUE NOT NULL,    -- Email address (unique)
    birth_date DATE NOT NULL,              -- Date of birth
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP, -- Date and time when the user was created
    last_access TIMESTAMP,                 -- Last access time
    password VARCHAR(255) NOT NULL         -- Hashed password
);
