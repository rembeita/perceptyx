<?php
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

$sql = "SELECT *  FROM employees where gender = 'M' and birth_date = '1965-02-01' and hire_date >= '1990-01-01' order by trim(last_name), trim(first_name)";
$result = $conn->query($sql);

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

print json_encode($rows);


$conn->close();

/*
+------------+---------------+------+-----+---------+-------+
| Field      | Type          | Null | Key | Default | Extra |
+------------+---------------+------+-----+---------+-------+
| emp_no     | int(11)       | NO   | PRI | NULL    |       |
| birth_date | date          | NO   |     | NULL    |       |
| first_name | varchar(14)   | NO   |     | NULL    |       |
| last_name  | varchar(16)   | NO   |     | NULL    |       |
| gender     | enum('M','F') | NO   |     | NULL    |       |
| hire_date  | date          | NO   |     | NULL    |       |
+------------+---------------+------+-----+---------+-------+
*/
?>

