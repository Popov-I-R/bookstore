 <?php 
include_once 'header.php'; 

require_once 'common/includes/dbconnect.php';


?>

<script type="text/javascript" src="script/cart.js"></script>

<div class="container">	
	
	<div class="text-left">	
		<br><br>
		Вашата поръчка е направена успешно. 
		<br><br><br>
		<a href="index.php" class="btn btn-warning"><i class="glyphicon glyphicon-menu-left"></i> Продължете пазаруването</a>
		
	</div>
</div>

<?php //session_start();
$_SESSION = array();
// Destroy the session.
unset($_SESSION["login_user"]);
// Redirect to the login page
//header("location:index.php");
exit();

?>

<?php include('footer.php');?>




