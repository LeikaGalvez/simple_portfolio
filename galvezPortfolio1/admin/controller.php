<?php
session_start();
include ("includes/sqlconnection.php");
if (isset($_POST['save_about_record'])) {
    $pfp = $_FILES['txtpfp']['name'];
    $desc = $_POST['txtdesc'];

    $sql = "INSERT INTO aboutinfo(aboutPhoto,aboutDesc) VALUES('$pfp','$desc')";

    if ($conn->query($sql) === TRUE) {
        move_uploaded_file($_FILES["txtpfp"]["tmp_name"], "uploads/".$_FILES['txtpfp']['name']);
        $_SESSION['status'] = "Record Insert Successfully";
        header('location: index.php');

    } else {
        $_SESSION['status'] = "Error: Insert Failed...";
        header('location: index.php');
    }
    $conn->close();
}


if (isset($_POST['update_about_record'])) {
    $id = $_POST['txtid'];
    $pfp_new = $_FILES['txtpfp']['name'];
    $pfp_old = $_POST['txtpfp_old'];
    $shortdesc = $_POST['txtdesc'];

    if ($pfp_new != '') {
        $update_pic = $pfp_new;
    } else {
        $update_pic = $pfp_old;
    }

    echo "$update_pic";

    $sql = "UPDATE aboutinfo SET aboutPhoto='$update_pic', aboutDesc='$shortdesc' WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        move_uploaded_file($_FILES["txtpfp"]["tmp_name"], "uploads/" . $_FILES['txtpfp']['name']);
        $_SESSION['status'] = "Information Updated Successfully";
        header('location:index.php');

    } else {
        $_SESSION['status'] = "Error: Update Failed...";
        header('location:index.php');
    }
    $conn->close();
}


if (isset($_POST['save_prog_record'])) {
    $progpic = $_FILES['txtprogpic']['name'];
    $pname = $_POST['txtprogname'];
    $pdesc = $_POST['txtprogdesc'];

    $sql = "INSERT INTO proglang(pic,progname,progdesc) VALUES('$progpic','$pname','$pdesc')";

    if ($conn->query($sql) === TRUE) {
        move_uploaded_file($_FILES["txtprogpic"]["tmp_name"], "uploads/" . $_FILES['txtprogpic']['name']);
        $_SESSION['status'] = "Record Insert Successfully";
        header('location: index.php');

    } else {
        $_SESSION['status'] = "Error: Insert Failed...";
        header('location: index.php');
    }
    $conn->close();
}

if (isset($_POST['update_prog_record'])) {
    $id = $_POST['txtid'];
    $progpic_new = $_FILES['txtprogpic']['name'];
    $progpic_old = $_POST['txtprogpic_old'];
    $pname = $_POST['txtprogname'];
    $shortdesc = $_POST['txtprogdesc'];

    if ($progpic_new != '') {
        $update_pic = $progpic_new;
    } else {
        $update_pic = $progpic_old;
    }

    echo "$update_pic";

    $sql = "UPDATE proglang SET pic='$update_pic', progname='$pname',progdesc='$shortdesc' WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        move_uploaded_file($_FILES["txtprogpic"]["tmp_name"], "uploads/" . $_FILES['txtprogpic']['name']);
        $_SESSION['status'] = "Information Updated Successfully";
        header('location:index.php');

    } else {
        $_SESSION['status'] = "Error: Update Failed...";
        header('location:index.php');
    }
    $conn->close();
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $pic = $_GET['pic'];
    $sql = "DELETE FROM proglang WHERE id = '$id'";

    if ($conn->query($sql) === TRUE) {
        unlink("uploads/" . $pic);
        $_SESSION['status'] = "Record Deleted Successfully";
        header('location:index.php');
    } else {
        $_SESSION['status'] = "Deletion Failed...";
        header('location:index.php');
    }
    $conn->close();
}

?>