<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
      <title>Dashboard</title>
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
  <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #FF8A00;" class = "container-fluid">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">СПОРТ-КЛИМ</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Главная</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Товары</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Контакты</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
        </li>
      </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>

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
                  </wrapper>
</html>