<?php
	include("system/header.php");

	if(authenticated){
		location("/home");
	}else{
		location("/authentication");
	}