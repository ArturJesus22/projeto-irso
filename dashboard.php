<?php
// Includes
include_once("./php/verifSession.php");
include_once("./php/dbcon.php");

// Temperatura
$temperatura=mysqli_query($con, "SELECT * FROM temperatura ORDER BY id DESC");
$resTemperatura=mysqli_fetch_assoc($temperatura);

// Ar condicionado
$arCondicionado=mysqli_query($con, "SELECT * FROM arcondicionado ORDER BY id DESC");
$resArCondicionado=mysqli_fetch_assoc($arCondicionado);

// Aquecedor
$aquecedor=mysqli_query($con, "SELECT * FROM aquecedor ORDER BY id DESC");
$resAquecedor=mysqli_fetch_assoc($aquecedor);

// Sistema de incêndio
$incendio=mysqli_query($con, "SELECT * FROM incendio ORDER BY id DESC");
$resIncendio=mysqli_fetch_assoc($incendio);

// Sistema do empilhador
$empilhador=mysqli_query($con, "SELECT * FROM fumo ORDER BY id DESC");
$resEmpilhador=mysqli_fetch_assoc($empilhador);

// Portão
$portao=mysqli_query($con, "SELECT * FROM portao ORDER BY id DESC");
$resPortao=mysqli_fetch_assoc($portao);

// Sistema de luzes
$luzes=mysqli_query($con, "SELECT * FROM luzes ORDER BY id DESC");
$resLuzes=mysqli_fetch_assoc($luzes);

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
                <h1 class="h2">Sistema de aquecimento</h1>    
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-4">  
                    <div class="card mb-3" style="max-width: 540px;">
                        <div class="row g-0">
                            <div class="col-md-4 d-flex justify-content-center align-items-center">
                                <i class="fa-solid fa-temperature-three-quarters icon-card"></i>
                            </div>
                            <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">Temperatura</h5>
                                <p class="card-text">
                                <?php
                                    if($resTemperatura!="" || $resTemperatura!=NULL) { 
                                        echo $resTemperatura["valor"]; 
                                    } else {
                                        echo "N/A";
                                    }
                                    
                                ?>
                                    °C
                                </p>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4">
                    <div class="card mb-3" style="max-width: 540px;">
                        <div class="row g-0">
                            <div class="col-md-4 d-flex justify-content-center align-items-center">
                                <i class="fa-solid fa-snowflake icon-card"></i>
                            </div>
                            <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">Ar condicionado</h5>
                                <p class="card-text">
                                    <?php  
                                        if($resArCondicionado["valor"]==0) {
                                            echo "Desligado";
                                        } else if($resArCondicionado["valor"]==1) {
                                            echo "Ligado";
                                        } else {
                                            echo "N/A";
                                        }
                                    ?>
                                </p>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4">
                    <div class="card mb-3" style="max-width: 540px;">
                        <div class="row g-0">
                            <div class="col-md-4 d-flex justify-content-center align-items-center">
                                <i class="fa-solid fa-fire icon-card"></i>
                            </div>
                            <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">Aquecedor</h5>
                                <p class="card-text">
                                <?php  
                                        if($resAquecedor["valor"]==0) {
                                            echo "Desligado";
                                        } else if($resAquecedor["valor"]) {
                                            echo "Ligado";
                                        } else {
                                            echo "N/A";
                                        }
                                    ?>
                                </p>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Sistema de incêndio</h1>    
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-4">  
                    <div class="card mb-3" style="max-width: 540px;">
                        <div class="row g-0">
                            <div class="col-md-4 d-flex justify-content-center align-items-center">
                                <i class="fa-solid fa-fire icon-card"></i>
                            </div>
                            <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">Sensor de fogo</h5>
                                <p class="card-text">
                                    <?php
                                    if($resIncendio["valor"]==0) {
                                        echo "Incêndio não detetado";
                                    } else if($resIncendio["valor"]==1) {
                                        echo "Incêndio detetado";
                                    } else {
                                        echo "N/A";
                                    }
                                    ?>
                                </p>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4">
                    <div class="card mb-3" style="max-width: 540px;">
                        <div class="row g-0">
                            <div class="col-md-4 d-flex justify-content-center align-items-center">
                                <i class="fa-solid fa-fire-extinguisher icon-card"></i>
                            </div>
                            <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">Enxintor de incêndio</h5>
                                <p class="card-text">
                                    <?php
                                    if($resIncendio["valor"]==0) {
                                        echo "Desligado";
                                    } else if($resIncendio["valor"]==1) {
                                        echo "Ligado";
                                    } else {
                                        echo "N/A";
                                    }

                                    ?>
                                </p>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Sistema de luzes</h1>    
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-4">  
                    <div class="card mb-3" style="max-width: 540px;">
                        <div class="row g-0">
                            <div class="col-md-4 d-flex justify-content-center align-items-center">
                                <i class="fa-solid fa-triangle-exclamation icon-card"></i>
                            </div>
                            <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">Sensor de movimento</h5>
                                <p class="card-text">
                                    <?php
                                    if($resLuzes["valor"]==0) {
                                        echo "Movimento não detetado";
                                    } else if($resLuzes["valor"]==1) {
                                        echo "Movimento detetado";
                                    } else {
                                        echo "N/A";
                                    }
                                    ?>
                                </p>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4">
                    <div class="card mb-3" style="max-width: 540px;">
                        <div class="row g-0">
                            <div class="col-md-4 d-flex justify-content-center align-items-center">
                                <i class="fa-solid fa-lightbulb icon-card"></i>
                            </div>
                            <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">Luzes do armazém</h5>
                                <p class="card-text">
                                <?php
                                    if($resLuzes["valor"]==0) {
                                        echo "Apagadas";
                                    } else if($resLuzes["valor"]==1) {
                                        echo "Ligadas";
                                    } else {
                                        echo "N/A";
                                    }
                                ?>
                                </p>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Sistema de circulação do empilhador</h1>    
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-4">  
                    <div class="card mb-3" style="max-width: 540px;">
                        <div class="row g-0">
                            <div class="col-md-4 d-flex justify-content-center align-items-center">
                                <i class="fa-solid fa-triangle-exclamation icon-card"></i>
                            </div>
                            <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">Sensor de deteção fumo</h5>
                                <p class="card-text">
                                    <?php
                                    if($resEmpilhador["valor"]==0) {
                                        echo "Fumo não detetado";
                                    } else if($resEmpilhador["valor"]==1) {
                                        echo "Fumo detetado";
                                    } else {
                                        echo "N/A";
                                    }
                                    ?>
                                </p>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4">
                    <div class="card mb-3" style="max-width: 540px;">
                        <div class="row g-0">
                            <div class="col-md-4 d-flex justify-content-center align-items-center">
                                <i class="fa-solid fa-fire icon-card"></i>
                            </div>
                            <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">Alarme do empilhador</h5>
                                <p class="card-text">
                                <?php
                                    if($resEmpilhador["valor"]==0) {
                                        echo "Desligado";
                                    } else if($resEmpilhador["valor"]==1) {
                                        echo "Ligado";
                                    } else {
                                        echo "N/A";
                                    }
                                    ?>
                                </p>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4">
                    <div class="card mb-3" style="max-width: 540px;">
                        <div class="row g-0">
                            <div class="col-md-4 d-flex justify-content-center align-items-center">
                                <i class="fa-solid fa-car icon-card"></i>
                            </div>
                            <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">Empilhador</h5>
                                <p class="card-text">
                                <?php
                                    if($resEmpilhador["valor"]==0) {
                                        echo "Parado";
                                    } else if($resEmpilhador["valor"]==1) {
                                        echo "Em circulação";
                                    } else {
                                        echo "N/A";
                                    }
                                    ?>
                                </p>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Controlador do portão</h1>    
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-4">  
                    <div class="card mb-3" style="max-width: 540px;">
                        <div class="row g-0">
                            <div class="col-md-4 d-flex justify-content-center align-items-center">
                                <i class="fa-solid fa-door-closed icon-card"></i>
                            </div>
                            <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">Portão</h5>
                                <p class="card-text">
                                    <?php
                                    if($resPortao["valor"]==0) {
                                        echo "Fechado";
                                    } else if($resPortao["valor"]==1) {
                                        echo "Aberto";
                                    } else {
                                        echo "N/A";
                                    }
                                    ?>
                                </p>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            </main>
        </div>
    </div>

    <script src="https://getbootstrap.com/docs/5.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="dashboard.js"></script>
  </body>
</html>