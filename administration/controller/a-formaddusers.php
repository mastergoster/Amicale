<?php

    if(isset($_SESSION) && !empty($_SESSION['amicale']['auth']))
    {
		$view = "formaddusers";
    }else{
      header('Location: ../index.php?action=formlogin');
	}
	
?>