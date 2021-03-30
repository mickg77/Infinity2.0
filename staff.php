<?php session_start(); ?>
<?php require ('connect.php');?>
<?php require ('header.php');?>
<?php require ('functions.php');

if(loginCheck($conn)){
    displayAllCustomers($conn);
}

else {
    echo "<p>We have NOT logged in!</p>";
}

?>

<?php include ('footer.php');?>


