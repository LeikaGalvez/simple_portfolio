<!DOCTYPE HTML>
<html>

<head>
    <title>About Information</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
</head>

<body style="background-color:#b8d3ff; font-size:15px; padding-top:15px;">
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="jumbotron">
                <h1 class="text-dark" style="font-size:48px;">Add About Information</h1>
                
                <form action="controller.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="txtpfp">Profile Photo</label>
                        <div class="input-group col-md-10">
                            <input type="text" id="txtpfp" class="form-control" placeholder="Choose file" readonly>
                            <label class="input-group-btn" style="padding-left:7px;">
                                <span class="btn btn-primary">
                                    Browse<input name="txtpfp" type="file" style="display: none;"
                                        onchange="$('#txtpfp').val($(this).val().split('\\').pop());">
                                </span>
                            </label>
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="txtdesc">Short Description</label>
                        <div style="max-width: 100%; overflow: hidden;">
                            <textarea id="txtdesc" name="txtdesc" class="form-control" style="max-width: 100%;"></textarea>
                        </div>
                    </div>


                    <button type="submit" name="save_about_record" class="btn btn-success">Save Information</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>