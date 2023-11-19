<?php
    $hostname = 'localhost';
    $username = 'root';
    $password = '';
    $db = 'proiect2';
    $mysqli = new mysqli($hostname, $username, $password,$db);

    if(!mysqli_connect_errno())
    {
        'Connectat la baza de date: '. $db;
    }
    else
    {
        echo 'Nu se poate connecta';
        exit();
    }
?>