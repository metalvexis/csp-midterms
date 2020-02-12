<?php
    session_start();
    $username = $_POST['username'];
    $password = $_POST['password'];
    $bool = true;

    $mysqli_link = mysqli_connect("localhost", "phpmyadmin", "root", "mydb") or die (mysqli_error()); //Connect to server
    // mysqli_select_db("mydb") or die ("Cannot connect to database");          //Connect to database

    $result = mysqli_query(mysqli_link, "SELECT * FROM users WHERE username='$username' AND password=MD5('$password')"); // Query the users table
    $isExists = $result === TRUE;
    $row = mysqli_fetch_array($result, MYSQLI_NUM);

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
