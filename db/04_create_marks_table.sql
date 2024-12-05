-- SARTAJ SINGH
-- 04_CREATE_MARKS_TABLE
-- 10 OCTOBER 2024
-- INFT2100

-- Create the marks table
CREATE TABLE marks (
    student_id INT REFERENCES students(student_id) ON DELETE CASCADE,  -- Foreign key with cascade delete
    course_code CHAR(50) REFERENCES courses(course_code) ON DELETE CASCADE,  -- Foreign key with cascade delete
    final_mark INT CHECK (final_mark >= 0 AND final_mark <= 100),  -- Grade must be between 0 and 100
    achieved_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,  -- Automatically store the timestamp of when the grade was inserted
    PRIMARY KEY (student_id, course_code)  -- Composite primary key (student_id, course_code)
);
