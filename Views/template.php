<?php
/**
 * Created by PhpStorm.
 * User: Tazik
 * Date: 25.11.2015
 * Time: 22:59
 */?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Stanislav Zadorozhnii">

    <title>Органайзер</title>

    <!-- Bootstrap core CSS -->
    <link href="/Views/assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="/Views/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="/Views/assets/js/gritter/css/jquery.gritter.css" />
    <link rel="stylesheet" type="text/css" href="/Views/assets/lineicons/style.css">

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

  <section id="container" >
      <!-- **********************************************************************************************************************************************************
      TOP BAR CONTENT & NOTIFICATIONS
*********************************************************************************************************************************************************** -->
      <!--header start-->
      <header class="header black-bg">
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Свернуть меню"></div>
              </div>
            <!--logo start-->
            <a href="/" class="logo"><b>Органайзер</b></a>
            <!--logo end-->
            <div class="top-menu">
            	<ul class="nav pull-right top-menu">
                    <li><a class="logout" href="<?php print generateUrl('logout'); ?>">Выйти</a></li>
            	</ul>
            </div>
        </header>
      <!--header end-->

      <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
*********************************************************************************************************************************************************** -->
      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">

              	  <p class="centered"><a href="<?php print generateUrl('profile'); ?>"><img src="<?php print generateUrl('avatar'); ?>" class="img-circle" width="60"></a></p>
              	  <h5 class="centered"><?php
                      $user = get_current_organizer_user();
                      print $user->getFirstName()==""?$user->getEmail():($user->getSurname().' '.$user->getFirstName());
                      ?></h5>

                  <li class="mt">
                      <a class="active" href="<?php print generateUrl('home'); ?>">
                          <i class="fa fa-dashboard"></i>
                          <span>Главная</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-desktop"></i>
                          <span>Мои типы событий</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="<?= generateUrl('eventtypes'); ?>">Просмотреть</a></li>
                          <li><a  href="<?= generateUrl('eventtypes','method=create'); ?>">Создать</a></li>
                      </ul>
                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-cogs"></i>
                          <span>Календарь</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="<?= generateUrl('events')?>">Предстоящие события</a></li>
                          <li><a  href="<?= generateUrl('events','method=add')?>">Добавить событие</a></li>
                      </ul>
                  </li>
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->

      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
*********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">

              <div class="row">
                  <div class="col-lg-10 col-lg-offset-1 main-chart">

                  	<?php $scripts = RenderBody();  ?>

                  </div><!-- /col-lg-9 END SECTION MIDDLE --Ю

              </div><! --/row -->
          </section>
      </section>

      <!--main content end-->
      <!--footer start-->
      <footer class="site-footer">
          <div class="text-center">
2015 — Stanislav Zadorozhnii &copy;
              <a href="#" class="go-top">
                  <i class="fa fa-angle-up"></i>
              </a>
          </div>
      </footer>
      <!--footer end-->
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="/Views/assets/js/jquery.js"></script>
    <script src="/Views/assets/js/jquery-1.8.3.min.js"></script>
    <script src="/Views/assets/js/jquery-ui-1.9.2.custom.min.js"></script>
    <script src="/Views/assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="/Views/assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="/Views/assets/js/jquery.scrollTo.min.js"></script>
    <script src="/Views/assets/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="/Views/assets/js/jquery.sparkline.js"></script>


    <!--common script for all pages-->
    <script src="/Views/assets/js/common-scripts.js"></script>

    <script type="text/javascript" src="/Views/assets/js/gritter/js/jquery.gritter.js"></script>
    <script type="text/javascript" src="/Views/assets/js/gritter-conf.js"></script>

  <?= $scripts; ?>

	<script type="text/javascript">
    $(document).ready(function () {

		$('.go-top').click(function () {
			$.scrollTo(0, 1000);
		});
		
        return false;
        });
	</script>

	<script type="application/javascript">
    $(document).ready(function () {
        $.ajax({
            url:"/current_notification.php",
            success: function(data){
                if(data=='') return;
                $.gritter.add({
                    // (string | mandatory) the heading of the notification
                    title: 'Текущие события!',
                    // (string | mandatory) the text inside the notification
                    text: data,
                    // (string | optional) the image to display on the left
                    image: 'Views/assets/img/calendar-event.png',
                    // (bool | optional) if you want it to fade out on its own or just sit there
                    sticky: true,
                    // (int | optional) the time you want it to be alive for before fading out
                    time: '',
                    // (string | optional) the class name you want to apply to that specific message
                    class_name: 'my-sticky-class'
                });
            }
        });
    });

    </script>

  </body>
</html>
