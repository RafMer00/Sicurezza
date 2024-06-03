<?php
    $host = 'localhost';
    $dbUsername = 'root';
    $dbpw = 'password';
    $db = 'siclab';

    // * INPUT
    $name = $_POST['Name'];
    $surname = $_POST['Surname'];
    $pass = $_POST['password'];

    if(!empty($name) && !empty($surname) && !empty($pass)){
        $conn = new mysqli($host,$dbUsername,$dbpw,$db);        // DATABASE CONNECTION
        if ($conn->connect_error) {
            die("Conn failed: ".$conn->conncet_error);
        }
        else{
            echo "Connection OK\n\n";
            $query = "INSERT INTO users(Nome, Cognome, Password) values ('$name', '$surname', '$pass')";
            if($conn->query($query)){
                echo "Succeffully added!";
            }
            else
                echo "Error:".$query."<br>".$conn->error;
            $conn->close();
        }
    }
    
?>