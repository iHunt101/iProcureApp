<?php 
$agency_id = $_GET['agency_id'];
$year = $_GET['year'];
$url = $_GET['year'];
$row = $system->selected_agency($agency_id); 
?>

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Bid Schedule for <?php echo $row['org_name']; ?></h3>
  </div>
  <div class="panel-body">
		<!-- calendar -->
		<div class="responsive-calendar">
				<div class="controls calendar_button">
					<a class="pull-left" data-go="prev"><div class="btn btn-primary"><i class="fa fa-arrow-left"></i> Prev</div></a>
					<h4> <span data-head-month></span> <span data-head-year></span></h4>
					<a class="pull-right" data-go="next"><div class="btn btn-primary">Next <i class="fa fa-arrow-right"></i></div></a>
				</div>
				<div class="day-headers">
					<div class="day header day_header">Mon</div>
					<div class="day header day_header">Tue</div>
					<div class="day header day_header">Wed</div>
					<div class="day header day_header">Thu</div>
					<div class="day header day_header">Fri</div>
					<div class="day header sat_sun_day">Sat</div>
					<div class="day header sat_sun_day">Sun</div>
				</div>
				<div class="days" data-group="days"></div>
		</div>

	<script>
			$(document).ready(function () {
			$(".responsive-calendar").responsiveCalendar({
				time: '<?php echo date('Y-m'); ?>',
				events: {<?php  $system->calendar_date($agency_id,$url);  ?>}
			});
			});
    </script>
		<!--end  calendar -->
	<hr class="hr">	
	<a href="a_page.php?page=a_home" class="btn btn-success btn-block"><i class="fa fa-arrow-left"></i> Back</a>	
  </div>
</div>