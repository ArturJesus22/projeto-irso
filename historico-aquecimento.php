<?php
// Includes
include_once("./php/verifSession.php");
include_once("./php/dbcon.php");

// Temperatura
$temperatura=mysqli_query($con, "SELECT * FROM temperatura");

// Ar condicionado
$arcondicionado=mysqli_query($con, "SELECT * FROM arcondicionado");

// Aquecedor
$aquecedor=mysqli_query($con, "SELECT * FROM aquecedor");

?>
<!DOCTYPE html>
<html lang="pt">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <meta http-equiv="refresh" content="5">
    <title>Dashboard</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/dashboard/">

    <!-- Bootstrap core CSS -->
    <link href="https://getbootstrap.com/docs/5.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    <!-- Custom styles for this template -->
    <link href="./css/dash.css" rel="stylesheet">

  </head>
  <body>
    
    <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">Projeto IRSO</a>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
        <div class="navbar-nav">
            <div class="nav-item text-nowrap">
            <a class="nav-link px-3" href="./logout.php"><i class="fa-solid fa-right-from-bracket"></i> Terminar sessão</a>
            </div>
        </div>
    </header>

    <div class="container-fluid">
        <div class="row">
            <?php include_once("./navbar.php"); ?>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Histórico do sistema de aquecimento</h1>    
            </div>

            <div class="row">
                <div class="col-md-4">
                    <h3>Temperatura</h3>  
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Temperatura</th>
                                <th scope="col">Data e hora</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while($resTemperatura=mysqli_fetch_assoc($temperatura)): ?>
                            <tr>
                                <th scope="row"><?php echo $resTemperatura["id"]; ?></th>
                                <td>
                                    <?php  
                                        echo $resTemperatura["valor"];
                                    ?>
                                </td>
                                <td>
                                    <?php echo $resTemperatura["hora"]; ?>
                                </td>
                            </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-4">
                    <h3>Ar condicionado</h3>  
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Estado</th>
                                <th scope="col">Data e hora</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while($resArCond=mysqli_fetch_assoc($arcondicionado)): ?>
                            <tr>
                                <th scope="row"><?php echo $resArCond["id"]; ?></th>
                                <td>
                                    <?php  
                                        if($resArCond["valor"]==0) {
                                            echo "Desligado";
                                        } else {
                                            echo "Ligado";
                                        }
                                    ?>
                                </td>
                                <td>
                                    <?php echo $resArCond["hora"]; ?>
                                </td>
                            </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-4">
                    <h3>Aquecedor</h3>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Estado</th>
                                <th scope="col">Data e hora</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while($resAquecedor=mysqli_fetch_assoc($aquecedor)): ?>
                            <tr>
                                <th scope="row"><?php echo $resAquecedor["id"]; ?></th>
                                <td>
                                    <?php  
                                        if($resAquecedor["valor"]==0) {
                                            echo "Desligado";
                                        } else {
                                            echo "Ligado";
                                        }
                                    ?>
                                </td>
                                <td>
                                    <?php echo $resAquecedor["hora"]; ?>
                                </td>
                            </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            
            </main>
        </div>
    </div>

    <script src="https://getbootstrap.com/docs/5.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="dashboard.js"></script>
  </body>
</html>