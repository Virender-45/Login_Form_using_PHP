<?php
ob_start(); //Turns on output buffering
session_start();

$timezone = date_default_timezone_set("Indian/Mahe");

$con = mysqli_connect("localhost", "root", "", "social");     //first parameter is host, second parameter is username for database, third parameter is password for database, fourth parameter is the name eof the database

if(mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

