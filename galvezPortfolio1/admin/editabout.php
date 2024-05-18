<!DOCTYPE HTML>
<html>

<head>
    <title>Edit About</title>
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
                <h1 class="text-center">Edit About Information</h1>
                <form action="controller.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <?php getRecord($_GET['id']); ?>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary" name="update_about_record">Update About Information</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>

<?php
function getRecord($recno)
{
    include ("includes/sqlconnection.php");
    $sql = "SELECT * FROM aboutinfo WHERE id = $recno";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $descrn = $row['aboutDesc'];
        echo "
                <input type='hidden' name='txtid' value='" . $row['id'] . "'>

                <div class='row'>
                    <div class='col-md-12'>
                        <label for='txtpfp'>Profile Photo</label>
                        <div class='row mt-3'>
                            <div class='col-md-12'>
                                <img src='uploads/{$row['aboutPhoto']}' class='txt-pfp' alt='{$row['aboutPhoto']}' style='margin-bottom:10px; height='100px' width='100px'>
                            </div>
                        </div>
                        <input type='file' class='form-control' name='txtpfp'>
                        <input type='hidden' name='txtpfp_old' value='" . $row['aboutPhoto'] . "'>
                    </div>


                    <div class='col-md-12'>
                        <label for='txtdesc'>Your Description</label>
                        <div style='max-width: 100%; overflow: hidden;'>
                            <textarea type='text' class='form-control' name='txtdesc' value='" . $row['aboutDesc'] . "'>$descrn</textarea>
                        </div>
                    </div>

                </div>
                
            ";
    } else {
        echo "No record found";

    }
}
?>