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
                        <div class="form-group <?php echo (!empty($adress_error)) ? 'has-error' : ''; ?>">
                            <label>Адресс склада</label>
                            <input type="text" adress="adress" class="form-control" value="" placeholder = "Например: г. Симферополь, ул. Севастопольская 22А">
                            <span class="help-block"><?php echo $adress_error;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($square_error)) ? 'has-error' : ''; ?>">
                            <label>Площадь склада</label>
                            <input type="text" adress="square" class="form-control" value="" placeholder = "Пример: 365">
                            <span class="help-block"><?php echo $square_error;?></span>
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
                $adress = $_REQUEST['adress'];
                $square = $_REQUEST['square'];

    if (adress != '')
    {
        $insert_sql = "INSERT INTO stock (`adress`, `square`, `active`)
        VALUES ('{$adress}', '{$square}', 1)";
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