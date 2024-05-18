<!DOCTYPE HTML>
<html>

<head>
    <title>Edit Programming Language</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <style>
        .form-group {
            margin-bottom: 20px;
        }
    </style>
</head>

<body style="background-color:#b8d3ff; font-size:15px; padding-top:15px;">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h1 class="text-center">Edit Progamming Language Information</h1>
                <form action="controller.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <?php getProgRecord($_GET['id']); ?>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary" name="update_prog_record">
                            Update Information
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>

<?php
function getProgRecord($recno)
{
    include ("includes/sqlconnection.php");
    $sql = "SELECT * FROM proglang WHERE id = $recno";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $progdescrn = $row['progdesc'];
        echo "
                <input type='hidden' name='txtid' value='" . $row['id'] . "'>

                <div class='row'>
                    <div class='col-md-12'>
                        <label for='txtprogpic'>Photo Shown</label>
                        <div class='row mt-3'>
                            <div class='col-md-12'>
                                <img src='uploads/{$row['pic']}' class='txt-ppic' alt='{$row['pic']}' style='margin-bottom:10px; height='100px' width='100px'>
                            </div>
                        </div>
                        <input type='file' class='form-control' name='txtprogpic'>
                        <input type='hidden' name='txtprogpic_old' value='" . $row['pic'] . "'>
                    </div>

                    <div class='col-md-12'>
                        <label for='txtprogname'>Programming Language Name</label>
                        <div style='max-width: 100%; overflow: hidden;'>
                            <input type='text' class='form-control' name='txtprogname' value='" . $row['progname'] . "'>
                        </div>
                    </div>

                    <div class='col-md-12'>
                        <label for='txtdesc'>Description</label>
                        <div style='max-width: 100%; overflow: hidden;'>
                            <textarea type='text' class='form-control' name='txtprogdesc' value='" . $row['progdesc'] . "'>$progdescrn</textarea>
                        </div>
                    </div>

                </div>
                
            ";
    } else {
        echo "No record found";

    }
}
?>