<?php
    global $pdo;
	global $us;
    require_once '../controller/connection.php';
	$id = $us;
    if(isset($_POST['actualizar']))
    {
      $valor = filter_input(INPUT_POST, 'name');
      $alter = filter_input(INPUT_POST, 'alter');
        $u = $pdo->prepare("UPDATE user SET $alter = '$valor' where id='$id'");
        $u->execute();
        if($u->rowCount() > 0)
        {
        	echo "<script>alert('Dado Actualizado!')</script>";
        }else
        {
            echo "<script>alert('Dado não Actualizado!')</script>";
        }
    } 
?>
<?php include_once './header.php';?>
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
              							<h3 class="text-center">MEU PERFIL</h3>
              								<div class="container">
                								<div class="row">
                  									<div class="col text-center">
                    									<img src="assets/svg/profile.svg" width="300" height="300" alt=""><br>
                    									<small class="text-success text-center"><b>Online</b></small> <br>
                   										<a href="logout"> <small class="text-danger text-center"><b>Terminar Secção</b></small></a>                
                									</div>
                  								<div class="col">
													<?php 
														global $us;
														$id = $us;   
														$find_all = $pdo->prepare("SELECT * FROM user WHERE id = '$id'");
														$find_all->execute();
														$find_all_array = $find_all->fetch();
														?>
														<form action="" method="post">
														<p>Edite ou Elimine sua conta aqui</p>
														<h4>Meus dados actuais</h4>
														<p>
															<b>
															Meu nome Actual: <?php echo $find_all_array['name'];?> <br> 
															Meu Email Actual: <?php echo $find_all_array['email'];?><br>
															Minha Ocupação: <?php echo $find_all_array['ocupation'];?>
															</b>
														</p>
													
													<select class="form-select" name="alter" aria-label="Default select example">
														<option selected>O QUE QUER ALTERAR?</option>
														<option value="name">Nome</option>
														<option value="email">Email</option>
														<option value="ocupation">Ocupação</option>
														<option value="password">Palavra Passe</option>
													</select><br>
														<input type="text" name="name" class="form-control" id="exampleFormControlInput1" placeholder="Novo valor" ><br>
														<button type="submit" name="actualizar" class="btn btn-success text-center w-25 p-1">Actualizar </button>
														<button type="submit" name="all" class="btn btn-success w-25 p-1" disabled>Apagar Conta</button><br>
													</form>
                  								</div>
                							</div>
                							<hr>
              							</div>
              								<h5 class="text-center">ESTADO DA MINHA CONTA</h5>
											<div class="container">
												<div class="row">
													<div class="col mt-3">
														<p><b>SEM ACTIVIDADES NO MOMENTO!</b></p>
													</div>
													<div class="col">
														<img src="assets/svg/statistic.svg" width="300" height="300" alt=""><br>
													</div>
												</div>
											</div>
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