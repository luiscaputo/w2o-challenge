<?php
    // global $pdo;
    // session_start();
    // $id = $_SESSION['id_usuario'];
    // echo $id;
  require_once '../model/crud.class.php';
  require_once '../controller/connection.php';

  if(isset($_POST['save']))
  {
    $na = filter_input(INPUT_POST, 'name_actividade');
    $ga = filter_input(INPUT_POST, 'important');
    $pa = filter_input(INPUT_POST, 'intervenients');
    $da = filter_input(INPUT_POST, 'data');
    $ho = filter_input(INPUT_POST, 'hour');
    $de = filter_input(INPUT_POST, 'detalhes');
    $new = new new_agend;
      // $find_data = $pdo->prepare("SELECT * FROM agend WHERE data_actividade = '$da'");
      // $find_data->execute();
      // echo var_dump($find_data);
      // if($find_data->rowCount()>0){
      //   echo "<script>alert('executou')</script>";
      // }else
      //   echo 'n';
      // if($find_data->rowCount() > 0)
      // {
      //   $array_data = $find_data->fetch();
      //   $h = $array_data['hour'];
      //     if($ho == $h)
      //     {
      //       echo "<script>alert('Você Já tem uma actividade nessa data e na mesma Hora!')</script>";
      //     }else
      //     {
          $id = $_SESSION['id_usuario'];
           $save = $pdo->prepare("INSERT INTO agend(name_actividade, important, intervenients, data_actividade, hour, detalhes, user) VALUES('$na', '$ga', '$pa', '$da', '$ho', '$de', $id)");
            $save->execute();
              if($save->rowCount()>0)
              {
                 echo "<script>alert('Actividade marcada!')</script>";
               }else
               {
                 echo "<script>alert('Actividade não marcada! TENTE NOVAMENTE.')</script>";
               }
             //$new->create_agend($n, $g, $p, $d, $h, $D);
             #INSERT INTO `agend` (`id`, `name_actividade`, `important`, `intervenients`, `data_actividade`, `hour`, `type_agenda_id`, `user`, `detalhes`, `created_at`) VALUES (NULL, 'Pegar meu Certificado', 'yes', 'uj', '2021-05-05', '57:16:00', '1', '5', 'tttt', CURRENT_TIMESTAMP)
           #}
      // }
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
              <h3 class="text-center">Nova Actividade <br>
              <img src="assets/svg/new.svg" class="text-center" width="300" height="300" alt="">
              </h3>
             
                <div class="container">
                  <form action="" method="post" class="form-control">
                  <div class="mb-3">
                      <label for="exampleFormControlInput1" class="form-label">Nome da Actividade</label>
                      <input type="text" name="name_actividade" class="form-control" id="exampleFormControlInput1" placeholder="Fazer compras" required>
                    </div>

                    <div class="mb-3">
                      <label for="exampleFormControlInput1" class="form-label">Grau de Importância</label>
                      <select class="form-select" aria-label="Default select example" name="important" required>
                        <option selected>Selecione aqui</option>
                        <option value="Extremo">Extremo</option>
                        <option value="Máximo">Máximo</option>
                        <option value="Médio">Médio</option>
                        <option value="Baixo">Baixo</option>
                        <option value="Não Importante">Não Importante</option>
                      </select>                    
                    </div>

                    <div class="mb-3">
                      <label for="exampleFormControlInput1" class="form-label">Participantes</label>
                      <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Lucas, Natanael..." name="intervenients">
                    </div>

                    <div class="mb-3">
                      <label for="exampleFormControlInput1" class="form-label">Data da Actividade</label>
                      <input type="date" class="form-control" id="exampleFormControlInput1" placeholder="25/05/2021" name="data" required>
                    </div>

                    <div class="mb-3">
                      <label for="exampleFormControlInput1" class="form-label">Hora da Actividade</label>
                      <input type="time" class="form-control" id="exampleFormControlInput1" placeholder="12:00:00 00" name="hour" required>
                    </div>

                    <div class="mb-3">
                      <label for="exampleFormControlTextarea1" class="form-label">Detalhes</label>
                      <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="detalhes"></textarea>
                    </div>
                    <div class="mb-3">
                        <button type="submit" name="save" class="btn btn-success form-control">Salvar Actividade</button>
                    </div>
                  </form>
                </div>  
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
<script src="https://unpkg.com/ionicons@5.5.1/dist/ionicons.js"></script>
</body>
</html>