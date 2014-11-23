<?php include('header.php'); ?>
  <body>
 <?php
	$page = $_GET['page'];
 ?>
		<div class="container">
					<div class="row">	
						<div class="col-lg-12" >
							<div class="panel panel-default">
							<div class="panel-body panel_menu gppb_menu">
									<ul class="nav nav-pills nav-stacked sidebar_nav gp_hov">
										<li><a style="cursor:pointer" onclick="proc('111i')"> PROC 111 </a></li>
										<li><a style="cursor:pointer" onclick="proc('112i')">PROC 112</a></li>
										<li><a style="cursor:pointer" onclick="proc('113i')"> Proc 113 </a></li>
										<li><a style="cursor:pointer"  onclick="proc('114i')"> Proc 114</a></li>
										<li><a href='ilonggo_menu.php?page=ilonggo_menu_home' style="cursor:pointer" ><i class="fa fa-arrow-left"></i> Back </a></li>
										<button class="btn btn-success type_btn">Know a Trivia</button> <font color="red"> <b><span id="typed"></b> </font> </span>
										
									</ul>
									
							</div>

								<div class="panel-body panel_menu gppb_content" style="max-height:400px;overflow:hidden" hidden>
									 
								
									 								
							</div>
							
							</div>
							
						</div>
						 
					</div>
		</div>
  </body>
<?php include('script.php'); ?>  
</html>


 <?php
   $message = "Every month, the government procures 3,500 laptops and 14,000 desktop computers.";
   
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
            strings: ["Every month, the government procures 3,500 laptops and 14,000 desktop computers."],
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



