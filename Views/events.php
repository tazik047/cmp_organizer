<?php function RenderBody(){
	$scripts = '<script src="/Views/assets/js/fullcalendar/moment.min.js"></script>'.
		'<script src="/Views/assets/js/fullcalendar/fullcalendar.min.js"></script>'.
		'<script src="/Views/assets/js/fullcalendar/lang/ru.js"></script>'.
		'<script src="/Views/assets/js/sweetalert/sweetalert.min.js"></script>'.
		'<script src="/Views/assets/js/calendar-conf-events.js"></script>';
	?>
	<link rel='stylesheet' href='/Views/assets/js/fullcalendar/jquery-ui.min.css' />
	<link href="/Views/assets/js/fullcalendar/fullcalendar.min.css" rel="stylesheet" />
	<link href="/Views/assets/js/fullcalendar/fullcalendar.print.css" rel="stylesheet" media='print'/>
	<link rel='stylesheet' href='/Views/assets/js/sweetalert/sweetalert.css' />
	<aside class="col-lg-12 mt">
		<section class="panel">
			<div class="panel-body" id="calendar-wrap">
				<div id="loading">
					<img width="200" height="200" src="/Views/assets/img/loading.gif">
				</div>
				<div id="calendar" class="has-toolbar"></div>
			</div>
		</section>
	</aside>
<?php
	return $scripts;
} ?>