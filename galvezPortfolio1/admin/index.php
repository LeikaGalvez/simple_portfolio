<!DOCTYPE html>
<?php session_start(); ?>
<html>

<head>
    <title>My Portfolio</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/custom.css">
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
</head>

<body style="font-family:Times New Roman;" data-spy="scroll" data-target=".navbar">

    <div>
        <nav class="navbar fixed-top navbar-custom" style="font-family:times new roman; font-size:20px;">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#"><img class="logoko" src="logo.png" height="35px" width="35px"></a>
                </div>

                <ul class="nav navbar-nav navbar-right">
                    <li><a href="admin.php">Home</a></li>
                    <li><a href="#about">About</a></li>
                    <li><a href="#prog">Progamming</a></li>

                    <li>
                        <form action="../index.php" method="POST">
                            <button type="submit" class="btn btn-danger btn-block btn-lg" name="exit">Exit Admin Page</button>
                        </form>
                    </li>
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


        <div class="container" style="margin-top:40px; margin-bottom:40px;" id="prog">
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
                <form action="insertprog.php" method="POST">
                    <button type="submit" class="btn btn-primary" name="add_record">Add New Record</button>
                </form>
            </center>
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
                        <a href='editabout.php?id={$row['id']}' class='btn btn-md btn-info'>Edit</a>
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
        echo "<tr><th >Photo</th><th>Programming Language</th><th>Description</th><th>Action</th></tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr border='2'>";
            echo "<td><img src='uploads/{$row['pic']}' width='150px' height='100px' alt='{$row['pic']}'></td>";
            echo "<td>{$row['progname']}</td>";
            echo "<td>{$row['progdesc']}</td>";
            echo "<td>
                <a href='editprog.php?id={$row['id']}' class='btn btn-md btn-info'>Edit</a>
                <a href='controller.php?id={$row['id']}&txtprogpic={$row['pic']}' class='btn btn-md btn-danger'>Delete</a>
                </td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "<p>No programming languages found.</p>";
    }
    $conn->close();

}

?>