<?php
// Mysql parameters
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "employees";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) 
{
    die("Connection failed: " . $conn->connect_error);
}
else
{ 
	echo "Connected successfully<br>";
}

// Sql Query
$sql = "SELECT *  FROM employees where gender = 'M' and birth_date = '1965-02-01' and hire_date >= '1990-01-01' order by trim(last_name), trim(first_name)";
$result = $conn->query($sql);

// Rows array for json format
$rows = array();

echo "<h1>Text Format</h1><br><br>";
if ($result->num_rows > 0) 
{
    // output data of each row	
	while($row = $result->fetch_assoc()) 
	{
        	echo "id: " . $row["emp_no"]. " - Name: " . $row["last_name"]. " " . $row["first_name"]. " " . $row["birth_date"] . " " . $row["hire_date"] . "<br>";
   		$rows[] = $row;
	}
} 
else 
{
    echo "0 results";
}
echo "<br><h1>Json Format</h1><br><br>";

// Printing Json Format
echo json_encode($rows);

// Closing db connection
$conn->close();

?>

