						<?php include('Ckan_client.php'); ?>
							<div class="panel panel-default no_margin">
							<div class="panel-body panel_menu">
									<!-- modal -->
										<?php include('a_category_modal.php'); ?>
										<?php include('a_request_modal.php'); ?>
										<?php include('a_award_modal.php'); ?>
										<?php include('a_winner_modal.php'); ?>
									<!-- end modal -->
									<!-- modal -->
										<?php include('a_bid_sked_modal.php'); ?>
										<?php include('a_top_abc_modal.php'); ?>
										<?php include('a_agency_performance_modal.php'); ?>
										<?php include('a_view_annual_record_modal.php'); ?>
										<?php include('a_project_info_modal.php'); ?>
									<!-- end modal -->
									<!--  CHANGED THIS PART!!!!  NOTE: I also changed the modal titles  -->
									<ul class="nav nav-pills nav-stacked sidebar_nav pe_hov">
										<li><a href="#a_category" data-toggle="modal">View Agency Stats <span class="pull-right"><i class="fa fa-arrow-right"></i></span></a></li>
										<li><a href="#a_award" data-toggle="modal">List Awarded Contracts  <span class="pull-right"><i class="fa fa-arrow-right"></i></span></a></li>
										<li><a href="#a_request" data-toggle="modal">List Current Requests  <span class="pull-right"><i class="fa fa-arrow-right"></i></span></a></li>
										<li><a href="#a_winner" data-toggle="modal">List Bid Winners  <span class="pull-right"><i class="fa fa-arrow-right"></i></span></a></li>
										<li><a href="#project_info" data-toggle="modal">Create Project Advisory  <span class="pull-right"><i class="fa fa-arrow-right"></i></span></a></li>
										<li><a href="#project_info" data-toggle="modal">View Project Feedbacks  <span class="pull-right"><i class="fa fa-arrow-right"></i></span></a></li>
										<li><a href="home.php"><i class="fa fa-arrow-left"></i> Back to Main Menu  </a></li>
										<button class="btn btn-success type_btn">Know a Trivia</button> <font color="red"> <b><span id="typed"></b> </font> </span>
									
									</ul>
									<!--  END OF CHANGED PART!!!!  -->
							</div>
							
							</div>
						
						<?php 
			/* 			$sql = 
					 	$query = file_get_contents('http://api.data.gov.ph/api/action/datastore_search_sql?sql=SELECT+org_name+FROM+%2223de10e9-197e-4294-abd1-eba0188110cd%22+LIMIT+10');
						$query = json_decode($query, true);
					
						foreach($query['result']['records'] as $row){  */
						?>
						<?php  /* echo $row['org_name']; */ ?>
						<br>
						<?php/*  }  */?>
						
						<?php 
/* 		$bid_information = '"9c74991c-a5e6-4489-8413-c20a8a181d90"';
		$award = '"9c74991c-a5e6-4489-8413-c20a8a181d90"';
		$sql = urlencode('SELECT SUM(approved_budget) as total_abc FROM '.$bid_information.' GROUP BY org_id LIMIT 50 ');
		$query = file_get_contents('http://api.data.gov.ph/api/action/datastore_search_sql?sql='.$sql.'');
		$query = json_decode($query, true);
		foreach($query['result']['records'] as $row){ */
						
						?>
						
		<?php  /* echo number_format($row['total_abc'],2); */ ?>
		<br>	
						
		<?php/*  } */ ?>				
						
						
						<?php
/* 						$sql = urlencode('SELECT org_name FROM "23de10e9-197e-4294-abd1-eba0188110cd" LIMIT 10');
					 	$query = file_get_contents('http://api.data.gov.ph/api/action/datastore_search_sql?sql='.$sql.'');
						$query = json_decode($query, true); */
					/* 	echo count($query); */
					/* 	foreach($query['result']['records'] as $row){  */
						?>
						<?php /*  echo $row['org_name']; */ ?>
						<br>
						<?php /* } */ ?>
						

 <?php
   $message = "Every minute, the government builds 75 meters of concrete road nationwide.";
   
   $text = substr($message, 0, 100);
   $text = urlencode($text);
   $file  = 'filename';
   $file = "audio/" . $file . ".mp3";
   $mp3 = file_get_contents("http://translate.google.com/translate_tts?tl=en&q=$text");
   file_put_contents($file, $mp3);
?>

  <script>
	function play(){
       var audio = document.getElementById("audio");
       audio.play();
        } 
   </script>
   
		<audio class="hidden" id="audio" controls="controls">
			<source src="<?php echo $file; ?>" type="audio/mp3" />
		</audio>
		

<script>
jQuery(document).ready(function(){
$('.type_hr').hide();
$('.p_2').hide();
jQuery(".type_btn").click(function(e){
$(this).hide();

    
        $("#typed").typed({
            strings: ["Every minute, the government builds 75 meters of concrete road nationwide."],
            typeSpeed: 0001,
            backDelay: 500,
            loop: false,
            // defaults to false for infinite loop
            loopCount: false,
            callback: function(){  },
            resetCallback: function() {  }
        });
			
				$('.type_hr').show();
				$('.p_2').show();
				play();
				 
			});
		});
	

    </script>	



