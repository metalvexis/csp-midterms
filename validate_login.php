<?php
    session_start();
    $username = $_POST['username'];
    $password = $_POST['password'];

    $mysqliLink = mysqli_connect("localhost", "phpmyadmin", "root", "mydb") or die (mysqli_error()); //Connect to server

    $result = mysqli_query($mysqliLink, "SELECT * FROM users WHERE username='$username' AND password=MD5('$password')", MYSQLI_NUM); // Query the users table

    $isExists = $result === TRUE;
    
    if($isExists) //IF there are no returning rows or no existing username
    {
        Print '<script>alert("Success!");</script>'; // Prompts the user
        Print '<script>window.location.assign("login.php");</script>'; // redirects to login.php
    }
    else
    {
        Print '<script>alert("Incorrect BOSS!");</script>'; // Prompts the user
        Print '<script>window.location.assign("login.php");</script>'; // redirects to login.php
    }
?>
