-- SARTAJ SINGH
-- 03_CREATE_COURSES_TABLE
-- 10 OCTOBER 2024
-- INFT 2100

-- Create the courses table with a course_description field
CREATE TABLE courses (
    course_code CHAR(50) PRIMARY KEY,        -- 50-character course code as the primary key
    course_name VARCHAR(100) NOT NULL,      -- Name of the course
    course_description TEXT,               -- Description of the course
    semester INT NOT NULL                  -- Semester in which the course is offered
);
