<?php session_start(); ?>
<?php require ('connect.php');?>
<?php require ('header.php');?>
<?php require ('functions.php');

if(loginCheck($conn)){
    //security check passed
    insert_record($conn);

    ?>

<form name="insert" method="POST" action="">
    <div class="form-group">
        <label for="customer_name">Customer Name</label>
        <input name="customer_name_box" type="text" class="form-control" placeholder="Customer Name">
    </div>
    <div class="form-group">
        <label for="customer_address">Customer Address</label>
        <input name="customer_address_box" type="text" class="form-control" placeholder="Customer Address">
    </div>
    <div class="form-group">
        <label for="customer_email">Customer Email</label>
        <input name="customer_email_box" type="text" class="form-control" placeholder="Customer Email">
    </div>
    <div class="form-group">
        <input type="submit" name="insert_record" value="Add Customer" class="btn btn-success">
    </div>
</form>
        <?php
}

else {
    echo "<p>We have NOT logged in!</p>";
}

?>

<?php include ('footer.php');?>


