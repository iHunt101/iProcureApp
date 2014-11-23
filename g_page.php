	<?php include('header.php'); ?>
<head> 
 <style>
 
	h2{
	display: inline;
	}
  </style>
  </head>
  
  <body>
 <?php
	$page = $_GET['page'];
 ?>
		<div class="container">
					<div class="row">
					<?php include("banner.php"); ?>
						<!--<div class="col-lg-3">-->
							<div class="panel panel-default">
							<div class="panel-body panel_menu">
									<!-- modal -->
									<?php include('g_bid_sked_modal.php'); ?>
									<?php include('g_top_abc_modal.php'); ?>
									<?php include('g_all_abc_modal.php'); ?>
									<?php include('g_agency_performance_modal.php'); ?>
									<!-- end modal -->
									<!-- Edited this part !!! -->
									
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Select Language / Magpili ng Wika </h3>
  </div>
  <div class="panel-body">
								
		<ul class="nav nav-pills nav-stacked sidebar_nav gp_hov">
			<li><a href="english_menu.php?page=english_menu_home">English</a></li>
			<li><a href="tagalog_menu.php?page=tagalog_menu_home">Tagalog</a></li>

			<li><a href="ilonggo_menu.php?page=ilonggo_menu_home">Ilonggo</a></li>
			<li><a href="not_yet_implemented.php">Cebuano</a></li>
			<li><a href="not_yet_implemented.php">Ilocano</a></li>
			<li><a href="not_yet_implemented.php">Tausog</a></li>
			 
			<li><a href="not_yet_implemented.php">More...</a></li>
			
			
			<li><a href="home.php"><i class="fa fa-arrow-left"></i> Back to Main Menu</a></li>
			
			<button class="btn btn-success type_btn">Know a Trivia</button> <font color="red"> <b><span id="typed"></b> </font> </span>
			
			
		</ul>
  </div>
</div>

	
									
									<!-- End edited -->
							</div>
							
							</div>
							
						<!--</div>-->
						<div class="col-lg-9">
							<?php include($page.'.php'); ?>
						</div>
						<?php include('footer.php') ?>
					</div>
					
		</div>
  </body>
<?php include('script.php'); ?>  
</html>


 <?php
   $message = "In just one year, the government procured computer ink enough to fill 55 Olympic size swimming pools.";
   
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
            strings: ["In just one year, the government procured computer ink enough to fill 55 Olympic size swimming pools."],
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

