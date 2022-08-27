<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
      <title>Dashboard</title>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
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
          
        <h1>СПОРТ-КЛИМ</h1>
            <div class="row">
              <h2 class="text-center">Интернет-магазин спортивных товаров</h2>
                <div class="col-md-12">
                    <div class="page-header clearfix">
                        <h2 class="pull-left">Товары</h2>
                        <a href="create.php" class="btn btn-success pull-right">Добавить новый товар</a>
                    </div>
                    <?php
                    // Include config file
                    require_once "config.php";

                    // select all users
                    $data = "SELECT * FROM product WHERE name != ''";
                    if($product = mysqli_query($conn, $data)){
                        if(mysqli_num_rows($product) > 0){
                            echo "<table class='table table-bordered table-striped'>
                                    <thead>
                                      <tr>
                                        <th>#</th>
                                        <th>Имя</th>
                                        <th>Цена</th>
                                        <th>Вес</th>
                                        <th>Производитель</th>
                                        <th>Страна</th>
                                      </tr>
                                    </thead>
                                    <tbody>";
                                while($product_unit = mysqli_fetch_array($product)) {
                                    echo "<tr>
                                            <td>" . $product_unit['id'] . "</td>
                                            <td>" . $product_unit['name'] . "</td>
                                            <td>" . $product_unit['price'] . "</td>
                                            <td>" . $product_unit['weight'] . "</td>
                                            <td>" . $product_unit['manufacturer'] . "</td>
                                            <td>" . $product_unit['country'] . "</td>
                                            <td>
                                              <a href='read.php?id=". $product_unit['id'] ."' title='Просмотреть товар' data-toggle='tooltip'><span class='glyphicon glyphicon-eye-open'></span></a>
                                              <a href='edit.php?id=". $product_unit['id'] ."' title='Редактировать товар' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a>
                                              <a href='delete.php?id=". $product_unit['id'] ."' title='Удалить товар' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span></a>
                                            </td>
                                          </tr>";
                                }
                                echo "</tbody>
                                </table>";
                            mysqli_free_result($product);
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
</html>