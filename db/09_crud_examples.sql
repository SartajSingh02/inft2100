-- Insert new users into the users table
INSERT INTO users (user_id, first_name, last_name, email, birth_date, password)
VALUES 
(100900061, 'Pranav', 'Papneja', 'Pranav.p@example.com', '2004-03-25', 'hashed_password_61'), 
(100900062, 'Anjal', 'Kafle', 'analkfle@example.com', '2005-01-01', 'hashed_password_63'); 

-- Select all users
SELECT * FROM users;

-- Select a user based on their email
SELECT * FROM users WHERE email = 'sambhav.multani@example.com';

-- Select user's first_name, last_name, email by user_id
SELECT first_name, last_name, email FROM users WHERE user_id = 100900064;

-- Select users ordered by last_access
SELECT first_name, last_name, user_id, created_at, last_access 
FROM users
ORDER BY last_access DESC;

-- Update last_access timestamp for a user
UPDATE users
SET last_access = CURRENT_TIMESTAMP
WHERE user_id = 100900064;

-- Update first_name for a user by email
UPDATE users
SET first_name = 'Devanshu'
WHERE email = 'sambhav.multani@example.com';

-- Delete a user based on user_id
DELETE FROM users WHERE user_id = 100900064;

-- Delete a user based on first_name and last_name
DELETE FROM users WHERE first_name = 'sambhav' AND last_name = 'multani';

-- Insert a new course into the courses table
INSERT INTO courses (course_code, course_name, course_description, semester) 
VALUES ('INFT 4100', 'Advanced Web Development', 'Advanced in web development', 5);

-- Select students with marks greater than 80
SELECT student_id, course_code, final_mark 
FROM marks 
WHERE final_mark > 80;


-- Update the course description for INFT 4100
UPDATE courses
SET course_description = 'Techniques in web development and frameworks'
WHERE course_code = 'INFT 4100';

-- Delete a student based on student_id
DELETE FROM students WHERE student_id = 3;

