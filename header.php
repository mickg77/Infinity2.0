<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles.css">
    <title>Hello, world!</title>
</head>
<body>
<ul class="nav justify-content-center">
    <li class="nav-item">
        <a class="nav-link " href="index.php">Home</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="staff.php">Staff</a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="delete.php">Delete</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="insert.php">Insert</a>
    </li>

    <?php
    if(isset($_SESSION['staff'])){
        ?>
            <li class="nav-item">
                <a class="nav-link" href="logout.php">Logout</a>
            </li>
        <?php

    }
    ?>


</ul>

<img src="images/schrute%20family.jpg" style="display:block; width:15%; margin:20px auto;" alt="The Schrutes">
