<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Form page</title>
		<style>
			#update {
  				width: 80%;
  				margin: auto;
				border-style: solid;
    			border-width: 3px;
    			border-color: blue;
			}

			#listen {
  				width: 80%;
  				margin: auto;
				border-style: solid;
    			border-width: 3px;
    			border-color: blue;
			}

			label, input{
  				display: inline-block;
			}

			label {
  				width: 30%;
  				text-align: right;
			}

			label+input{
  				width: 30%;
  				margin: 0 30% 0 4%;
			}
		</style>
		<script src="updateDB.js"></script>	
	</head>
	<body>
	<?php
		//Makes DB connection
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "mydb";
		$con = mysqli_connect($servername,$username,$password,$dbname);

		if (mysqli_connect_errno())
		{
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}

		session_start();
		$sql = "SELECT username FROM ChatTable";
		$result = $con->query($sql);
    	echo "<h2>List of Names</h2>";
		if ($result->num_rows > 0){
    		echo "<table border='1'><tr><th>Name</th></tr>";
    		while($row = mysqli_fetch_array($result)){
        		echo "<tr>";
        		echo "<td>" . $row['username'] . "</td>";
        		echo "</tr>";
    		};
    		echo "</table>";
		}
		$con->close();
	?>
		<form id="update">
            <p>
				<label for="name"><strong>Enter Your Name:</strong></label>
				<input type="text" name="name" id="name">
			</p>
			<p>
				<label for="password"><strong>Enter Your Password:</strong></label>
				<input type="text" name="password" id="password">
			</p>
			<p>
				<label for="chat"><strong>Chat box:</strong></label>
				<input type="text" style="height:200px;font-size:14pt;" name="chat" id="chat">
			</p>
			<p id="result"></p>
		</form>

		<form id="listen">
            <p>
				<label for="validName"><strong>Enter Valid Name:</strong></label>
				<input type="text" name="validName" id="validName">		
			</p>
			<p style="text-align: center;"><input style="padding:15px" id="submit" name="submit" type="button" value="Listen"></p>
			<p>
				<label for="chatReply"><strong>Chat Contents:</strong></label>
				<textarea style="text-align: center;" id="chatReply" name="chatReply" rows="8" cols="62"></textarea>
			</p>
		</form>
	</body>
</html>
