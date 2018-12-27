<?php

    $host = "172.26.0.3";
    $user = "root";
    $pass = "mysql12345678";
    $dbname = "test";
    // $mysqli = new mysqli("172.26.0.3", "root", "mysql12345678", "test");
    $conn = mysqli_connect($host, $user, $pass, $dbname);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error() . "<br>");
    }
    echo("mysql connect success<br>");

    $sql = "CREATE TABLE person( ".
        "id INT NOT NULL AUTO_INCREMENT, ".
        "name VARCHAR(100) NOT NULL, ".
        "age INT NOT NULL, ".
        "sex INT, ".
        "time DATE, ".
        "PRIMARY KEY ( id ))ENGINE=InnoDB DEFAULT CHARSET=utf8; ";
    
    if(mysqli_query($conn, $sql)) {
        echo "Table created successfully<br>";  
    } else {  
        echo "Table is not created successfully<br>";  
    }

    $sql = "INSERT INTO person(name, age, sex) VALUES ('Gaven', 18, 1)";
    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully<br>";
    } else {
        echo "Error: " . $sql . "" . mysqli_error($conn) . "<br>";
    } 

    $sql = "SELECT * FROM person";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "id: " . $row["id"]. " - name: " . $row["name"] . "- age: " . $row["age"] . "- time: " . $row["time"] . "<br>";
        }
    } else {
        echo "0 results";
    }

    mysqli_close($conn);  
?>