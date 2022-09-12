<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Просмотр сотрудника</title>
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
        require_once "../config.php";

        $id = trim($_GET["id"]);
        $query = mysqli_query($conn, "SELECT * FROM employee WHERE ID = '$id'");

        if ($user = mysqli_fetch_assoc($query)) {
            $name        = $user["name"];
            $phone       = $user["phone"];
            $position       = $user["position"];
            $adopt_date = $user["adopt_date"];
            $dismissial_date     = $user["dismissial_date"];
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
                        <h1> Данные о сотруднике</h1>
                    </div>
                    <div class="form-group">
                        <label>Имя</label>
                        <p class="form-control-static"><?php echo $name ?></p>
                    </div>
                    <div class="form-group">
                        <label>Телефон</label>
                        <p class="form-control-static"><?php echo $phone ?></p>
                    </div>
                    <div class="form-group">
                        <label>Должность</label>
                        <p class="form-control-static"><?php echo $position ?></p>
                    </div>
                    <div class="form-group">
                        <label>Дата устройства</label>
                        <p class="form-control-static"><?php echo $adopt_date ?></p>
                    </div>
                    <div class="form-group">
                        <label>Дата увольнения (если есть)</label>
                        <p class="form-control-static"><?php echo $dismissial_date ?></p>
                    </div>
                    <p><a href="index.php" class="btn btn-primary">Back</a></p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>