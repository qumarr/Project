<?php
    session_start();
    
if (!isset($_SESSION['super_admin_login']))
{
    header("Location: index.php");
    die();
}
$_POST = array_map("trim", $_POST);
?>
<?php
if(isset($_POST['username'])){
        $serverName="localhost";
        $dbusername="root";
        $dbpassword="kumar";
        $dbname="thehrm";
        mysql_connect($serverName,$dbusername,$dbpassword) or die('the website is down for maintainance');
        mysql_select_db($dbname) or die(mysql_error());
	    $f_name = mysql_real_escape_string($_POST['first_name']);
        $l_name = mysql_real_escape_string($_POST['last_name']);
        $username = mysql_real_escape_string($_POST['username']);
        $admin_email = mysql_real_escape_string($_POST['admin_email']);

           $pass=rand();
           $salt="I6PnEPbQNLslYMj7ChKxDJ2yenuHLkXn";
           $salted_password=$pass.$salt;
           $password = hash('sha512', $salted_password);
           $sql = "insert into tbl_user values('','$f_name','$l_name','$username','$password',0)";
           mysql_query($sql);
         $headers = "From: " .$email;
        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
        $email = 'DoNotReply@thehrm.cf';
        $subject = 'Admin Account Username and Password Details';
        $comment = " Hello $username,\n Your new login details is below \n
        username : $username and password: $pass \n\n
        you can change your password by logging to your accounts.\n Sincerely  yours\n ";
         mail($admin_email, $subject, $comment, $headers );
           echo"<script> alert('New Admin Account Created Successfuly'); </script>";
}

?>
<html>
<head>
	<title>Add edit admin</title>
	        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <link href="bootstrap.css" rel="stylesheet">
        <style>
       /* body { 
background: url() no-repeat !important; 
-webkit-background-size: cover;
-moz-background-size: cover;
-o-background-size: cover;
background-size: cover;

} */
        </style>

</head>
<body>
	<section class="container">
	<center><h2>Create Admin Account </h2></center>
	<div class="row">
		<br>
<div id="signup">
	<form id="regForm" action="" method="post" class="form-horizontal">
	<div class="form-group required"><label class="col-xs-5 control-label">First name</label><div class="col-xs-4">
	<input class="form-control" id="id_first_name" maxlength="30" name="first_name" placeholder="first name" required="required" title="" type="text" /></div></div>
	<div class="form-group required"><label class="col-xs-5 control-label">Last name</label><div class="col-xs-4">
	<input class="form-control" id="id_last_name" maxlength="30" name="last_name" placeholder="last name" required="required" title="" type="text" /></div></div>
	<div class="form-group required"><label class="col-xs-5 control-label">username</label><div class="col-xs-4">
	<input class="form-control" id="username" name="username" placeholder="username" required="required" title="" type="text" /></div></div>
	
	<div class="form-group required"><label class="col-xs-5 control-label">Email</label><div class="col-xs-4">
	<input class="form-control" id="id_email" name="admin_email" placeholder="E-mail" required="required" title="" type="email" /></div></div>
	
	
	<div class="form-group required">
	<div class="col-md-4">
	
	</div>
	<div class="col-md-4">
	<strong style="display:inline; color:red">Password will be mailed to corresponding Email id</strong> 
	</div>
	</div>
	<div id="process"> </div>
	<div class="form-group">
	<label class="col-xs-4">&#160;</label> 
	
	<div class="col-xs-3">
	<button id="register" type="submit" class="btn btn-primary">
	<span class="glyphicon glyphicon-star"></span> Create admin Account!
	</button>
	
	</div><div class="col-xs-3">
	<a href="logout.php" class="btn btn-danger"><span class="glyphicon glyphicon-log-out"></span> Super Admin Logout</a>
	</div>
	</div>
	</form>
	<div id="result"> </div>
	</div>
		

	</div>
	<section class="container">
	</body>

	</html>