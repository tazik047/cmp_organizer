<?php function RenderBody(){
	$scripts = '<script src="/Views/assets/js/fullcalendar/moment.min.js"></script>'.
		'<script src="/Views/assets/js/fullcalendar/fullcalendar.min.js"></script>'.
		'<script src="/Views/assets/js/fullcalendar/lang/ru.js"></script>'.
		'<script src="/Views/assets/js/calendar-conf-events.js"></script>';
	?>
	<link rel='stylesheet' href='/Views/assets/js/fullcalendar/jquery-ui.min.css' />
	<link href="/Views/assets/js/fullcalendar/fullcalendar.min.css" rel="stylesheet" />
	<link href="/Views/assets/js/fullcalendar/fullcalendar.print.css" rel="stylesheet" media='print'/>
	<aside class="col-lg-3 mt">
		<h4><i class="fa fa-angle-right"></i> Draggable Events</h4>
		<div id="external-events">
			<div class="external-event label label-theme">My Event 1</div>
			<div class="external-event label label-success">My Event 2</div>
			<div class="external-event label label-info">My Event 3</div>
			<div class="external-event label label-warning">My Event 4</div>
			<div class="external-event label label-danger">My Event 5</div>
			<div class="external-event label label-default">My Event 6</div>
			<div class="external-event label label-theme">My Event 7</div>
			<div class="external-event label label-info">My Event 8</div>
			<div class="external-event label label-success">My Event 9</div>
			<p class="drop-after">
				<input type="checkbox" id="drop-remove">
				Remove After Drop
			</p>
		</div>
	</aside>
	<aside class="col-lg-9 mt">
		<section class="panel">
			<div class="panel-body">
				<div id="calendar" class="has-toolbar"></div>
			</div>
		</section>
	</aside>
<?php
	return $scripts;
} ?>