<!DOCTYPE html>
<?php session_start(); ?>
include(includes/sqlconnection.php);
<html>

<head>
    <title>My Portfolio</title>
    <link rel="stylesheet" href="admin/css/bootstrap.min.css">
    <link rel="stylesheet" href="admin/css/custom.css">
    <script src="admin/js/jquery.js"></script>
    <script src="admin/js/bootstrap.min.js"></script>
    <style>
        .navbar-custom {
            z-index: 1000;
            position: fixed;
            width: 100%;
        }

        .car {
            position: relative;
            z-index: 1;
        }
    </style>
</head>

<body style="font-family:Times New Roman;" data-spy="scroll" data-target=".navbar">

    <div>
        <nav class="navbar fixed-top navbar-custom navbar-collapse"
            style="font-family:times new roman; font-size:20px;">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#"><img class="logoko" src="logo.png" height="35px" width="35px"></a>
                </div>

                <ul class="nav navbar-nav navbar-right">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="#about">About</a></li>
                    <li><a href="#prog">Programming</a></li>
                    <li><a href="#contact">Contact Me</a></li>
                </ul>
            </div>
        </nav>

        <header style="background:#000000; margin-bottom: 0px;">
            <div class="text-center">
                <h1>My Portfolio</h1>
                <div class="lead">
                    Leika Anne Galvez
                </div>
            </div>
        </header>
    </div>

    <section id="about" style="background-color:#F1F1F1">
        <div>
            <center>
                <h2 style="background-color: grey; color: black; padding: 30px 30px 30px 30px; font-size:35px">About Me
                </h2>
            </center>
        </div>


        <?php
        if (isset($_SESSION['status']) && $_SESSION != '') {
            echo "<div class='alert alert-success'>" . $_SESSION['status'] . "</div>";
            unset($_SESSION['status']);
        }

        viewAll();
        ?>


        <div class="container dprog" style="margin-top:40px; margin-bottom:40px;" id="prog">
            <center>
                <h2 style="background-color: #91BBC7; color: black; padding: 30px 30px 30px 30px; font-size:35px">
                    Programming Languages</h2>
                <?php
                if (isset($_SESSION['status']) && $_SESSION != '') {
                    echo "<div class='alert alert-success'>" . $_SESSION['status'] . "</div>";
                    unset($_SESSION['status']);
                }
                ?>
                <div>
                    <?php viewAllProg(); ?>
                </div>
            </center>
        </div>
    </section>


    <section id="carousel">

        <div>
            <center>
                <h2 style="background-color: grey; color: black; padding: 30px 30px 30px 30px; font-size:35px">
                    Certifications</h2>
            </center>
        </div>

        <div class="container">
            <center>
                <div id="mycarousel" class="carousel slide" data-ride="carousel" style="width: 1000px;">
                    <ol class="carousel-indicators">
                        <?php
                        $folder = 'pic/';
                        $images = glob($folder . '*.{jpg,jpeg,png,gif}', GLOB_BRACE);

                        $x = 0;
                        foreach ($images as $image) {
                            if ($x == 0) {
                                echo "<li data-target='#mycarousel' data-slide-to='$x' class='active'></li>";
                            } else {
                                echo "<li data-target='#mycarousel' data-slide-to='1'></li>";
                            }
                            $x++;
                        }

                        ?>
                    </ol>

                    <div class="carousel-inner car">
                        <?php

                        $folder = 'pic/';
                        $images = glob($folder . '*.{jpg,jpeg,png,gif}', GLOB_BRACE);

                        $x = 0;

                        foreach ($images as $image) {
                            if ($x == 0) {
                                $x++;
                                echo "<div class='item active'>
                        <img src='$image' width='600px' width='392px'>
                        </div>";
                                $x--;
                            } else {
                                $x++;
                                echo "<div class='item'>
				                	<img src='$image' width='600px' width='392px'>
                                </div>";
                                $x--;
                            }
                            $x++;
                        }
                        ?>

                        <a class="left carousel-control" href="#mycarousel" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left"></span>
                        </a>


                        <a class="right carousel-control" href="#mycarousel" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right"></span>
                        </a>

                    </div>
                </div>
            </center>
        </div>

    </section>


    <section id="contact">

        <div>
            <center>
                <h2 style="background-color: grey; color: black; padding: 30px 30px 30px 30px; font-size:35px">Contact
                    Me</h2>
            </center>
        </div>

        <div class="container-fluid" style="background-color:black; padding: 30px 10px 10px 10px; height:500px">
            <div class="container">
                <div class="row container-fluid">
                    <h3 style="color:#FFFFFF;"><img src="emaillogo.jpg" heigh="50px" width="50px"
                            style="margin-right:30px;">leikagalvez@gmail.com</h3>
                </div>
                <div class="row container-fluid">
                    <h3 style="color:#FFFFFF;"><img src="phonelogo.png" heigh="50px" width="50px"
                            style="margin-right:30px;">+11 111 111 1111</h3>
                </div>
                <div class="row container-fluid">
                    <h3 style="color:#FFFFFF;"><img src="githublogo.png" heigh="50px" width="50px"
                            style="margin-right:30px;">https://github.com/LeikaGalvez</h3>
                </div>
                <div class="row container-fluid">
                    <h3 style="color:#FFFFFF;"><img src="fblogo.png" heigh="50px" width="50px"
                            style="margin-right:30px;">Leika</h3>
                </div>
            </div>
        </div>

    </section>

</body>

</html>

<?php
function viewAll()
{
    include ("includes/sqlconnection.php");
    $sql = "SELECT * FROM aboutinfo";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "
                    <div class='container' style='margin-top:30px; margin-bottom:30px;'>
                        <div class='container'>
                            <center>
                                <img src='uploads/{$row['aboutPhoto']}' class='img-circle' height='200px' width='200px' alt='{$row['aboutPhoto']}>
                            </center>
                        </div>

                        <div class='container' style='margin-top:30px; margin-bottom:30px;'>
                            <p class='text-center' style='font-size:25px;'>{$row['aboutDesc']}</p>
                        </div>
                    </div>
					<br>
                    ";
        }
    }
    $conn->close();
}

function viewAllProg()
{
    include ("includes/sqlconnection.php");
    $sql = "SELECT * FROM proglang order by id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table border='2' class='table table-striped'>";
        echo "<tr><th>Photo</th><th>Programming Language</th><th>Description</th></tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr border='2'>";
            echo "<td><img src='admin/uploads/{$row['pic']}' width='150px' height='100px' alt='{$row['pic']}'></td>";
            echo "<td>{$row['progname']}</td>";
            echo "<td>{$row['progdesc']}</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "<p>No programming languages found.</p>";
    }
    $conn->close();

}

?>