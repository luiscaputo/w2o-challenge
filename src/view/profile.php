<?php
    global $pdo;
    require_once '../controller/connection.php';
    $id = $_SESSION['id_usuario'];
    if(isset($_POST['actualizar']))
    {
      $valor = filter_input(INPUT_POST, 'name');
      $alter = filter_input(INPUT_POST, 'alter');
       
          $u = $pdo->prepare("UPDATE user SET $alter = '$valor' where id='$id'");
          $u->execute();
          if($u->rowCount() > 0)
          {
            echo "<script>alert('Dado Actualizado!')</script>";
          }else
            {
              echo "<script>alert('Dado não Actualizado!')</script>";
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
              <h3 class="text-center">MEU PERFIL</h3>
              <div class="container">
                <div class="row">
                  <div class="col text-center">
                    <img src="assets/svg/profile.svg" width="300" height="300" alt=""><br>
                    <small class="text-success text-center"><b>Online</b></small> <br>
                   <a href="logout"> <small class="text-danger text-center"><b>Terminar Secção</b></small></a>                
              
                </div>
                  <div class="col">
                    <?php 
                      $id = $_SESSION['id_usuario'];
                      $find_all = $pdo->prepare("SELECT * FROM user WHERE id = '$id'");
                      $find_all->execute();
                      $find_all_array = $find_all->fetch();
                    ?>
                    <form action="" method="post">
                      <p>Edite ou Elimine sua conta aqui</p>
                      <h4>Meus dados actuais</h4>
                      <p>
                        <b>
                          Meu nome Actual: <?php echo $find_all_array['name'];?> <br> 
                          Meu Email Actual: <?php echo $find_all_array['email'];?><br>
                          Minha Ocupação: <?php echo $find_all_array['ocupation'];?>
                        </b>
                      </p>
                      <select class="form-select" name="alter" aria-label="Default select example">
                        <option selected>O QUE QUER ALTERAR?</option>
                        <option value="name">Nome</option>
                        <option value="email">Email</option>
                        <option value="ocupation">Ocupação</option>
                        <option value="password">Palavra Passe</option>
                      </select><br>
                      <input type="text" name="name" class="form-control" id="exampleFormControlInput1" placeholder="Novo valor" ><br>
                      <button type="submit" name="actualizar" class="btn btn-success text-center w-25 p-1">Actualizar </button>
                      <button type="submit" name="all" class="btn btn-success w-25 p-1" disabled>Apagar Conta</button><br>
                    </form>
                  </div>
                </div>
                <hr>
              </div>
              <h5 class="text-center">ESTADO DA MINHA CONTA</h5>
              <div class="container">
                <div class="row">
                  <div class="col mt-3">
                  <p>
                        <b>
                          Total de Actividades: 
                          <?php 
                            $id = $_SESSION['id_usuario'];
                            $t = $pdo->prepare("SELECT count(id) from agend where user = '$id'");
                            $t->execute();
                            $ar = $t->fetch();
                            echo $ar[0]. '- até o momento';
                          ?> 
                          <br> 
                          Actividades Importantes: 
                          <?php 
                            $id = $_SESSION['id_usuario'];
                            $t = $pdo->prepare("SELECT count(id) from agend where important like'%Extremo%' and user = '$id'");
                            $t->execute();
                            $ar = $t->fetch();
                            echo $ar[0]. '- até o momento';                          ?>
                          <br>
                          Não Importantes: 
                          <?php 
                            $id = $_SESSION['id_usuario'];
                            $t = $pdo->prepare("SELECT count(id) from agend where important like'%%' and user = '$id'");
                            $t->execute();
                            $ar = $t->fetch();
                            echo $ar[0]. '- até o momento'; 
                          ?>
                          <br>
                          Actividades Realizadas: 
                          <?php 
                            global $pdo;
                            $dia = date('d');
                            $mes = date('m');
                            $id = $_SESSION['id_usuario'];
                            $sql = $pdo->prepare("SELECT * FROM agend WHERE id='$id'");
                            $sql->execute();
                            $a = $sql->fetch(pdo::FETCH_ASSOC);
                            // echo var_dump($a);
                            // $data = $arrar['data_actividade'];
                            // $data_div = explode('-', $data);
                            // echo $data;
                            // $t = $pdo->prepare("SELECT count(id) from agend where important like'%%' and user = '$id'");
                            // $t->execute();
                            // $ar = $t->fetch();
                            // echo $ar[0]. '- até o momento'; 
                          ?>
                          <br>
                          Actividades por Realizar: 
                          <?php 
                            //echo $find_all_array['ocupation'];
                          ?>

                        </b>
                      </p>
                  </div>
                  <div class="col">
                    <img src="assets/svg/statistic.svg" width="300" height="300" alt=""><br>
                  </div>
                </div>
              </div>
              <?php
                  require_once '../controller/connection.php';
                  global $pdo;
                ?>
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