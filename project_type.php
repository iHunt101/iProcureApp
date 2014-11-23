<?php 
include('dbcon.php');
include('class.php');
$project_type = $_POST['id'];

$id = $_GET['id'];
$row = $system->selected_bid_info($id);

?>
<script>
$(document).ready(function() {
    $('.date_picker').Zebra_DatePicker({
        format: 'm/d/Y'
    });
    });
</script>	
<?php
if($project_type == 'Road Project'){
	include('road_project_details.php'); 
}else if($project_type == 'Building'){
	include('building_details.php');	
}else if($project_type == 'Bridge'){
	include('bridge_details.php');
} 
 ?> 