<?php session_start();?>
<?php require 'connect.php'?>
<?php require 'functions.php'?>
<?php include 'header.php'?>

<?php

if(loginCheck($conn)){
    delete($conn);
    displayAllCustomers($conn);
}
else {
    echo '<p>Please login</p>';
}

?>
<?php include 'footer.php';?>

