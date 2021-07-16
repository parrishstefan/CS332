<?php
	$servername = "mariadb";
	$username = "cs332d9";
	$password = "azi2ceeC";
	$dbname = "cs332d9";

	$db = new mysqli($servername, $username, $password, $dbname);
	
	if ($db->connect_error) {
		die("Connection failed: " . $db->connect_error);
	}

	$teacher_ssn = $_POST["SocialNum"];
	
	$teacher = "SELECT TITLE, FNAME, LNAME FROM PROFESSOR";
	$teacher_result = $db->query($teacher);	
	$name = $teacher_result->fetch_assoc();

	$sql = "SELECT C.TITLE, CS.CLASSROOM, CS.MEETING_DAYS, START_TIME, END_TIME ";
	$sql .= "FROM PROFESSOR P, COURSE C, COURSE_SECTION CS ";
	$sql .= "WHERE P.SSN = $teacher_ssn AND PROF_SN = SSN AND SECTION_NUM = COURSE_NUM"; 

	$result = $db->query($sql);

	echo "<h1>" . $name["TITLE"] . " " . $name["FNAME"] . " " . $name["LNAME"] . "</h1>";
	echo "<h4>Professor SSN: " . $teacher_ssn . "</h4>";
	
	echo "<table border='1'>
	<tr>
	<th>Course Title</th>
	<th>Classroom</th>
	<th>Meeting Days</th>
	<th>Start Time</th>
	<th>End Time</th>
	</tr>";
	
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			echo "<tr>";
			echo "<td>" . $row["TITLE"] . "</td>";
			echo "<td>" . $row["CLASSROOM"] . "</td>";
			echo "<td>" . $row["MEETING_DAYS"] . "</td>";
			echo "<td>" . $row["START_TIME"] . "</td>";
			echo "<td>" . $row["END_TIME"] . "</td>";
			echo "</tr>";
		}
	}
	
	echo "</table>";

	$db->close();

?>

