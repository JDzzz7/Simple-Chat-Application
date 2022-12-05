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

$validName = $_REQUEST["validName"];
$validName = mysqli_real_escape_string($con, $validName);

$sql = "SELECT chatContent FROM ChatTable WHERE username = '$validName'";
    $result = $con->query($sql);
    if ($result->num_rows > 0){
        $row = mysqli_fetch_array($result);
        echo $row['chatContent'];
    }
    else{
        echo "";
    }
$con->close();    
?>