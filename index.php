<?php
    require_once 'src/controller/connection.php';
    require_once 'src/model/create_account.class.php';
    require_once 'src/model/login.class.php';

    #pegando os campos
    if(isset($_POST['create']))
    {
      $s = new create_account;
      $nome = filter_input(INPUT_POST, 'name');
      $email = filter_input(INPUT_POST, 'email');
      $ocup = filter_input(INPUT_POST, 'ocupation');
      $p = filter_input(INPUT_POST, 'password');
      $s->create($nome, $email, $ocup, $p);
    }
    if(isset($_POST['login']))
    {
      $l = new login;
      $email = filter_input(INPUT_POST, 'email');
      $pass = filter_input(INPUT_POST, 'password');
      $pa = md5($pass);
      $l->entrar($email, $pa);
    }
    if(isset($_POST['alterar']))
    {
      $email = filter_input(INPUT_POST, 'email');
      $senha = filter_input(INPUT_POST, 'senha');
      $pass = md5($senha);
      $valid = $pdo->prepare("SELECT * FROM user WHERE email = '$email'");
      $valid->execute();
      if($valid->rowCount() > 0)
      {
        $arraye = $valid->fetch();
        $id = $arraye['id'];
        $act = $pdo->prepare("UPDATE user SET password='$pass' WHERE id='$id'"); 
        $act->execute();
        if($act->rowCount()>0){
          echo "<script>alert('Senha Alterada, faça login para testar!')</script>";
        }else 
          echo "<script>alert('Senha não Alterada, tente novamente!')</script>";
      }else
        echo "<script>alert('Email inválido!')</script>";
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="src/view/assets/frame/css/bootstrap.css">
  <script src="src/view/assets/frame/js/bootstrap.js"></script>
  <title>Pagina initial</title>
  <style>
    hr{
      margin-top: 1rem;
      margin-bottom: 1rem;
      border: 0;
      border-top: 1px solid rgba(0, 0, 0, 0.1);
    }
  </style>
</head>
<body style="background-color: #323238; color:aliceblue;">
   <!-- form-colors: #41414d -->
<nav style="color: aliceblue;" class="navbar navbar-expand-lg navbar-light bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" style="color: white;" href="#"><strong>DESAFIO W2O</strong></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button> 
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a style="color: aliceblue;" class="nav-link active" aria-current="page" href="#q">Quem é o Luís?</a>
        </li>
        <li class="nav-item">
          <a style="color: aliceblue;" class="nav-link" href="#c">Criar Conta Para Avaliar</a>
        </li>
        <li class="nav-item dropdown">
          <a style="color: aliceblue;" class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Minhas Redes Sociais
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="https://www.facebook.com/luizaoafonsotj.luizao/">Facebook</a></li>
            <li><a class="dropdown-item" href="#">Linkedin</a></li>
            <li><a class="dropdown-item" href="https://github.com/luiscaputo">GitHub</a></li>
            <li><a class="dropdown-item" href="#">Instagram</a></li>
            <li><a class="dropdown-item" href="#">WhatshApp (+244) 995154193</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a style="color: aliceblue;" class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true"></a>
        </li>
      </ul>
      <!-- <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Escreva aqui" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Pesquisar</button>
      </form> -->
    </div>
  </div>
</nav>
<!--Iniciando o body-->
<section class="mt-5">
<div class="container">
<h5 class="text-center">Entrar na minha Conta</h5>
<p class="text-center">Faça login na sua conta <br> Utilize o formulário ao lado para logar e verificar o desafio!</p>
<br>
  <div class="row">
    <div class="col" style="width: 18rem;">
      <img src="src/view/assets/svg/login.svg" width="380" height="380" class="card-img-top" alt="Efectue seu Login"><br>
    </div>
    <div class="col-1">
    </div>
    <div class="col">
    <form method="post" class="form-control bg-dark p-3 mt-5" style="color: white; border:none;width:100%; heigth:100%;">
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Email</label>
        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="Email" name="email">
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Palavra Passe</label>
        <input type="password" class="form-control" id="exampleInputPassword1" name="password">
      </div>
      <button type="submit" name="login" class="btn btn-success form-control">Entrar na Minha Conta</button>
    </form>    <br>
   <div class="container text-center">
    <button type="button" class="btn btn-success w-25 p-1" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Alterar Senha
    </button>
   </div>
    </div><br><br><br>
  <hr>
  <br><br><br>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-dark" id="exampleModalLabel">Alterar Palavra Passe</h5>
      </div>
      <div class="modal-body">
        <form action="" method="post" class="form-control">
        <label for="">Adicione seu email <br>
          <input type="email" name="email" class="form-control" name="alterar" id="" placeholder="">
        </label>
          <label for="">Adicione aqui a nova senha: <br>
          <input type="password" name="senha" class="form-control" name="alterar" id="" placeholder="">
        </label>
      </div>
      <div class="modal-footer">
        <button type="submit" name="alterar" class="btn btn-success w-25 p-1">Salvar</button>
      </div>
      </form>
    </div>
  </div>
</div>
<div class="quemsomos text-center" id="q">
  <h5>Quem é o Luís?</h5>
  <img src="src/view/assets/svg/quemsomos.svg" width="200" height="200" alt="Quem Somos?">
  <p>Bem, eu sou Africano de Angola província de Luanda, sou estudante e amante super apaixonado por tecnologias,
	<br> buscando novos desafios e internacionalizar minha carreira de dev. Tenho 19 anos, <br>
	estou fazendo a universidade em Eng.Informática ...
</p>
<h4>Developer</h4>
    <img src="src/view/assets/img/dev.jpg" class="rounded-circle border border-success border-4 dashed" width="300" height="300" alt="Dev"><br>
		<small><b>Luís Afonso Caputo <br> WEB and MOBILE <br> BACK-END + FRONT-END + DBA</b></small>
    <br>
	<br>
	<br>
</div>
<hr>
<br><br><br>
<h5 id="c" class="text-center">Criar Sua Conta Aqui</h5>
<p class="text-center">Crie uma conta para poder logar e avaliar meu desafio! <br>
	att: se não quiser deixar seus dados aqui pode logar com as seguintes credenciais: <br>
	xxxx xxxx xxxx <br>
	xxxx xxxx xxxx  
</p>
<br>
  <div class="row">
    <div class="col" style="width: 18rem;">
      <img src="src/view/assets/svg/create.svg" class="card-img-top" alt="Efectue seu Login">
    </div>
    <div class="col-1">
    </div>
    <div class="col">
    <form method="post" class="form-control bg-dark p-3 mt-1" style="color: white; border:none;width:100%; heigth:100%;">
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Nome Completo</label>
        <input type="text" class="form-control" id="exampleInputEmail1" name="name" aria-describedby="Nome">
      </div>
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Email</label>
        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="Email" name="email">
      </div>
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Ocupação</label>
        <select class="form-select" name="ocupation" aria-label="Ocupação">
          <option selected>Selecione sua ocupação</option>
          <option value="Trabalhador(a)">Trabalhador(a)</option>
          <option value="Estudante">Estudante</option>
          <option value="Idoso Aposentado">Idoso Aposentado</option>
          <option value="Aposentado(a)">Aposentado(a)</option>
          <option value="Outra">Outra</option>
        </select>
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Palavra Passe</label>
        <input type="password" class="form-control" id="exampleInputPassword1" name="password">
      </div>
      <div class="mb-3 form-check">
        <input type="checkbox" class="form-check-input success" id="exampleCheck1">
        <label class="form-check-label" for="exampleCheck1">Concorda com os nossos termos?</label>
      </div>
      <button type="submit" class="btn btn-success form-control" name="create">Criar Minha Conta</button>
    </form>
    </div>
  </div>
</div>
<!-- Start footer -->
<br><br>
<hr>
<br><br>
<!-- Footer -->
<footer class="bg-dark text-center text-white">
  <div class="container p-4">
    <section class="mb-4">
      <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
        ><i class="fab fa-facebook-f"></i
      ></a>
      <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
        ><i class="fab fa-twitter"></i
      ></a>
      <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fab fa-google"></i
      ></a>
      <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
        ><i class="fab fa-instagram"></i
      ></a>
      <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
        >
        <ion-icon name="logo-linkedin"></ion-icon>
        <i class="fab fa-linkedin-in"></i
      ></a>

      <!-- Github -->
      <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
        ><i class="fab fa-github"></i
      ></a>
    </section>
    <!-- Section: Social media -->

    <!-- Section: Form -->
 
        
    <!-- Section: Form -->

    <!-- Section: Text --> 
  </div>
  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
    © 2021 Copyright - Desafio FullStack:
    <a class="text-white" href="#">Luís Afonso Caputo</a>
  </div>
  <!-- Copyright -->
</footer>
<!-- Footer -->
<footer>

</footer>
</section>
<script src="https://unpkg.com/ionicons@5.5.1/dist/ionicons.js"></script>
</body>
</html>