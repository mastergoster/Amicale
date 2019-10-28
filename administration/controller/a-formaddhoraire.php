<?php 

	if(isset($_SESSION) && !empty($_SESSION['amicale']['auth']))
	{
		$view = "formaddhoraire";
	}else{
		header('Location: ../index.php?action=formlogin');
	}

?>