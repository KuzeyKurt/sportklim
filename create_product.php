<?php
// require_once "config.php";

// $name = $price = $weight = $manufacturer = $country = "";
// $name_error = $priceerror = $weight_error = $manufacturer_error = $country_error = "";

// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     $name = trim($_POST["name"]);
//     if (empty($name)) {
//         $name_error = "Name is required.";
//     } 
//     else {
//         $name = $name;
//     }

//     $price = trim($_POST["price"]);

//     if (empty($price)) {
//         $price_error = "Last Name is required.";
//     } 
//     else {
//         $price = $price;
//     }

//     $weight = trim($_POST["weight"]);
//     if (empty($weight)) {
//         $weight_error = "weight is required.";
//     } 
//     else {
//         $weight = $weight;
//     }

//     $manufacturer = trim($_POST["manufacturer"]);
//     if(empty($manufacturer)){
//         $manufacturer_error = "Phone Number is required.";
//     } else {
//         $manufacturer = $manufacturer;
//     }

//     $country = trim($_POST["country"]);
//     if(empty($country)){
//         $country_error = "country is required.";
//     } else {
//         $country = $country;
//     }

//     if (empty($name_error) && empty($price_error) && empty($weight_error) && empty($manufacturer_error) && empty($country_error) ) {
//           $sql = "INSERT INTO `product` (`name`, `price`, `weight`, `manufacturer`, `country`) VALUES ('$name', '$price', '$weight', '$manufacturer', '$country')";

//  if (mysqli_query($conn, $sql)) { //this is line 30
//         echo "New record created successfully";
//     } else {
//         echo "Error: " . $sql . "<br>" . mysqli_error($conn);
//     }

//           if (mysqli_query($conn, $sql)) {
//               echo "New record created successfully"; 
//               header("location: index.php");
//           } else {
//                echo "Something went wrong. Please try again later.";
//                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
//           }
//       }
//     mysqli_close($conn);
// }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create User</title>
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
                        <h2>Добавление продукта</h2>
                    </div>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group <?php echo (!empty($first_name_error)) ? 'has-error' : ''; ?>">
                            <label>Наименование товара</label>
                            <input type="text" name="first_name" class="form-control" value="" placeholder = "Например: футбольный мяч">
                            <span class="help-block"><?php echo $first_name_error;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($priceerror)) ? 'has-error' : ''; ?>">
                            <label>Цена товара</label>
                            <input type="text" name="price" class="form-control" value="" placeholder = "Пример: 1500">
                            <span class="help-block"><?php echo $priceerror;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($weight_error)) ? 'has-error' : ''; ?>">
                            <label>Вес товара</label>
                            <input type="weight" name="weight" class="form-control" value="" placeholder = "Пример: 350 (в граммах)">
                            <span class="help-block"><?php echo $weight_error;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($manufacturer_error)) ? 'has-error' : ''; ?>">
                            <label>Производитель</label>
                            <input type="text" name="manufacturer" class="form-control" value="" placeholder = "Пример: Adidas">
                            <span class="help-block"><?php echo $manufacturer_error;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($country_error)) ? 'has-error' : ''; ?>">
                            <label>Страна Производитель</label>
                            <input type="text" name="country" class="form-control" value="" placeholder = "Пример: США">
                            <span class="help-block"><?php echo $country_error;?></span>
                        </div>

                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="index.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>

<?php                 
        $conn = new mysqli('localhost', 'root', '', 'bogdan2');
                if ($conn -> connect_error)
                {
                    die("Error: " .$conn->connect_error);
                }
                else 
                {
                    echo "";
                }
                $name = $_REQUEST['first_name'];
                $price = $_REQUEST['price'];
                $weight = $_REQUEST['weight'];
                $manufacturer = $_REQUEST['manufacturer'];
                $country = $_REQUEST['country'];

    if (name != '')
    {
        $insert_sql = "INSERT INTO product (`id`, `name`, `price`, `weight`, `manufacturer`, `country`)
        VALUES (0, '{$name}', '{$price}', '{$weight}', '{$manufacturer}', '{$country}')";
    }

    if (mysqli_query($conn, $insert_sql)) { //this is line 30
        echo "New record created successfully";
    } else {
        echo "Error: " . $insert_sql . "<br>" . mysqli_error($conn);
    }

     ?>
                
            </div>
        </div>
    </div>
</body>
</html>