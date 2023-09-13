<?php
	session_start();
	setcookie('LOGGED_USER',"",time(),"","",true,true);
	session_destroy();
?>