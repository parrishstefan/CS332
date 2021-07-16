<?php
	$servername = "mariadb";
	$username = "cs332d9";
	$password = "azi2ceeC";
	$dbname = "cs332d9";

	$db = new mysqli($servername, $username, $password, $dbname);

	$course_number = $_POST["CourseNum2"];
	$section_number = $_POST["SectionNum"];
	
	if($db->connect_error) {
		die("Connection failed: " . $db->connect_error);
	}

	$sql = "SELECT E.GRADE, COUNT(*) AS NUM_OF_STUDENT ";
	$sql .= "FROM COURSE C, COURSE_SECTION CS, ENROLLMENT E ";
	$sql .= "WHERE C.COURSE_NUM = $course_number AND C.COURSE_NUM = CS.SECTION_NUM ";
	$sql .= " AND CS.COURSE_NO = $section_number AND C.COURSE_NUM = E.SEC_NUM ";
	$sql .= "GROUP BY E.GRADE";

	$result = $db->query($sql);

	echo "<h4>Course: " . $course_number . " - " . $section_number . "<br>";
	
	echo "<table border='1'>
	<tr>
	<th>Grade</th>
	<th>Count</th>
	</tr>";
	
	if($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			echo "<tr>";
			echo "<td>" . $row["GRADE"] . "</td>";
			echo "<td>" . $row["NUM_OF_STUDENT"] . "</td>";
			echo "</tr>";
		}
	}
	
	echo "</table>";
?>
