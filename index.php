<?php
	include("system/header.php");

	if(authenticated){
		if($_SESSION['admin'] === '1'){
			location("/admin-home");
			
		}
	}else{
		location("/authentication");
	}