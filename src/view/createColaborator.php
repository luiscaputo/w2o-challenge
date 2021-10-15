<?php
	require_once '../controller/crud.class.php';
	require_once '../controller/connection.php';
	if(isset($_POST['save']))
	{
		$completeName = filter_input(INPUT_POST, 'completeName');
		$phone = filter_input(INPUT_POST, 'phone');
		$email = filter_input(INPUT_POST, 'email');
		$birthDate = filter_input(INPUT_POST, 'birthDate');
		// Verificando se o novo colaborador já existe
		$alreadyExistCollaborator = $pdo->prepare("SELECT * FROM collaborator WHERE email = '$email'");
		$alreadyExistCollaborator->execute();

		if($alreadyExistCollaborator->rowCount() > 0){
			echo "<script>alert('Colaborador Já Existente!')</script>";
		}
			else
			{
				// Cadastrando colaborador
				$resgisterCollaborator = $pdo->prepare("INSERT INTO collaborator(completeName, phone, email, birthDate) VALUES('$completeName', '$phone', '$email', '$birthDate')");
				$resgisterCollaborator->execute();
				if($resgisterCollaborator->rowCount()>0)
				{
					echo "<script>alert('Colaborador Cadastrado')</script>";
				}
				else
				{
					echo "<script>alert('Colaborador não Cadastrado! TENTE NOVAMENTE.')</script>";
				}
			}
	}
?>
<?php include_once './header.php'; ?>
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
											<h3 class="text-center">Novo Colaborador<br>
												<img src="assets/svg/collaborator.gif" class="text-center" width="300" height="300" alt="">
											</h3>
											<div class="container">
												<form action="" method="post" class="form-control">
													<div class="mb-3">
														<label for="exampleFormControlInput1" class="form-label">Nome Completo</label>
														<input type="text" name="completeName" class="form-control" id="exampleFormControlInput1" placeholder="Ex.: Luís Caputo" required>
													</div>
													<div class="mb-3">
														<label for="exampleFormControlInput1" class="form-label">Telefone</label>
														<input type="number" name="phone" class="form-control" id="exampleFormControlInput1" placeholder="Ex.: 99-334-4435" required>
													</div>
													<div class="mb-3">
														<label for="exampleFormControlInput1" class="form-label">Email</label>
														<input type="email" class="form-control" id="exampleFormControlInput1" placeholder="aaa@aa.com" name="email">
													</div>
													<div class="mb-3">
														<label for="exampleFormControlInput1" class="form-label">Data de Nascimento</label>
														<input type="date" class="form-control" id="exampleFormControlInput1" placeholder="20/04/2002" name="birthDate">
													</div>
													<div class="mb-3">
														<label for="" class="">              
															<select class="form-select" name="" aria-label="Default select example">
															<option selected>Associe ele a uma Empresar</option>
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
														<button type="submit" name="save" class="btn btn-success form-control">Gravar Colaborador</button>
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
		</div>
	</div>
</body>
</html>