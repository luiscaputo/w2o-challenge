<?php
  class new_agend
  {
    public function create_agend($na, $ga, $pa, $da, $ho, $de)
    {
      require_once 'connection.php';
      global $pdo;
        $id = $_SESSION['id_usuario'];
        $save = $pdo->prepare("INSERT INTO agend(name_actividade, important, intervenients, data_actividade, hour, detalhes, user) VALUES('$na', '$ga', '$pa', '$da', '$ho', '$de', '$id')");
        $save->execute();
          if($save->rowCount()>0)
          {
            echo "<script>alert('Actividade marcada!')</script>";
          }else
          {
            echo "<script>alert('Actividade não marcada! TENTE NOVAMENTE.')</script>";
          }
      
    }
  }
?>