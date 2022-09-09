<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Record</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            width: 1200px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
  <?php
    if (isset($_GET["id"]) && !empty(trim($_GET["id"]))) {
        require_once "config.php";

        $id = trim($_GET["id"]);
        $query = mysqli_query($conn, "SELECT * FROM product WHERE ID = '$id'");

        if ($user = mysqli_fetch_assoc($query)) {
            $name        = $user["name"];
            $price       = $user["price"];
            $weight       = $user["weight"];
            $manufacturer = $user["manufacturer"];
            $country     = $user["country"];
        } else {
            header("location: read.php");
            exit();
        }

        mysqli_close($conn);
    } else {
        header("location: read.php");
        exit();
    }
  ?>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h1> User View</h1>
                    </div>
                    <div class="form-group">
                        <label>First Name</label>
                        <p class="form-control-static"><?php echo $name ?></p>
                    </div>
                    <div class="form-group">
                        <label>Last Name</label>
                        <p class="form-control-static"><?php echo $price ?></p>
                    </div>
                    <div class="form-group">
                        <label>weight</label>
                        <p class="form-control-static"><?php echo $weight ?></p>
                    </div>
                    <div class="form-group">
                        <label>Phone Number</label>
                        <p class="form-control-static"><?php echo $manufacturer ?></p>
                    </div>
                    <div class="form-group">
                        <label>country</label>
                        <p class="form-control-static"><?php echo $country ?></p>
                    </div>
                    <p><a href="index.php" class="btn btn-primary">Back</a></p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>