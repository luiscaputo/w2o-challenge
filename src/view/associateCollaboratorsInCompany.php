<?php
    global $pdo;
    require_once '../controller/connection.php';
	if(isset($_POST['save']))
	{
		$collaborator = filter_input(INPUT_POST, 'collaborator');
		$company = filter_input(INPUT_POST, 'company');

		if($collaborator != "" | $company != ""){
			$verify = $pdo->prepare("SELECT * FROM collaboratorCompanys WHERE collaboratorId = '$collaborator'");
			$verify->execute();
			$verifyFetch = $verify->rowCount();
			if($verify->rowCount() > 0){
				$verifyFetch = $verify->fetch();
				$getCompany = $verifyFetch['companyId'];
				if($getCompany == $company){
					echo "<script>alert('Esse colaborador Já está vinculado a esta Empresa!')</script>";
				}else{
					$a = $pdo->prepare("INSERT INTO collaboratorCompanys(collaboratorId, companyId) VALUES ('$collaborator', '$company')");
					$a->execute();
					if($a->rowCount()>0)
					{
						echo "<script>alert('Colaborador Associado!')</script>";
					}else
					{
						echo "<script>alert('Colaborador Não Actualizado!')</script>";
					}
				}
			}
		}else{
			echo "<script>alert('Todos os Campos devem Estar Preenchidos!')</script>";
		}
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
              						<h3 class="text-center">Associar Colaborador a Uma Empresa<br>
                						<img src="assets/svg/update.svg" width="300" height="300" alt="">
										<form action="" method="post" class=" form-control">
											<div class="mb-3">
											<select class="form-select" name="collaborator" aria-label="Default select example" required>
												<option selected disabled>Selecione o Colaborador</option>
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
												<select class="form-select" name="company" aria-label="Default select example" required>
												<option selected disabled>Selecione a Empresa</option>
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
											<button type="submit" name="save" class="btn btn-success w-25 p-1">Associar</button><br>
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
</body>
</html>