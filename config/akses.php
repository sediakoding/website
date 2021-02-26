<?php
	
	
	$url=$_SERVER['REQUEST_URI'];
	$PecahUrl = explode( "/", $url);
	 $PecahUrl[1];
	//die();
	
	if($PecahUrl[1]=='admin'){
		
		if (!isset($_SESSION)) {
		session_start();
		}


		$nip=$_SESSION['id_user'];
		$nm=$_SESSION['nm_user'];
		$nm_jbt=$_SESSION['nm_jbt'];
		$hak_akses=$_SESSION["lvl_akses"];
		if ($nip==null) {
			header("location: ../login/index.php");
		}
		if($hak_akses!=1){	
			header("location: ../usr/index.php");
		}		
	}elseif($PecahUrl[1]=='usr'){
		if (!isset($_SESSION)) {
		session_start();
		}

		$nip=$_SESSION['id_user'];
		if ($nip==null) {
			header("location: ../login/index.php");
		}

	}else{
		//header("location: ../login/index.php");
	}


?>