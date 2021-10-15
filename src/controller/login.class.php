<?php
  class login{
    public function entrar($em, $pass){
      require_once 'connection.php';
      global $pdo;
      $find_email = $pdo->prepare("SELECT * FROM user WHERE email = '$em'");
      $find_email->execute();
      $array = $find_email->fetch();
      if($find_email->rowCount() > 0)
      {
        $password = $array['password'];
        if($pass != $password)
        {
          echo "<script>alert('Palavra passe `{$password}` `{$pass}` Inválida!')</script>";
        }else
          {
            session_start();
            $_SESSION['logado']     = true;
            $_SESSION['id_usuario'] = $array['id'];
            $us = $_SESSION['id_usuario'];
            global $us;
            header('location: http://localhost/desafioW2O/w2o-challenge/src/view/listCompanys');
          }
      }else
      {
        echo "<script>alert('Email Inválido!')</script>";
      }
    }
  }
?>