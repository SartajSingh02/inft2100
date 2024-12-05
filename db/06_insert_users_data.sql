-- Insert data into the users table for 50 students
INSERT INTO public.users (user_id, first_name, last_name, email, birth_date, created_at, last_access, password)
VALUES
-- Starting with the names you provided
(100900001, 'Sartaj', 'Singh', 'sartaj.singh@example.com', '2000-01-01', CURRENT_TIMESTAMP, NULL, 'hashed_password_1'),
(100900002, 'Navjot', 'Singh', 'navjot.singh@example.com', '2000-02-02', CURRENT_TIMESTAMP, NULL, 'hashed_password_2'),
(100900003, 'Koyal', 'Sewani', 'koyal.sewani@example.com', '2000-03-03', CURRENT_TIMESTAMP, NULL, 'hashed_password_3'),
(100900004, 'Harmanjot', 'Singh', 'harmanjot.singh@example.com', '2000-04-04', CURRENT_TIMESTAMP, NULL, 'hashed_password_4'),
(100900005, 'Ashok', 'Raj Sapkota', 'ashok.sapota@example.com', '2000-05-05', CURRENT_TIMESTAMP, NULL, 'hashed_password_5'),

-- Continuing with additional students
(100900006, 'Rahul', 'Verma', 'rahul.verma@example.com', '2000-06-06', CURRENT_TIMESTAMP, NULL, 'hashed_password_6'),
(100900007, 'Priya', 'Sharma', 'priya.sharma@example.com', '2000-07-07', CURRENT_TIMESTAMP, NULL, 'hashed_password_7'),
(100900008, 'Rohit', 'Gupta', 'rohit.gupta@example.com', '2000-08-08', CURRENT_TIMESTAMP, NULL, 'hashed_password_8'),
(100900009, 'Pooja', 'Mehta', 'pooja.mehta@example.com', '2000-09-09', CURRENT_TIMESTAMP, NULL, 'hashed_password_9'),
(100900010, 'Vikas', 'Chopra', 'vikas.chopra@example.com', '2000-10-10', CURRENT_TIMESTAMP, NULL, 'hashed_password_10'),

(100900011, 'Sneha', 'Kumar', 'sneha.kumar@example.com', '2000-11-11', CURRENT_TIMESTAMP, NULL, 'hashed_password_11'),
(100900012, 'Ankit', 'Singhal', 'ankit.singhal@example.com', '2000-12-12', CURRENT_TIMESTAMP, NULL, 'hashed_password_12'),
(100900013, 'Simran', 'Kaul', 'simran.kaul@example.com', '2000-01-13', CURRENT_TIMESTAMP, NULL, 'hashed_password_13'),
(100900014, 'Aditya', 'Jain', 'aditya.jain@example.com', '2000-02-14', CURRENT_TIMESTAMP, NULL, 'hashed_password_14'),
(100900015, 'Meghna', 'Rao', 'meghna.rao@example.com', '2000-03-15', CURRENT_TIMESTAMP, NULL, 'hashed_password_15'),

(100900016, 'Amit', 'Kapoor', 'amit.kapoor@example.com', '2000-04-16', CURRENT_TIMESTAMP, NULL, 'hashed_password_16'),
(100900017, 'Neha', 'Aggarwal', 'neha.aggarwal@example.com', '2000-05-17', CURRENT_TIMESTAMP, NULL, 'hashed_password_17'),
(100900018, 'Rishi', 'Bhalla', 'rishi.bhalla@example.com', '2000-06-18', CURRENT_TIMESTAMP, NULL, 'hashed_password_18'),
(100900019, 'Deepak', 'Malhotra', 'deepak.malhotra@example.com', '2000-07-19', CURRENT_TIMESTAMP, NULL, 'hashed_password_19'),
(100900020, 'Snehal', 'Patel', 'snehal.patel@example.com', '2000-08-20', CURRENT_TIMESTAMP, NULL, 'hashed_password_20'),

(100900021, 'Rajesh', 'Kumar', 'rajesh.kumar@example.com', '2000-09-21', CURRENT_TIMESTAMP, NULL, 'hashed_password_21'),
(100900022, 'Divya', 'Batra', 'divya.batra@example.com', '2000-10-22', CURRENT_TIMESTAMP, NULL, 'hashed_password_22'),
(100900023, 'Manish', 'Joshi', 'manish.joshi@example.com', '2000-11-23', CURRENT_TIMESTAMP, NULL, 'hashed_password_23'),
(100900024, 'Surbhi', 'Mahajan', 'surbhi.mahajan@example.com', '2000-12-24', CURRENT_TIMESTAMP, NULL, 'hashed_password_24'),
(100900025, 'Vivek', 'Tiwari', 'vivek.tiwari@example.com', '2000-01-25', CURRENT_TIMESTAMP, NULL, 'hashed_password_25'),

(100900026, 'Aakash', 'Garg', 'aakash.garg@example.com', '2000-02-26', CURRENT_TIMESTAMP, NULL, 'hashed_password_26'),
(100900027, 'Komal', 'Dhingra', 'komal.dhingra@example.com', '2000-03-27', CURRENT_TIMESTAMP, NULL, 'hashed_password_27'),
(100900028, 'Siddharth', 'Nair', 'siddharth.nair@example.com', '2000-04-28', CURRENT_TIMESTAMP, NULL, 'hashed_password_28'),
(100900029, 'Ananya', 'Saxena', 'ananya.saxena@example.com', '2000-05-29', CURRENT_TIMESTAMP, NULL, 'hashed_password_29'),
(100900030, 'Karan', 'Singh', 'karan.singh@example.com', '2000-06-30', CURRENT_TIMESTAMP, NULL, 'hashed_password_30'),

(100900031, 'Lakshay', 'Sharma', 'lakshay.sharma@example.com', '2000-07-31', CURRENT_TIMESTAMP, NULL, 'hashed_password_31'),
(100900032, 'Isha', 'Thakur', 'isha.thakur@example.com', '2000-08-01', CURRENT_TIMESTAMP, NULL, 'hashed_password_32'),
(100900033, 'Nitin', 'Bansal', 'nitin.bansal@example.com', '2000-09-02', CURRENT_TIMESTAMP, NULL, 'hashed_password_33'),
(100900034, 'Arjun', 'Mehra', 'arjun.mehra@example.com', '2000-10-03', CURRENT_TIMESTAMP, NULL, 'hashed_password_34'),
(100900035, 'Pallavi', 'Mishra', 'pallavi.mishra@example.com', '2000-11-04', CURRENT_TIMESTAMP, NULL, 'hashed_password_35'),

(100900036, 'Harsh', 'Goyal', 'harsh.goyal@example.com', '2000-12-05', CURRENT_TIMESTAMP, NULL, 'hashed_password_36'),
(100900037, 'Ravi', 'Chawla', 'ravi.chawla@example.com', '2000-01-06', CURRENT_TIMESTAMP, NULL, 'hashed_password_37'),
(100900038, 'Vandana', 'Bedi', 'vandana.bedi@example.com', '2000-02-07', CURRENT_TIMESTAMP, NULL, 'hashed_password_38'),
(100900039, 'Ashwini', 'Kale', 'ashwini.kale@example.com', '2000-03-08', CURRENT_TIMESTAMP, NULL, 'hashed_password_39'),
(100900040, 'Gaurav', 'Jain', 'gaurav.jain@example.com', '2000-04-09', CURRENT_TIMESTAMP, NULL, 'hashed_password_40'),

(100900041, 'Radhika', 'Sharma', 'radhika.sharma@example.com', '2000-05-10', CURRENT_TIMESTAMP, NULL, 'hashed_password_41'),
(100900042, 'Neeraj', 'Singh', 'neeraj.singh@example.com', '2000-06-11', CURRENT_TIMESTAMP, NULL, 'hashed_password_42'),
(100900043, 'Tanvi', 'Pandey', 'tanvi.pandey@example.com', '2000-07-12', CURRENT_TIMESTAMP, NULL, 'hashed_password_43'),
(100900044, 'Akash', 'Dubey', 'akash.dubey@example.com', '2000-08-13', CURRENT_TIMESTAMP, NULL, 'hashed_password_44'),
(100900045, 'Shivani', 'Chauhan', 'shivani.chauhan@example.com', '2000-09-14', CURRENT_TIMESTAMP, NULL, 'hashed_password_45'),

(100900046, 'Ayush', 'Kumar', 'ayush.kumar@example.com', '2000-10-15', CURRENT_TIMESTAMP, NULL, 'hashed_password_46'),
(100900047, 'Rakesh', 'Bhatt', 'rakesh.bhatt@example.com', '2000-11-16', CURRENT_TIMESTAMP, NULL, 'hashed_password_47'),
(100900048, 'Puneet', 'Malik', 'puneet.malik@example.com', '2000-12-17', CURRENT_TIMESTAMP, NULL, 'hashed_password_48'),
(100900049, 'Kritika', 'Yadav', 'kritika.yadav@example.com', '2000-01-18', CURRENT_TIMESTAMP, NULL, 'hashed_password_49'),
(100900050, 'Zara', 'Wright', 'zara.wright@example.com', '1999-12-31', CURRENT_TIMESTAMP, NULL, 'hashed_password_50');
