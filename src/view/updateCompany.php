<?php
    global $pdo;
    require_once '../controller/connection.php';
  if(isset($_POST['save']))
  {
    $id = filter_input(INPUT_POST, 'companyUpdate');
    $campo = filter_input(INPUT_POST, 'campo');
    $valor = filter_input(INPUT_POST, 'date_update');
    // Getting company id
    $a = $pdo->prepare("UPDATE company set $campo = '$valor' where id = '$id'");
    $a->execute();
    if($a->rowCount()>0)
    {
      echo "<script>alert('Dado Actualizado!')</script>";
    }else
    {
      echo "<script>alert('Dado Não Actualizado!')</script>";
    }
  }
?>
<?php include_once './header.php'?>
 <div class="container">
  <div class="row">
    <div class="col-12">
      <div class="container-fluid mt--6">
        <div class="row justify-content-center">
          <div class=" col ">
            <div class="card">
              <div class="card-header bg-transparent ">
              <div class="table-responsive col-md-12 align-center">
              <h3 class="text-center">Actualizar Dado de Empresa <br>
                <img src="assets/svg/update.svg" width="300" height="300" alt="">
                <form action="" method="post" class=" form-control">
                    <div class="mb-3">
                    <select class="form-select" name="companyUpdate" aria-label="Default select example">
                          <option selected>Selecione a Empresa a Actualizar</option>
                          <?php
                            $p = $pdo->prepare("SELECT * FROM company");
                            $p->execute();
                            while($x = $p->fetch(PDO::FETCH_ASSOC))
                            {  
                          ?>
                            <option value="<?php echo $x['id']?>"><?php echo $x['socialReason']?></option>
                          <?php
                            }
                          ?>
                          </select>
                    </div>
                    <div class="mb-3">
                      <select name="campo" class="form-control text-center " id="" required>
                        <option value="" desable>Selecione o Dado a Actualizar</option>
                        <option value="socialReason">Razão Social</option>
                        <option value="phone">Telefone</option>
                        <option value="email">Email</option>
                        <option value="location">Endereço</option>
                      </select>
                    </div>
                    <div class="mb-3">
                      <input type="text" name="date_update" id="" class="form-control " placeholder="de s para v"><br>
                      <button type="submit" name="save" class="btn btn-success w-25 p-1">Salvar alteração</button><br>
                    </div>
                </form>
                </h3>
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
</body>
</html>