<?php
require_once "config.php";

$name = $price = $weight = $manufacturer = $country = "";
$name_error = $price_error = $weight_error = $manufacturer_error = $country_error = "";

if (isset($_POST["id"]) && !empty($_POST["id"])) {

    $id = $_POST["id"];

    
    $name = $_REQUEST['name'];
    $price = $_REQUEST['price'];
    $weight = $_REQUEST['weight'];
    $manufacturer = $_REQUEST['manufacturer'];
    $country = $_REQUEST['country'];

    if (name != "" ) {

          $sql = "UPDATE `product` SET `name`= '$name', `price`= '$price', `weight`= '$weight', `manufacturer`= '$manufacturer', `country`= '$country' WHERE id='$id'";

          if (mysqli_query($conn, $sql)) {
              header("location: index.php");
          } else {
              echo "Something went wrong. Please try again later.";
          }

    }

    mysqli_close($conn);
} else {
    if (isset($_GET["id"]) && !empty(trim($_GET["id"]))) {
        $id = trim($_GET["id"]);
        $query = mysqli_query($conn, "SELECT * FROM product WHERE ID = '$id'");

        if ($user = mysqli_fetch_assoc($query)) {
            $name   = $user["name"];
            $price    = $user["price"];
            $weight       = $user["weight"];
            $manufacturer = $user["manufacturer"];
            $country     = $user["country"];
        } else {
            echo "Something went wrong. Please try again later.";
            header("location: edit.php");
            exit();
        }
        mysqli_close($conn);
    }  else {
        echo "Something went wrong. Please try again later.";
        header("location: edit.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Record</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper {
            width: 1200px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Update User</h2>
                    </div>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                      <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <div class="form-group <?php echo (!empty($name_error)) ? 'has-error' : ''; ?>">
                            <label>First Name</label>
                            <input type="text" name="name" class="form-control" value="<?php echo $name; ?>">
                            <span class="help-block"><?php echo $name_error;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($price_error)) ? 'has-error' : ''; ?>">
                            <label>Last Name</label>
                            <input type="text" name="price" class="form-control" value="<?php echo $price; ?>">
                            <span class="help-block"><?php echo $price_error;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($weight_error)) ? 'has-error' : ''; ?>">
                            <label>weight</label>
                            <input type="weight" name="weight" class="form-control" value="<?php echo $weight; ?>">
                            <span class="help-block"><?php echo $weight_error;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($manufacturer_error)) ? 'has-error' : ''; ?>">
                            <label>Phone Number</label>
                            <input type="text" name="manufacturer" class="form-control" value="<?php echo $manufacturer; ?>">
                            <span class="help-block"><?php echo $manufacturer_error;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($country_error)) ? 'has-error' : ''; ?>">
                            <label>country</label>
                            <textarea name="country" class="form-control"><?php echo $country; ?></textarea>
                            <span class="help-block"><?php echo $country_error;?></span>
                        </div>

                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="index.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
 