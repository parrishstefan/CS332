<!doctype html>
<html>

    <head>
        <title>Student</title>
    </head>

    <body>
        <h1>Student Menu</h1>
        <fieldset style="width: 200px; text-align: left">

        <form action="courses.php" method="post">
                <b>Class Schedule</b><br>
                Course Number: <br>
				<input type="text" name="CourseNum" required=""/>
				<br>
				<br>
                                <input type="submit" value="Submit"/>
                                <input type="reset" value="Clear"/>
        </form><br><br>

        <form action="sections.php" method="post">
                <b>Course Grade</b><br>
                CWID: <br>
			<input type="text" name="ID" required="" />
			<br>
			<br>
                	<input type="submit" value="Submit" />
                	<input type="reset" value="Clear" />
        </form><br><br>

        <form action="http://ecs.fullerton.edu/~cs332d9/">
        <input type="submit" value="Back">
        </form>

        </fieldset>
    </body>

</html>
