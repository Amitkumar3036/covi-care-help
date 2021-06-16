<?php


$conn = mysqli_connect("localhost", "root", "");
 
// Check connection
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}


// create database
$sql_db = "CREATE DATABASE covidcare";
if(mysqli_query($conn, $sql_db)){
    echo "Database created successfully\n";
} else{
    echo "ERROR: Could not able to execute $sql_db. " . mysqli_error($conn);
}


// connecting database 
$servername = "localhost";
$username = "root";
$password = "";
$db = "covidcare";

try {
   
    $conn = mysqli_connect($servername, $username, $password, $db);
    echo "Connected successfully\n"; 
    }
catch(exception $e)
    {
    echo "Connection failed: \n" . $e->getMessage();
    }


// create beds table 
$sql = "CREATE TABLE beds(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100)  NULL,
    contact1 VARCHAR(11) NULL,
    contact2 VARCHAR(11) NULL,    
    status VARCHAR(30)  NULL,
    state VARCHAR(100)  NULL ,
    location VARCHAR(300) NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP

)";
if(mysqli_query($conn, $sql)){
    echo "Table created successfully.\n";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}
 

// create table oxygen
$sql_oxy = "CREATE TABLE oxygen(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100)  NULL,
    contact1 VARCHAR(11)  NULL,
    contact2 VARCHAR(11) NULL,   
    status VARCHAR(30)  NULL,
    state VARCHAR(100)  NULL ,
    location VARCHAR(300)  NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP

)";
if(mysqli_query($conn, $sql_oxy)){
    echo "Table created successfully.\n";
} else{
    echo "ERROR: Could not able to execute $sql_oxy. " . mysqli_error($conn);
}

// Close connection
mysqli_close($conn);
?>
