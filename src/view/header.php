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
    li{
      padding: 6px;
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
      transition: 1s;
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
                        <a href="listCompanys" class="nav-link align-middle px-0">
                          <ion-icon name="list-outline"></ion-icon><strong class="ms-1 d-none d-sm-inline">Todas Empresas</strong>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="listColaborators" class="nav-link align-middle px-0">
                           <strong class="ms-1 d-none d-sm-inline">Todos Colaboradores</strong>
                        </a>
                    </li>
                    <li>
                        <a href="createCompany" data-bs-toggle="collapse" class="nav-link align-middle px-0 ">
                          <strong class="ms-1 d-none d-sm-inline">Nova Empresa</strong> 
                        </a>
                    </li>
                    <li>
                        <a href="createColaborator" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                          <strong class="ms-1 d-none d-sm-inline">Novo Colaborador</strong> 
                        </a>
                    </li>
                    <li>
                        <a href="associateCollaboratorsInCompany" data-bs-toggle="collapse" class="nav-link px-0 align-middle ">
                          <strong class="ms-1 d-none d-sm-inline">Associar Um Colaborador a Uma Empresa</strong>
                        </a>
                    </li>
                    <li>
                        <a href="deleteColaboratorOrCompany" class="nav-link px-0 align-middle">
                          <strong class="ms-1 d-none d-sm-inline">Eliminar Empresa/Colaborador</strong>
                        </a>
                    </li>
                    <li>
                        <a href="updateCompany" data-bs-toggle="collapse" class="nav-link px-0 align-middle ">
                          <strong class="ms-1 d-none d-sm-inline">Actualizar Empresa</strong>
                        </a>
                    </li>
                    <li>
                        <a href="profile" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                          <strong class="ms-1 d-none d-sm-inline">Meu Perfil</strong> 
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