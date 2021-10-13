<?php
    global $pdo;
    require_once '../controller/connection.php';
    if(isset($_POST['idB']))
    {
      $id = filter_input(INPUT_POST, 'idDelete');
      $find = $pdo->prepare("SELECT * FROM agend WHERE user = '$id'");
      $find->execute();
      if($find->rowCount()>0)
      {
        $d = $pdo->prepare("DELETE FROM agend WHERE id='$id'");
        $d->execute();
        if($d->rowCount() > 0)
        {
          echo "<script>alert('Actividade Eliminada!')</script>";
        }else
        {
          echo "<script>alert('Desculpa! Actividade não Eliminada!')</script>";
        }
      }
    }
    if(isset($_POST['all']))
    {
      $id = $_SESSION['id_usuario'];
      echo "<script>confirm('Deseja Realmente Eliminar Todas suas actividades?')</script>";
      $f = $pdo->prepare("SELECT * FROM agend WHERE user='$id'");
      $f->execute();
      if($f->rowCount() > 0)
      {
        $al = $pdo->prepare("DELETE FROM agend");
        $al->execute();
        if($al->rowCount() > 0){
          echo "<script>alert('Todas suas actividades foram eliminadas')</script>";
        }else
          {
            echo "<script>alert('ERRO: Tente Novamente!')</script>";
          }
      }else
        {
          echo "<script>alert('ERRO: Você não tem actividades gravadas!')</script>";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="assets/frame/css/bootstrap.css">
  <link rel="stylesheet" href="assets/frame/js/bootstrap.js">
  <title>Agenda</title>
  <style>
    a
    {
      color: white;
    }
    a:hover{
      color: white;
    }
  </style>
</head>
<body class="bg-ligth text-white">
<div class="container-fluid">
    <div class="row flex-nowrap">
        <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
            <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                <a href="/" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                  <span class="fs-5 d-none d-sm-inline"><strong>DESAFIO W2O</strong></span>
                </a>
                <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start mt-3" id="menu">
                    <li class="nav-item">
                        <a href="user" class="nav-link align-middle px-0">
                        <ion-icon name="calendar-number-outline"></ion-icon> <span class="ms-1 d-none d-sm-inline">Minha Agenda</span>
                        </a>
                    </li>
                    <li>
                        <a href="new" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                            <i class="fs-4 bi-speedometer2"></i> <span class="ms-1 d-none d-sm-inline">Nova Actividade</span> </a>
                    </li>
                    <li>
                        <a href="review" class="nav-link px-0 align-middle">
                            <i class="fs-4 bi-table"></i> <span class="ms-1 d-none d-sm-inline">Rever Actividades</span></a>
                    </li>
                    <li>
                        <a href="upgrade" data-bs-toggle="collapse" class="nav-link px-0 align-middle ">
                            <i class="fs-4 bi-bootstrap"></i> <span class="ms-1 d-none d-sm-inline">Actualizar Actividade</span></a>
                    </li>
                    <li>
                        <a href="profile" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                            <i class="fs-4 bi-grid"></i> <span class="ms-1 d-none d-sm-inline">Meu Perfil</span> </a>
                    </li>
                    <li>
                        <a href="configurations" class="nav-link px-0 align-middle">
                            <i class="fs-4 bi-people"></i> <span class="ms-1 d-none d-sm-inline">Configurações</span> </a>
                    </li>
                </ul>
                <hr>
                <div class="pb-4 text-center">
                        <span class="d-none d-sm-inline mx-1">&copy;2021 - Luís Caputo</span>
                    </a>
                   
                </div>
            </div>
        </div>
        <br><br><br>
<div class="col py-3 text-dark">
 <div class="container">
  <div class="row">
    <div class="col-12">
      <div class="container-fluid mt--6">
        <div class="row justify-content-center">
          <div class=" col ">
            <div class="card">
              <div class="card-header bg-transparent ">
              <div class="table-responsive col-md-12 align-center">
              <h3 class="text-center">Eliminar Actividades <br>
                <img src="assets/svg/review.svg" width="300" height="300" alt="">
              </h3>
                  <form action="" method="post" class="text-center form-control">
                    <div class="mb-3">
                      <label for="" class="">              
                        <select class="form-select" name="idDelete" aria-label="Default select example">
                          <option selected>Selecione a Actividade a Eliminar</option>
                          <?php
                            $p = $pdo->prepare("SELECT * FROM vagas");
                            $p->execute();
                            while($x = $p->fetch(PDO::FETCH_ASSOC))
                            {  
                          ?>
                            <option value="<?php echo $x['id']?>"><?php echo $x['categoria']?></option>
                          <?php
                            }
                          ?>
                          </select>
                    </div>
                        
                    <div class="mb-3">
                      <label for="" class="">              
                        <select class="form-select" name="idDelete" aria-label="Default select example">
                          <option selected>Selecione a Categoria da Vaga</option>
                          <?php
                            $p = $pdo->prepare("SELECT * FROM agend where user='$id'");
                            $p->execute();
                            while($x = $p->fetch(PDO::FETCH_ASSOC))
                            {  
                          ?>
                            <option value="<?php echo $x['id']?>"><?php echo $x['name_actividade']?></option>
                          <?php
                            }
                          ?>
                          </select>
                    </div>

                    <div class="mb-3">
                      <button type="submit" name="idB" class="btn btn-success">Apagar Selecionada</button>
                    </div>
                    <div class="mb-3">
                      <button type="submit" name="all" class="btn btn-success">Apagar todos</button><br>
                    </div>
                    </label>
                  </form>
                </div>
                </div>
              </div>
            </div>
          </div>
       </div>
    </div>
    <br><br><br>
  </div>
      </div>
    </div>
</div>
</body>
</html>