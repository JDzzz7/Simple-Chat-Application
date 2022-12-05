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

$name = $_REQUEST["name"];
$name = mysqli_real_escape_string($con, $name);
$password = $_REQUEST["password"];
$password = mysqli_real_escape_string($con, $password);
$chatbox = $_REQUEST["chatbox"];
$chatbox = mysqli_real_escape_string($con, $chatbox);

$sql = "SELECT * FROM ChatTable WHERE username = '$name' AND passw = '$password'";
    $result = $con->query($sql);
    if ($result->num_rows > 0){
        $sql = "UPDATE ChatTable SET chatContent='$chatbox' WHERE username = '$name' AND passw = '$password'";
        if ($con->query($sql) == TRUE){
            echo "";
        }
        else{
            echo "Error: " . $sql . "<br>" . $con->error;
        } 
    }   
    else{
        echo "CHAT NOT UPDATED --- WRONG CREDENTIALS!";
    }
$con->close();
?>