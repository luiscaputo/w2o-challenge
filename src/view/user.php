
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="assets/frame/css/bootstrap.css">
  <link rel="stylesheet" href="assets/frame/js/bootstrap.js">
  <title>Todas Empresas</title>
  <style>
    a{
      color: white;
      text-decoration: none;
    }
    a:hover{
      color: black;
      background-color: white;
      border: 1px;
    }
    li:hover{
      background-color: white;
      border-radius: 8px;
      width: 100%;
      height: auto;
      transition: 2s;
    }
  </style>
</head>
<body class="bg-ligth text-white">
<div class="container-fluid">
    <div class="row flex-nowrap">
        <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
            <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100"><br>
                  <span class="fs-5 d-none d-sm-inline"><strong>W2O - CHALLENGE</strong></span><br>
                <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start mt-3" id="menu">
                    <li class="nav-item">
                        <a href="user" class="nav-link align-middle px-0">
                          <strong class="ms-1 d-none d-sm-inline">Todas Empresas</strong>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="collaborator" class="nav-link align-middle px-0">
                           <strong class="ms-1 d-none d-sm-inline">Todos Colaboradores</strong>
                        </a>
                    </li>
                    <li>
                        <a href="new" data-bs-toggle="collapse" class="nav-link align-middle px-0 ">
                          <strong class="ms-1 d-none d-sm-inline">Nova Empresa</strong> 
                        </a>
                    </li>
                    <li>
                        <a href="collaborators" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                          <strong class="ms-1 d-none d-sm-inline">Novo Colaborador</strong> 
                        </a>
                    </li>
                    <li>
                        <a href="upgrade" data-bs-toggle="collapse" class="nav-link px-0 align-middle ">
                          <strong class="ms-1 d-none d-sm-inline">Associar Um Colaborador a Uma Empresa</strong>
                        </a>
                    </li>
                    <li>
                        <a href="review" class="nav-link px-0 align-middle">
                          <strong class="ms-1 d-none d-sm-inline">Rever Empresa</strong>
                        </a>
                    </li>
                    <li>
                        <a href="upgrade" data-bs-toggle="collapse" class="nav-link px-0 align-middle ">
                          <strong class="ms-1 d-none d-sm-inline">Actualizar Empresa</strong>
                        </a>
                    </li>
                    <li>
                        <a href="profile" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                          <strong class="ms-1 d-none d-sm-inline">Meu Perfil</strong> 
                        </a>
                    </li>
                    <li>
                        <a href="configurations" class="nav-link px-0 align-middle">
                          <strong class="ms-1 d-none d-sm-inline">Configurações</strong> 
                        </a>
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
              <h3 class="text-center">Todas Empresas<br>
                <img src="assets/svg/all.svg" width="300" height="300" alt="">
              </h3>
              <?php
                require_once '../controller/connection.php';
                  global $pdo;
                  // $id = $_SESSION['id_usuario'];
                  $sql = $pdo->prepare("SELECT * from company");
                  $sql->execute();
                  if($sql->rowCount() > 0)
                  {
                    echo '
                      <form action="" method="post">
                      <table id="example" class="table table-striped" style="width:100%">
                      <thead>
                          <tr>
                            <th scope="col" class="sort" data-sort="">ID</th>
                            <th scope="col" class="sort" data-sort="">Razão Social</th>
                            <th scope="col" class="sort" data-sort=""x>CNPJ</th>
                            <th scope="col" class="sort" data-sort="">Telefone</th>
                            <th scope="col" class="sort" data-sort="">Email</th>
                            <th scope="col" class="sort" data-sort="">Endereço</th>
                            <th scope="col" class="sort" data-sort="">Data de Registro</th>
                            <th scope="col">Última Atualização</th>
                          </tr>
                      </thead>
                      <tbody>
                      ';
                  while($all = $sql->fetch(PDO::FETCH_ASSOC))
                  { 
                    echo '
                        <tr name="f" scope="row align-items-justify">
                            <td>'. $all['id'].'</td>
                            <td>'. $all['socialReason'].'</td>
                            <td>'. $all['cnpj'].'</td>
                            <td><a href=`https://api.whatsapp.com/send?phone={$all["phone"]}` style="color: black;">'. $all['phone'].'</a></td>
                            <td>'. $all['email'].'</td>
                            <td>'. $all['location'].'</td>
                            <td>'. $all['createdAt'].'</td>
                            <td>'. $all['updatedAt'].'</td>
                        </tr>
                    ';
                    //echo "ID". $profiles['id']."<br>";
                    //echo "Nome". $profiles['name']."<br>";DELETE FROM `talk_with_us` WHERE `talk_with_us`.`id` = 10
                  }
                
                  // $row = $sql->fetch();
                  // $id = $row['id'];
                  // if(isset($_POST['Del']))
                  // {
                    // global $pdo;
                    // global $xDel;
                    // $sql = $pdo->prepare("DELETE FROM talk_with_us WHERE id = '$id'");
                    // $sql->execute();
                    // if($sql == true)
                    // {
                    //   echo "<script>alert('Apagou')</script>". $id;
                    // }
                    // else
                    // {
                    //   echo "<script>alert('N')</script>";
                    // }
                  //}
                  echo '
                  </tbody>
                  </table>
                  </form>';
                }
                ?>
                </div>
                </div>
              </div>
            </div>
          </div>
       </div>
    </div>
      <br>
      <br>
      <br>
    </div>
  </div>
</div>
</div>
<script src="https://unpkg.com/ionicons@5.5.1/dist/ionicons.js"></script>
</body>
</html>