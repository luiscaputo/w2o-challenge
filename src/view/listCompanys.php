<?php include_once'./header.php';?>
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
                <img src="assets/svg/list.gif" width="300" height="300" alt="">
                
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
                  }
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