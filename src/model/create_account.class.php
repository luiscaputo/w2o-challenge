<?php
  class create_account
  {
    public function create($n, $em, $oc, $pa){
      require_once 'connection.php';
      global $pdo;
      $find_email = $pdo->prepare("SELECT * FROM user WHERE email = '$em'");
      $find_email->execute();
      if($find_email->rowCount() > 0){
        echo "<script>alert('Esse email já existe na nossa aplicação!')</script>";
      }else
      {
        $s = md5($pa);
        $save_data = $pdo->prepare("INSERT INTO user(name, email, ocupation, password) VALUES ('$n', '$em', '$oc', '$s')");
        $save_data->execute();
        if($save_data->rowCount() > 0)
        {
          echo "<script>alert('Parabéns! Sua Conta foi criada com sucesso!')</script>";
        }else
        {
          echo "<script>alert('OHH! Sua Conta não foi criada com sucesso!')</script>";
        }
      }
    }
  }
?>