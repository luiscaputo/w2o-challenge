<?php
    global $pdo;
    require_once '../controller/connection.php';
    if(isset($_POST['deleter']))
    {
      $companyId = filter_input(INPUT_POST, 'company');
      $colaboratorId = filter_input(INPUT_POST, 'colaborator');

      if($companyId == ""  && $colaboratorId != ""){
        $find = $pdo->prepare("SELECT * FROM collaborator");
        $find->execute();
        if($find->rowCount() > 0)
        {
          $d = $pdo->prepare("DELETE FROM collaborator WHERE id='$colaboratorId'");
          $d->execute();
          if($d->rowCount() > 0)
          {
            echo "<script>alert('Colaborador Removido!')</script>";
          }else
          {
            echo "<script>alert('Desculpa! Colaborador não Removido!')</script>";
          }
        }
      }
      else if($companyId != "" && $colaboratorId == ""){
        $find = $pdo->prepare("SELECT * FROM company");
        $find->execute();
        if($find->rowCount() > 0)
        {
          $d = $pdo->prepare("DELETE FROM company WHERE id='$companyId'");
          $d->execute();
          if($d->rowCount() > 0)
          {
            echo "<script>alert('Empresa Removida!')</script>";
          }else
          {
            echo "<script>alert('Desculpa! Empresa não Removida!')</script>";
          }
        }
      }
    }
?>
<?php include_once './header.php'?>
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
              <h3 class="text-center">Eliminar Empresa/Colaborador <br>
                <img src="assets/svg/review.svg" width="300" height="300" alt="">
              </h3>
                  <form action="" method="post" class="text-center form-control">
                    <div class="mb-3">
                      <label for="" class="">              
                        <select class="form-select" name="company" aria-label="Default select example">
                          <option selected disabled>Selecione a Empresa a Eliminar</option>
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
                      <label for="" class="">              
                        <select class="form-select" name="colaborator" aria-label="Default select example">
                          <option selected disabled>Selecione o Colaborador a Eliminar</option>
                          <?php
                            $p = $pdo->prepare("SELECT * FROM collaborator");
                            $p->execute();
                            while($x = $p->fetch(PDO::FETCH_ASSOC))
                            {  
                          ?>
                            <option value="<?php echo $x['id']?>"><?php echo $x['completeName']?></option>
                          <?php
                            }
                          ?>
                          </select>
                    </div>
                    <div class="mb-3">
                      <button type="submit" name="deleter" class="btn btn-success">Apagar Selecionada</button>
                    </div>
                    </label>
                  </form>
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