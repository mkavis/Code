<?php
// set the default timezone to use. Available since PHP 5.1
date_default_timezone_set('UTC');
echo date('l jS \of F Y h:i:s A') . "<br/>";

$hostserver = gethostname();
echo "Server Secondary=" . $hostserver . PHP_EOL;

//$mysqli = new mysqli("ec2-54-209-97-179.compute-1.amazonaws.com", "mike", "cloudtp", "mydb");
$mysqli = new mysqli("mydb.c5icb29x1ajy.us-east-1.rds.amazonaws.com", "mike", "cloudtp01", "mydb");
/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

/* Select queries return a resultset */
$result = mysqli_query($mysqli,"SELECT * FROM employee");

      echo "<br/>";
    while($row = mysqli_fetch_array($result))
      {
      echo $row['idemployee'] . " " . $row['employeeFirstName'] . " " . $row['employeeLastName'] . PHP_EOL;
      echo "<br/>";
     }

if ($result = $mysqli->query("SELECT *  FROM mydb.employee LIMIT 10")) {
    printf("Select returned %d rows.\n", $result->num_rows);

    /* free result set */
    $result->close();
}

$mysqli->close();
$ch = curl_init("https://s3.amazonaws.com/Mike-Test/tests3.html");
curl_exec($ch);
?>

