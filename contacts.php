<DOCTYPE html>

<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
      

   <?php 
    $title = "SK - контакты";?>
    <title>SPORTKLIM</title>
</head>
<body>
    
    <?php require_once "components/header.php" ?>
    <div class = "container">
    <h1 class = "text-center">Наши контакты</h1>
<section>
    <div class = "row">
        <div class = "col">
            <div class = "text-center ">Администраторы</div>
            <div>
                <?php 
                require_once "config.php";

                $data = "SELECT * FROM employee WHERE position = 'Администратор'";
                if ($employee = mysqli_query($conn, $data))
                {
                    if (mysqli_num_rows($employee) > 0)
                    {
                        while ($employee_unit = mysqli_fetch_array($employee))
                        {
                            echo "<p> - " . $employee_unit['name'] . ", Телефон: " . $employee_unit['phone'] . "</p>";
                        }
                    }
                }
                ?>
</div>

        </div>


        <div class = "col">
            <div class = "text-center">Наши магазины</div>

            <div>
                <?php 
                require_once "config.php";

                $data = "SELECT * FROM stock ";
                if ($stock = mysqli_query($conn, $data))
                {
                    if (mysqli_num_rows($stock) > 0)
                    {
                        while ($stock_unit = mysqli_fetch_array($stock))
                        {
                            echo "<p> - " . $stock_unit['adress'] . ", открыто </p>";
                        }
                    }
                }
                ?>
</div>

        </div>
</div>
</section>
</div>
</body>