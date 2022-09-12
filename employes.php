<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
      <title>Сотрудники</title>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
      <style type="text/css">
          .wrapper {
              width: 1200px;
              margin: 0 auto;
          }
      </style>
  </head>
  <body>
    <wrapper>
<?php 

require_once "components/header_admin.php";

?>

    <div class="wrapper">
        <div class="container-fluid">
          
        <h1>СПОРТ-КЛИМ</h1>
            <div class="row">
              <h2 class="text-center">Интернет-магазин спортивных товаров</h2>
                <div class="col-md-12">
                    <div class="page-header clearfix">
                        <h2 class="pull-left">Сотрудники</h2>
                        <a href="create.php" class="btn btn-success pull-right">Добавить новый товар</a>
                    </div>
                    <?php
                    // Include config file
                    require_once "../config.php";

                    // select all users
                    $data = "SELECT * FROM employee WHERE name != ''";
                    if($employee = mysqli_query($conn, $data)){
                        if(mysqli_num_rows($employee) > 0){
                            echo "<table class='table table-bordered table-striped'>
                                    <thead>
                                      <tr>
                                        <th>#</th>
                                        <th>Имя</th>
                                        <th>Телефон</th>
                                        <th>Должность</th>
                                        <th>Дата устройства</th>
                                        <th>Дата увольнения (если есть)</th>
                                      </tr>
                                    </thead>
                                    <tbody>";
                                while($employee_unit = mysqli_fetch_array($employee)) {
                                    echo "<tr>
                                            <td>" . $employee_unit['id'] . "</td>
                                            <td>" . $employee_unit['name'] . "</td>
                                            <td>" . $employee_unit['phone'] . "</td>
                                            <td>" . $employee_unit['position'] . "</td>
                                            <td>" . $employee_unit['adopt_date'] . "</td>
                                            <td>" . $employee_unit['dismissial_date'] . "</td>
                                            <td>
                                              <a href='reads/read_employee.php?id=". $employee_unit['id'] ."' title='Просмотреть товар' data-toggle='tooltip'><span class='glyphicon glyphicon-eye-open'></span></a>
                                              <a href='edit/edit_employee.php?id=". $employee_unit['id'] ."' title='Редактировать товар' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a>
                                              <a href='delete/delete_employee.php?id=". $employee_unit['id'] ."' title='Удалить товар' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span></a>
                                            </td>
                                          </tr>";
                                }
                                echo "</tbody>
                                </table>";
                            mysqli_free_result($employee);
                        } else{
                            echo "<p class='lead'><em>No records found.</em></p>";
                        }
                    } else{
                        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
                    }

                    // Close connection
                    mysqli_close($conn);
                    ?>
                </div>
            </div>
        </div>
    </div>
  </body>
                  </wrapper>
</html>