<?php
	session_start();

	session_unset();

	session_destroy();
	header('Location: ../frond-office/index.php');

?>