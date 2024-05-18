<!DOCTYPE HTML>
<html>

<head>
    <title>Programming Language Records</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
</head>

<body style="background-color:#b8d3ff; font-size:15px; padding-top:15px;">
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="jumbotron">
                <h1 class="text-dark" style="font-size:48px;">Add New Record</h1>
                <form action="controller.php" method="POST" enctype="multipart/form-data">
                    
                 <div class="form-group">
                        <label for="txtprogpic">Programming Photo</label>
                        <div class="input-group col-md-10">
                            <input type="text" id="txtprogpic" class="form-control" placeholder="Choose file" readonly>
                            <label class="input-group-btn" style="padding-left:7px;">
                                <span class="btn btn-primary">
                                    Browse<input name="txtprogpic" type="file" style="display: none;"
                                        onchange="$('#txtprogpic').val($(this).val().split('\\').pop());">
                                </span>
                            </label>
                        </div>
                    </div>

                <div class="form-group">
                        <label for="txtprogname">Programming Language</label>
                        <input type="text" id="txtprogname" name="txtprogname" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="txtprogdesc">Short Description</label>
                        <input type="text" id="txtprogdesc" name="txtprogdesc" class="form-control">
                    </div>


                    <button type="submit" name="save_prog_record" class="btn btn-success">Save Record</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>