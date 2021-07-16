<!doctype html>
<html>
	<head>
		<title>Database Project</title>
	</head>
	<body>
		<h1>CPSC 332 Term Project<h1>
		<p><b>User:</b>
		<select onchange="a(this.value)">
			<option disabled selected> Select one </option>
			<option value="stud.php"> Student </option>
			<option value="prof.php"> Professor </option>
		</select>
		
		<script>
		function a(src)
		{
			window.location=src;
		}
		</script>
		</p>
	</body>
</html>
