<?php
    global $pdo;
    require_once '../controller/connection.php';
  if(isset($_POST['save']))
  {
    $id = filter_input(INPUT_POST, 'idDelete');
    $campo = filter_input(INPUT_POST, 'campo');
    $valor = filter_input(INPUT_POST, 'date_update');
    
    $a = $pdo->prepare("UPDATE agend set $campo = '$valor' where id = '$id'");
    $a->execute();
    if($a->rowCount()>0)
    {
      echo "<script>alert('Dado Actualizado!')</script>";
    }else
    {
      echo "<script>alert('Dado Não Actualizado!')</script>";
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
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap5.min.js"></script>
 <div class="container">
  <div class="row">
    <div class="col-12">
      <div class="container-fluid mt--6">
        <div class="row justify-content-center">
          <div class=" col ">
            <div class="card">
              <div class="card-header bg-transparent ">
              <div class="table-responsive col-md-12 align-center">
              <h3 class="text-center">Actualizar Actividade <br>
                <img src="assets/svg/update.svg" width="300" height="300" alt="">
              
                <form action="" method="post" class=" form-control">
                    <div class="mb-3">
                    <select class="form-select" name="idDelete" aria-label="Default select example">
                          <option selected>Selecione a Registro a Actualizar</option>
                          <?php
                            $id = $_SESSION['id_usuario'];
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
                      <select name="campo" class="form-control text-center " id="" required>
                        <option value="" desable>Selecione onde vai alterar</option>
                        <option value="name_actividade">Nome da Actividade</option>
                        <option value="important">Importância/Prioridade</option>
                        <option value="intervenients">Participantes</option>
                        <option value="data_actividade">Data da Actividade</option>
                        <option value="hour">Hora da Actividade</option>
                        <option value="detalhes">Acrescentar os Detalhes</option> 
                      </select>
                    </div>
                    <div class="mb-3">
                      <input type="text" name="date_update" id="" class="form-control " placeholder="de s para v"><br>
                      <button type="submit" name="save" class="btn btn-success w-25 p-1">Salvar alteração</button><br>
                    </div>
                </form>
                </h3>
              <?php
          
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