<?php
	$servername="mariadb";
	$username="cs332d9";
	$password="azi2ceeC";
	$dbname="cs332d9";

	$db = new mysqli($servername, $username, $password, $dbname);
	$ID = $_POST['ID'] ?? '';

	if ($db->connect_error) {
		die("Connection failed: " . $db->connect_error);
	}
	
	$sql = "SELECT C.COURSE_NUM, CS.COURSE_NO, C.TITLE, E.GRADE ";
	$sql .= "FROM STUDENT S, COURSE C, COURSE_SECTION CS, ENROLLMENT E ";
	$sql .= "WHERE S.ID = $ID AND E.STUDENT_CWID = S.ID ";
	$sql .= " AND C.COURSE_NUM = E.SEC_NUM AND C.COURSE_NUM = CS.SECTION_NUM";

	$result = $db->query($sql);

	echo "<h4>CWID: " . $ID . "</h4>";
	
	echo "<table border='1'>
	<tr>
	<th>Course ID</th>
	<th>Course Name</th>
	<th>Grade</th>
	</tr>";

	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			echo "<tr>";
			echo "<td>" . $row["COURSE_NUM"] . " - " . $row["COURSE_NO"] . "</td>";
			echo "<td>" . $row["TITLE"] . "</td>";
			echo "<td>" . $row["GRADE"] . "</td>";
			echo "</tr>";
		}
	}
	
	echo "</table>";


	$db->close();

?>
