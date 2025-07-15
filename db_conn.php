<?php

$host = "localhost";  
$dbname = "esame";       
$user = "root";       
$pass = "";           
    
$conn = new mysqli($host, $user, $pass, $dbname);

 // Controllare la connessione
if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
} 
//echo "Connessione riuscita!";

