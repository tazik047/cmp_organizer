 <?php
	$AllowAnonymous = true;
	Include 'Logic/includes.php';
	if($_POST){
		$errors = login();
		if(count($errors)==0){
			header("Location: ". generateGlobalUrl('index'));
		}
	}
	?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Stanislav Zadorozhnii">

    <title>Вход</title>

    <!-- Bootstrap core CSS -->
    <link href="/Views/assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="/Views/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        
    <!-- Custom styles for this template -->
    <link href="/Views/assets/css/style.css" rel="stylesheet">
    <link href="/Views/assets/css/style-responsive.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->

	  <div id="login-page">
	  	<div class="container">
	  	
		      <form class="form-login" method="POST">
		        <h2 class="form-login-heading">войти</h2>
		        <div class="login-wrap">
					<?php if(isset($errors)): ?>
						<p class="bg-danger">
							<?php
								foreach($errors as $e){
									print "<span> — $e</span><br>";
								}
							?>
						</p>
					<?php endif; ?>
		            <input type="text" class="form-control" placeholder="Email" autofocus name="login">
		            <br>
		            <input type="password" class="form-control" placeholder="Password" name="password">
		            <br>
					<button class="btn btn-theme btn-block" href="index.html" type="submit"><i class="fa fa-lock"></i> ВОЙТИ</button>
		            <hr>
		            <div class="registration">
		                Вы еще не зарегистрировались?<br/>
		                <a class="" href="<?php print generateGlobalUrl('register'); ?>">
		                    Создать пользователя
		                </a>
		            </div>
		
		        </div>		
		      </form>	  	
	  	
	  	</div>
	  </div>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="/Views/assets/js/jquery.js"></script>
    <script src="/Views/assets/js/bootstrap.min.js"></script>

    <!--BACKSTRETCH-->
    <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
    <script type="text/javascript" src="/Views/assets/js/jquery.backstretch.min.js"></script>
    <script>
        $.backstretch("/Views/assets/img/login-bg.jpg", {speed: 500});
    </script>


  </body>
</html>