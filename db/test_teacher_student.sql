
-- DROP'student tables clear out any existing data
DROP TABLE IF EXISTS student;
DROP TABLE IF EXISTS teacher;

-- CREATE the table, note that id has to be unique, and you must have a name
CREATE TABLE student(
	sid INTEGER PRIMARY KEY,
	firstname VARCHAR(20) NOT  NULL,
	lastname  VARCHAR(20) NOT  NULL,
	age INTEGER,
	teacher_num INTEGER
);
INSERT INTO student(sid, firstname,lastname,age,teacher_num) VALUES(
	9000,
	'George','Michael',30,1001);
INSERT INTO student(sid, firstname,lastname,age,teacher_num) VALUES(
	9001,
	'John','Wang',23,1003);
INSERT INTO student(sid, firstname,lastname,age,teacher_num) VALUES(
	9002,
	'Chong','Lee',27,1000);
INSERT INTO student(sid, firstname,lastname,age,teacher_num) VALUES(
	9003,
	'Maria','Khan',25,1000);
INSERT INTO student(sid, firstname,lastname,age,teacher_num) VALUES(
	9004,
	'Pearson','Zig',29,1004);

-- CREATE the Teacher
CREATE TABLE teacher(
	teacher_num INTEGER PRIMARY KEY,
	 firstname VARCHAR(20) NOT  NULL,
	lastname  VARCHAR(20) NOT  NULL,
	subject VARCHAR(35) NOT NULL
);

INSERT INTO teacher(teacher_num, firstname, lastname, subject) 
VALUES(
	1004,
	'Roger','More','Java Programming');
	
INSERT INTO teacher(teacher_num, firstname, lastname, subject) 
VALUES	(1003,
	'Sanjay','Bali','PHP Programming');
INSERT INTO teacher(teacher_num, firstname, lastname, subject)  VALUES(
	1002,
	'Raaj','Ze','c++ for beginner');
INSERT INTO teacher(teacher_num, firstname, lastname, subject) VALUES(
	1001,
	'Alfred','Long','xhtml for beginner');
