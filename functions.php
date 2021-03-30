<?php
function loginCheck(PDO $conn)
{
    if(isset($_SESSION['staff'])){
        return true;
    }

    else if (isset($_POST['myLogin'])) {
        //it has come from the form by pressing the submit button
        $username = trim($_POST['usernamebox']);
        $password = trim($_POST['passwordbox']);

        $stmt = "select * from staff where
                    staff_username=:username and 
                    staff_password=:password
                    ";
        $stmt = $conn->prepare($stmt);
        $stmt->bindParam('username', $username);
        $stmt->bindParam('password', $password);
        $stmt->execute(); //sends the query to the sql database

        //check the number of rows
        $count = $stmt->rowCount();
        if ($count == 1) {
            $_SESSION['staff'] = true;
            echo "<p>We've found a record</p>";
            return true;

        } else {
            echo "<p>We've NOT found a record</p>";
            return false;
        }


    }
}//end of logincheck

function displayAllCustomers(PDO $conn){
    //display all customers
    $stmt= "select * from customer";
    $stmt= $conn->prepare($stmt);
    $stmt->execute();
    $count =$stmt->rowCount();
    if($count>0){
        //create table outside loop as we only want one
        echo '<table class="table">
            <thead>
            <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
</tr>
</thead>
<tbody>';

        while($row=$stmt->fetch()){
            //create row inside table inside loop as we want as many rows as there are records
            echo '<tr>';
            echo '<td>'.$row['customer_id'].'</td>';
            echo '<td>'.$row['customer_name'].'</td>';
            echo '<td><a href="update.php?update='.$row['customer_id'].'" class="btn btn-info btn-sm">Edit</td>';
            echo '<td><a href="delete.php?delete='.$row['customer_id'].'" class="btn btn-danger btn-sm">Delete</td>';
            echo '</tr>';
        }
        echo '</tbody></table>';
    }
    else{
        echo "There are no records to display";
    }
}//end of displayAllCustomers

function delete(PDO $conn){

    $customer_id    =$_GET['delete'];
    $stmt =$conn->prepare("DELETE FROM customer where customer_id =:customer_id");
    $stmt ->bindParam(":customer_id",$customer_id);
    $stmt->execute();

}

function insert_record(PDO $conn)
{
    if (isset($_POST['insert_record'])) {
        //get values from the form
        $customer_name = $_POST['customer_name_box'];
        $customer_address = $_POST['customer_address_box'];
        $customer_email = $_POST['customer_email_box'];

        //prepare the SQL insert
        $stmt = "INSERT INTO customer  
                 (customer_name, customer_address, customer_email)
                 VALUES
                 (:customer_name, :customer_address, :customer_email)";
        $stmt = $conn->prepare($stmt);
        $stmt->bindParam('customer_name', $customer_name);
        $stmt->bindParam('customer_address', $customer_address);
        $stmt->bindParam('customer_email', $customer_email);

        $stmt->execute(); //sends the query to the sql database

    }
}//end of insert_record

function update(PDO $conn)
{

    if (isset($_POST['update_record'])) {
        $customer_id = $_POST['customer_id'];
        $customer_name = $_POST['customer_name_box'];
        $customer_address = $_POST['customer_address_box'];
        $customer_email = $_POST['customer_email_box'];

        $stmt = $conn->prepare("UPDATE customer
                                SET
                                customer_name =:customer_name,
                                customer_address =:customer_address,
                                customer_email =:customer_email WHERE
                                customer_id =:customer_id;");
        $stmt->bindParam(":customer_name", $customer_name);
        $stmt->bindParam(":customer_address", $customer_address);
        $stmt->bindParam(":customer_email", $customer_email);
        $stmt->bindParam(":customer_id", $customer_id);

        if ($stmt->execute()) {

            echo ' <script>location.href="staff.php"</script>';

        } else {
            echo ' <script>alert("Record Not Updated")</script>';
        }
    }
}

?>