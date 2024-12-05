-- SARTAJ SINGH
-- 02_CREATE_STUDENTS_TABLE
-- 10 OCTOBER 2024
-- INFT2100

CREATE TABLE students (
    student_id SERIAL PRIMARY KEY,          -- Unique ID for each student
    user_id BIGINT NOT NULL,                -- Foreign key referencing the user_id in the users table
    program_code VARCHAR(20) NOT NULL,      -- Program code for the student
 
    -- Define the foreign key relationship to the users table
    FOREIGN KEY (user_id) 
        REFERENCES users(user_id)           -- Ensures that user_id exists in the users table
);
