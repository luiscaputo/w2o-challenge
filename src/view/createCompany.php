<?php
  require_once '../controller/crud.class.php';
  require_once '../controller/connection.php';
	

  if(isset($_POST['save']))
  {
    $socialReason = filter_input(INPUT_POST, 'socialReason');
    $cnpj = filter_input(INPUT_POST, 'cnpj');
    $phone = filter_input(INPUT_POST, 'phone');
    $location = filter_input(INPUT_POST, 'location');
    $email = filter_input(INPUT_POST, 'email');
    // $id = $_SESSION['id_usuario'];
    $alreadyExistCnpj = $pdo->prepare("SELECT * FROM company WHERE cnpj = '$cnpj'");
    $alreadyExistCnpj->execute();

	if($alreadyExistCnpj->rowCount() > 0){
		echo "<script>alert('Empresa Já Existente!')</script>";
	}
  else
	$save = $pdo->prepare("INSERT INTO company(socialReason, cnpj, phone, email, location) VALUES('$socialReason', '$cnpj', '$phone', '$email', '$location')");
	$save->execute();
	  if($save->rowCount()>0)
	  {
		 echo "<script>alert('Empresa Cadastrada')</script>";
	   }else
	   {
		 echo "<script>alert('Empresa não Cadastrada! TENTE NOVAMENTE.')</script>";
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
					<h3 class="text-center">Nova Empresa<br>
					<img src="assets/svg/gifImage.gif" class="text-center" width="300" height="300" alt="">
					</h3>
					
					<div class="container">
						<form action="" method="post" class="form-control">
							<div class="mb-3">
								<label for="exampleFormControlInput1" class="form-label">Razão Social</label>
								<input type="text" name="socialReason" class="form-control" id="exampleFormControlInput1" placeholder="Ex.: Ajudar pessoas" required="">
								</div>

								<div class="mb-3">
								<label for="exampleFormControlInput1" class="form-label">CNPJ</label>
								<input type="text" name="cnpj" class="form-control" id="exampleFormControlInput1" placeholder="Ex.: 00-000-0000" required="">
								</div>

								<div class="mb-3">
								<label for="exampleFormControlInput1" class="form-label">Telefone</label>
								<input type="number" name="phone" class="form-control" id="exampleFormControlInput1" placeholder="Ex.: +244 999-999-999" required="">
								</div>
								<div class="mb-3">
								<label for="exampleFormControlInput1" class="form-label">Email</label>
								<input type="email" class="form-control" id="exampleFormControlInput1" placeholder="aaa@aa.com" name="email">
								</div>

								<div class="mb-3">
								<label for="exampleFormControlInput1" class="form-label">Endereço</label>
								<textarea name="location" id="" cols="30" rows="10" class="form-control" placeholder="rua 21. Av. vjss" required=""></textarea>
								</div>

								<div class="mb-3">
									<button type="submit" name="save" class="btn btn-success form-control">Gravar Empresa</button>
								</div>
							</div>  
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
<script src="https://unpkg.com/ionicons@5.5.1/dist/ionicons.js"></script>
</body>
</html>