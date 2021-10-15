<?php 
  include_once './header.php';
  include_once '../controller/connection.php';
  global $pdo;
  $getAllCollaborators = $pdo->prepare("SELECT * FROM collaborator");
  $getAllCollaborators->execute();
  $array = $getAllCollaborators->fetch();
  $nome = $array['completeName'];
  $lista = Array(
	array('Nome Completo', 'Telefone', 'Email', 'Data de Nascimento'),
	  array(''.$array["completeName"].'', ''.$array["phone"].'', ''.$array["email"].'', ''.$array["birthDate"].'')
  );
  if(isset($_GET['gerarCSV'])){
    // Gerando o Ficheiro em CSV
    $fp = fopen("../files/contatos.csv", 'w');
    //percorrendo o conjunto de valores e gravando no arquivo
    foreach ($lista as $linha) {
        fputcsv($fp, $linha,";");
    }
    //fechando o arquivo
    fclose($fp);
	echo "<script>alert('Ficheiro Gerado em src/files')</script>";
  }
if(isset($_GET['gerarJSON'])){
// Gerando o ficheiro em Json
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
    $Colaradores = array ('colaboradores' => $json);
    //alocando os contatos no array agenda
    $dados = array('dados' => $Colaradores);
    //definido o arquivo resultante
    $fh = fopen("../files/colaboradores.json", 'w');
    //salvando o arquivo 
    fwrite($fh, json_encode($dados,JSON_UNESCAPED_UNICODE));
    //fechando o arquivo
    fclose($fh);
    echo "<script>alert('Ficheiro Gerado em src/files')</script>";
}
?>
<?php include_once './header.php';?>
 <div class="container">
  <div class="row">
    <div class="col-12">
      <div class="container-fluid mt--6">
        <div class="row justify-content-center">
          <div class=" col ">
            <div class="card">
              <div class="card-header bg-transparent ">
              <div class="table-responsive col-md-12 align-center">
              <h3 class="text-center">Todos Colaboradores<br>
                <img src="assets/svg/all.svg" width="300" height="300" alt="">
              </h3>
              <?php
                require_once '../controller/connection.php';
                  global $pdo;
                  // $id = $_SESSION['id_usuario'];
                  $sql = $pdo->prepare("SELECT * from collaborator");
                  $sql->execute();
                  if($sql->rowCount() > 0)
                  {
                    echo '
                      <form action="" method="post">
                      <table id="example" class="table table-striped" style="width:100%">
                      	<thead>
                          <tr>
                            <th scope="col" class="sort" data-sort="">ID</th>
                            <th scope="col" class="sort" data-sort="">Nome Completo</th>
                            <th scope="col" class="sort" data-sort="">Telefone</th>
                            <th scope="col" class="sort" data-sort="">Email</th>
                            <th scope="col" class="sort" data-sort="">Data de Nascimento</th>
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
                            <td>'. $all['completeName'].'</td>
                            <td>'. $all['phone'].'</td>
                            <td>'. $all['email'].'</td>
                            <td>'. $all['birthDate'].'</td>
                            <td>'. $all['createdAt'].'</td>
                            <td>'. $all['updatedAt'].'</td>
                        </tr>
                    ';
                  }
                echo '
                  </tbody>
                  </table>
                  </form>';
                }
                ?>
                </div>
					<div class="row">
						<div class="col">
							<form action="" method="get" class="text-center">
								<button type="submit" name="gerarCSV" class="btn btn-success w-25 p-1">GERAR FICHEIRO CSV</button><br>
							</form>
						</div>
						<div class="col">
							<form action="" method="get" class="text-center">
								<button type="submit" name="gerarJSON" class="btn btn-success w-25 p-1">GERAR FICHEIRO JSON</button><br>
							</form>
						</div>
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