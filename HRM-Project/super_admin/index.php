<?php
    session_start();
    
    
    if(isset($_SESSION['super_admin_login'])) 
    header('location:manage_admin.php');   
    else{
        if(!isset($_SESSION['super_admin_login'])){
            if(isset($_POST['submitBtn'])){
                $username=  $_POST['uname'];
                $pass=  $_POST['pwd'];
                $ID = "admin";
                $password = "123456";
                if($username==$ID && $pass==$password) {
                    
                    $_SESSION['super_admin_login']=1;
                    
                header('location:manage_admin.php'); }
                else
                $msg="<div class='alert alert-danger col-xs-4'>
                <strong>Error!</strong> Sorry you entered wrong username and password combination!!</div>";
            }
        }
        else {
            header('location:manage_admin.php');
        }
        
        
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
       
        
        <title>Creating Admin </title>
        
        
        <!-- Bootstrap core CSS -->
        <link href="bootstrap.css" rel="stylesheet">
        
        <!-- Custom styles for this template -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

        <style>
            .form-group.required .control-label:after {
            content:"*";
            color:red;
            }
            .form-horizontal .control-label{
            text-align:left !important; 
            }
            .lockin
            {
            display:inline;
            }
        </style>
        
        <link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
        <link media="screen" rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,700,300italic">
    
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    </head>
    
    <body>
    
    <div id="mainWrap">
    
    <section class="container">
    
    <div class="row">
    
    <div id="loggit">
    
    
    <img src="../img/admin.png" class="img-responsive">
    <h3><i class="fa fa-lock"></i> super Admin <strong>Login</strong> <strong>Panel</strong></h3>
    <h3></h3>
    
    
    <div id="login">
    <form action="" id="logForm" method="post" class="form-horizontal">
    <div class="form-group">
    <div class="col-xs-4">
    <div class="input-group">
    <span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>
    <input type="text" name="uname" class="form-control input-lg" placeholder="Username" autocomplete="off">
    </div>
    </div>
    </div>
    <div class="form-group">
    <div class="col-xs-4">
    <div class="input-group">
    <span class="input-group-addon"><i class="fa fa-key fa-fw"></i></span>
    <input type="password" name="pwd" class="form-control input-lg" placeholder="Password" autocomplete="off">
    </div>
    </div>
    </div>
    <div class="form-group formSubmit">
    <div class="col-sm-2">
    <div class="checkbox">
    <!-- <label>
    <input type="checkbox" checked autocomplete="off"> Keep me logged in
    </label> -->
    </div>
    </div> 
    <div class="col-sm-5 submitWrap">
    <input type="submit" name="submitBtn" value="Log In" class="btn btn-primary btn-lg">
    </div>
    </div>
        <?php echo $msg ?>

    <div class="form-group formNotice">
    <div class="col-xs-12">
    </div>
    
    </div>                                                      <div class="col-xs-12">
    
    </div>
    </form>
    </div>
    
    </section>
    
    </div>
    <footer class="clearfix">
      </footer>
    
    
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
   
    
    
    </body>
    </html>     
        