<!doctype html>
<html>
    <head>
        <title>Professor</title>
    </head>

    <body>
        <h1>Professor Menu</h1>
        <fieldset style="width: 200px; text-align: left">

        <form action="gradeCount.php" method="post">
            <b>Class Schedule</b><br>
            SSN: <br>
		<input type="text" name="SocialNum" required="" /><br><br>
            	<input type="submit" value="Submit" />
            	<input type="reset" value="Clear" />
        </form><br><br>

        <form method="post" action="countStud.php">
            <b>Course Grades</b><br>
            Course Number:<br>
		<input type="text" name="CourseNum2" required="" /><br><br>
            Section Number:<br>
		<input type="text" name="SectionNum" required="" /><br><br>
            <input type="submit" value="Submit" />
            <input type="reset" value="Clear" />
        </form><br><br>

        <form action="http://ecs.fullerton.edu/~cs332d9/">
            <input type="submit" value="Back">
        </form>
        </fieldset>
    </body>
</html>
