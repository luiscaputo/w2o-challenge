<?php 
	session_start();
	session_unset();
	session_destroy();
	header('Location: http://localhost/desafioW2O/w2o-challenge');
 ?>