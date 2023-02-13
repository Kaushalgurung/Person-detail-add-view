<?php
session_start();
require 'dbcon.php';

if(isset($_POST['delete_person']))
{
    $person_id = mysqli_real_escape_string($con, $_POST['delete_person']);

    $query = "DELETE FROM persons WHERE id='$person_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Person Deleted Successfully";
        header("Location: index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Person Not Deleted";
        header("Location: index.php");
        exit(0);
    }
}

if(isset($_POST['update_person']))
{
    $person_id = mysqli_real_escape_string($con, $_POST['person_id']);

    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $address = mysqli_real_escape_string($con, $_POST['address']);

    $query = "UPDATE persons SET name='$name', email='$email', phone='$phone', address='$address' WHERE id='$person_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Person Updated Successfully";
        header("Location: index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Person Not Updated";
        header("Location: index.php");
        exit(0);
    }

}


if(isset($_POST['save_person']))
{
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $address = mysqli_real_escape_string($con, $_POST['address']);

    $query = "INSERT INTO persons (name,email,phone,address) VALUES ('$name','$email','$phone','$address')";

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['message'] = "Person Created Successfully";
        header("Location: person-create.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Person Not Created";
        header("Location: person-create.php");
        exit(0);
    }
}

?>