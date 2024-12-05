<html>
<head>
<title>Student and Subjects</title>
</head>
<body>
<center>
<p>
This page utilizes several postgreSQL method calls.  Such as pg_connect(),
pg_query(), and pg_fetch_result().
</p>
<!-- setup the table -->
<table border="1" width="75%">
	<tr><th width="50%">Student</th><th width="15%">ID</th><th width="35%">Subject</th></tr>

<?php
$output = ""; //Set up a variable to store the output of the loop 
//connect
$conn = pg_connect("host=127.0.0.1 dbname=YOUR_DB_NAME user=YOUR_USER_ID password=YOUR_DB_PASSWORD" );  
//N.B. replace the YOUR variables with your specific information
//NOTE: "host=localhost..." SHOULD work, but there is a problem with the config on opentech, use 127.0.0.1 instead

//issue the query
$sql = "SELECT student.firstname, student.sid, teacher.subject
			FROM student, teacher
			WHERE student.teacher_num=teacher.teacher_num
			ORDER BY student.sid ASC";
	$result = pg_query($conn, $sql);
	$records = pg_num_rows($result);

//generate the table
	for($i = 0; $i < $records; $i++){  //loop through all of the retrieved records and add to the output variable
		$output .= "\n\t<tr>\n\t\t<td>".pg_fetch_result($result, $i, "firstname")."</td>"; 
		$output .= "\n\t\t<td>".pg_fetch_result($result, $i, "sid")."</td>"; 
		$output .= "\n\t\t<td>".pg_fetch_result($result, $i, "subject")."</td>\n\t</tr>"; 
	}

	echo $output; //display the output
?>
</table>
<!-- end the table -->
</center>
</body>
</html>
