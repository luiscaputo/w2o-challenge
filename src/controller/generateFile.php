<?php
  $json = array();
  $lin=0;
  foreach ($lista as $linha) {
    if ($lin==0){
      $key = $linha;
    }else{
      $json[] = array_combine($key, $linha);
    }
    $lin++;
  }
  //criando o conjunto de contatos
  $contatos = array ('conato' => $json);
  //alocando os contatos no array agenda
  $agenda = array('agenda' => $contatos);
  //definido o arquivo resultante
  $fh = fopen("contatos.json", 'w');
  //salvando o arquivo 
  fwrite($fh, json_encode($agenda,JSON_UNESCAPED_UNICODE));
  //fechando o arquivo
  fclose($fh);
  
?>