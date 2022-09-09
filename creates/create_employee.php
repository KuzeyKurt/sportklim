<?php

// ПОКА ТУТ СОДЕРЖИМОЕ СТРАНИЦЫ CREATE_PRODUCT.PHP


// require_once "config.php";

// $name = $phone = $position = $adopt_date = $dismissal_date = "";
// $name_error = $phoneerror = $position_error = $adopt_date_error = $dismissDate_error = "";

// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     $name = trim($_POST["name"]);
//     if (empty($name)) {
//         $name_error = "Name is required.";
//     } 
//     else {
//         $name = $name;
//     }

//     $phone = trim($_POST["phone"]);

//     if (empty($phone)) {
//         $phone_error = "Last Name is required.";
//     } 
//     else {
//         $phone = $phone;
//     }

//     $position = trim($_POST["position"]);
//     if (empty($position)) {
//         $position_error = "position is required.";
//     } 
//     else {
//         $position = $position;
//     }

//     $adopt_date = trim($_POST["adopt_date"]);
//     if(empty($adopt_date)){
//         $adopt_date_error = "Phone Number is required.";
//     } else {
//         $adopt_date = $adopt_date;
//     }

//     $dismissal_date = trim($_POST["dismissal_date"]);
//     if(empty($dismissal_date)){
//         $dismissDate_error = "dismissal_date is required.";
//     } else {
//         $dismissal_date = $dismissal_date;
//     }

//     if (empty($name_error) && empty($phone_error) && empty($position_error) && empty($adopt_date_error) && empty($dismissDate_error) ) {
//           $sql = "INSERT INTO `product` (`name`, `phone`, `position`, `adopt_date`, `dismissal_date`) VALUES ('$name', '$phone', '$position', '$adopt_date', '$dismissal_date')";

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
                        <h2>Create User</h2>
                    </div>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group <?php echo (!empty($name)) ? 'has-error' : ''; ?>">
                            <label>Добавление сотрудника</label>
                            <input type="text" name="name" class="form-control" value="" placeholder = "Например: Руслан Русланов">
                            <span class="help-block"><?php echo $name_error;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($phone_error)) ? 'has-error' : ''; ?>">
                            <label>Телефон сотрудника</label>
                            <input type="text" name="phone" class="form-control" value="" placeholder = "Например: +7978-88-88-888">
                            <span class="help-block"><?php echo $phone_error;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($position_error)) ? 'has-error' : ''; ?>">
                            <label>Должность сотрудника</label>
                            <input type="position" name="position" class="form-control" value="" placeholder = "Например: Системный администратор">
                            <span class="help-block"><?php echo $position_error;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($adoptDate_error)) ? 'has-error' : ''; ?>">
                            <label>Дата начала работы</label>
                            <input type="date" name="adopt_date" class="form-control" value="">
                            <span class="help-block"><?php echo $adoptDate_error;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($dismissDate_error)) ? 'has-error' : ''; ?>">
                            <label>Дата увольнения (если есть)</label>
                            <input type="date" name="dismissal_date" class="form-control" value="">
                            <span class="help-block"><?php echo $dismissDate_error;?></span>
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
                $name = $_REQUEST['name'];
                $phone = $_REQUEST['phone'];
                $position = $_REQUEST['position'];
                $adopt_date = $_REQUEST['adopt_date'];
                $dismissal_date = $_REQUEST['dismissal_date'];

    if (first_name != '')
    {
        $insert_sql = "INSERT INTO employee (`id`, `name`, `phone`, `position`, `adopt_date`, `dismissal_date`)
        VALUES (0, '{$name}', '{$phone}', '{$position}', '{$adopt_date}', '{$dismissal_date}')";
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