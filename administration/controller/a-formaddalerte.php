<?php 

	if(isset($_SESSION) && !empty($_SESSION['amicale']['auth']))
	{
		$view = "formaddalerte";
	}else{
		header('Location: ../index.php?action=formlogin');
	}

?>