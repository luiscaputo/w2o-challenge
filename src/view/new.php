<?php
  require_once '../model/crud.class.php';
  require_once '../controller/connection.php';

  if(isset($_POST['save']))
  {
    $socialReason = filter_input(INPUT_POST, 'socialReason');
    $cnpj = filter_input(INPUT_POST, 'cnpj');
    $phone = filter_input(INPUT_POST, 'phone');
    $location = filter_input(INPUT_POST, 'location');
    $email = filter_input(INPUT_POST, 'email');
    // $id = $_SESSION['id_usuario'];
    $alreadyExistCnpj = $pdo->prepare("SELECT * FROM company WHERE cnpj = '$cnpj'");
    $alreadyExistCnpj->execute();

	if($alreadyExistCnpj->rowCount() > 0){
		echo "<script>alert('Empresa Já Existente!')</script>";
	}
  else
	$save = $pdo->prepare("INSERT INTO company(socialReason, cnpj, phone, email, location) VALUES('$socialReason', '$cnpj', '$phone', '$email', '$location')");
	$save->execute();
	  if($save->rowCount()>0)
	  {
		 echo "<script>alert('Empresa Cadastrada')</script>";
	   }else
	   {
		 echo "<script>alert('Empresa não Cadastrada! TENTE NOVAMENTE.')</script>";
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
  <title>Nova Empresa</title>
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
              <h3 class="text-center">Nova Empresa<br>
              <img src="assets/svg/new.svg" class="text-center" width="300" height="300" alt="">
              </h3>
             
                <div class="container">
                  <form action="" method="post" class="form-control">
                  <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Razão Social</label>
                      <input type="text" name="socialReason" class="form-control" id="exampleFormControlInput1" placeholder="Ex.: Ajudar pessoas" required>
                    </div>

                    <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">CNPJ</label>
                      <input type="text" name="cnpj" class="form-control" id="exampleFormControlInput1" placeholder="Ex.: 00-000-0000" required>
                    </div>

                    <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Telefone</label>
                      <input type="number" name="phone" class="form-control" id="exampleFormControlInput1" placeholder="Ex.: +244 999-999-999" required>
                    </div>
                    <div class="mb-3">
                      <label for="exampleFormControlInput1" class="form-label">Email</label>
                      <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="aaa@aa.com" name="email">
                    </div>

                    <div class="mb-3">
                      <label for="exampleFormControlInput1" class="form-label">Endereço</label>
                      <textarea name="location" id="" cols="30" rows="10" class="form-control" placeholder="rua 21. Av. vjss" required></textarea>
                    </div>

                    <div class="mb-3">
                        <button type="submit" name="save" class="btn btn-success form-control">Gravar Empresa</button>
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