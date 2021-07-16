<?php
	$servername="mariadb";
	$username="cs332d9";
	$password="azi2ceeC";
	$dbname="cs332d9";

	$db = new mysqli($servername, $username, $password, $dbname);
	if ($db->connection_error) {
		die("Connection failed: " . $db->connect_error);
	}

	$course_num = $_POST['CourseNum'] ?? '';

	$query = "SELECT C.COURSE_NUM, CS.COURSE_NO, CS.CLASSROOM, CS.MEETING_DAYS, CS.START_TIME, CS.END_TIME, COUNT(*) AS NUM_OF_STUDENT ";
	$query .= "FROM COURSE C, COURSE_SECTION CS, ENROLLMENT E ";
	$query .= "WHERE C.COURSE_NUM = $course_num AND C.COURSE_NUM = CS.SECTION_NUM AND C.COURSE_NUM = E.SEC_NUM AND CS.COURSE_NO = E.C_NUM ";
	$query .= "GROUP BY E.C_NUM, E.SEC_NUM";

	$data = $db->query($query);
	
	echo "<h4>Course Number: " . $course_num . "</h4>";	
	
	
	echo "<table border='1'>
	<tr>
	<th>Section</th>
	<th>Classroom</th>
	<th>Meet Days</th>
	<th>Start Time</th>
	<th>End Time</th>
	<th># Enrolled</th>
	</tr>";
	echo "<tr>";
	
	if ($data->num_rows > 0) {
		while($row = $data->fetch_assoc()) {
			echo "<tr>";
			echo "<td>" . $row["COURSE_NO"] . "</td>";
			echo "<td>" . $row["CLASSROOM"] . "</td>";
			echo "<td>" . $row["MEETING_DAYS"] . "</td>";
			echo "<td>" .$row["START_TIME"] . "</td>";
			echo "<td>" .$row["END_TIME"] . "</td>";
			echo "<td>" . $row["NUM_OF_STUDENT"] . "</td>";
			echo "</tr>";
		}
	}
	echo "</table>";

	$db->close();
?>
