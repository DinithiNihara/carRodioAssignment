<?php

function getDBConnection(){
    $server="localhost";
    $user="root";
    $password="";
    $dbname="carrodio1";

    $conn = new mysqli($server,$user,$password,$dbname);

    if($conn->connect_error){
        die("Connection failed:".$conn->connect_error);
    }else{
        // echo"Connected successfully";
        return $conn;
    }                   
}

function getResults($sql){
    global $conn;
    return $conn->query($sql);
} 


?>
