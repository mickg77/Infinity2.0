<?php session_start(); ?>
<?php require ('connect.php');?>
<?php require ('header.php');?>
<?php require ('functions.php');

if(loginCheck($conn)){
    //login check complete
    if(isset($_GET['update'])){
        $customer_id =  $_GET['update'];


        $stmt= $conn->prepare("SELECT * FROM customer WHERE customer_id =:customer_id ");
        $stmt->bindParam(":customer_id",$customer_id);
        $stmt->execute();

        $row =$stmt->fetch();
        echo "<form name='update' action='' method='POST'>";
                echo "<input type='hidden'  name='customer_id'          value='".$row['customer_id']."'>";
        echo "<div class='form-group'> <label for='customer_name_box'>Customer Name</label>";
        echo "<input type='text'  class='form-control'  name='customer_name_box'    value='".$row['customer_name']."'>";
        echo "</div>";
        echo "<div class='form-group'> <label for='customer_address_box'>Customer Address</label>";
        echo "<input text='text'  class='form-control'  name='customer_address_box' value='".$row['customer_address']."'>";
        echo "</div>";
        echo "<div class='form-group'> <label for='customer_email_box'>Customer Email</label>";
        echo "<input type='text'  class='form-control'  name='customer_email_box'   value='".$row['customer_email']."'>";
        echo "</div>";
        echo "<input type='submit' class='btn btn-outline-dark' name='update_record'></form>";



    }

    update($conn);
}
else {
    ?>
    <div class="alert alert-danger" role="alert">
        Please <a href="index.php">login</a>.
    </div>

    <?php
}