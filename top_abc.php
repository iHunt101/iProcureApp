<?php
	$year = $_GET['year'];
	$data_field = 'ABC Amount';
?>
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Top Agencies based on ABC Total, <?php echo $year; ?></h3>
  </div>
  <div class="panel-body">
		<!--graph -->
		<div id="graph"></div>	
		<!-- end graph-->
<?php 
 $row_1 = $system->top_agency_by_abc_row($year,'0,1');
 $row_2 = $system->top_agency_by_abc_row($year,'1,1');
 $row_3 = $system->top_agency_by_abc_row($year,'2,1');
?>
		<div class="panel panel-default">
  <div class="panel-heading">
   <p class="no_margin">
   <h3 class="panel-title">
		<button class="btn btn-success type_btn">Interpret Result</button>
		<span id="typed"></span>
		<hr class="type_hr hr">
		<span class="p_2">Followed by <?php echo $row_2['orgname']; ?> and <?php echo $row_3['orgname']; ?> with a <?php echo $data_field; ?> of 	<?php echo number_format($row_2['total_abc'],2); ?> and  <?php echo number_format($row_3['total_abc'],2); ?> respectively.</span>
		<span id="typed1"></span>
	</h3>
	</p>
  </div>
   
  <div class="panel-body no_padding">
	<table class="table table-bordered table-condensed no_margin">
		<thead>
			<tr>
				<th class="center">Rank</th>
				<th>Agency Name</th>
				<th><?php echo $data_field; ?></th>
			</tr>
		</thead>
		<tbody>
		<?php
			$x = 1;
			foreach($system->top_agency_by_abc($year,10) as $row){
					$number = $x++;
					$total_abc = $row['total_abc'];

		?>
		<tr>
			<td class="center"><?php echo $number; ?></td>
			<td><?php echo $row['orgname']; ?></td>
			<td class="right"><?php echo number_format($row['total_abc'],2); ?></td>
		</tr>
			<?php
				$array[] = '{"year":'.$number.','.'"income":'.$total_abc.','.'"expenses":'.$total_abc.','.'"title":'.'"'.$row['orgname'].'"'.'}'; 
			?>	
		<?php } ?>
		<?php
		 $row = $system->top_agency_by_abc_sum($year,10);
		 $grand_total = $row['total_abc'];		
		?>
		<tr>
			<td></td>
			<td class="right">Grand Total</td>
			<td class="right"><?php echo number_format($row['total_abc'],2); ?></td>
		</tr>
		</tbody>
		</table>
		
		
 <?php
   $message = '
		The '.$row_1['orgname'].' is the ranked first  with 
		'.$data_field.' of '.number_format($row_1['total_abc'],2).' representing  
		'.number_format(($row_1['total_abc'] / $grand_total) * 100,2).'  % of '.$data_field.' of
   ';
   
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
		
		
  </div>
</div>

	
	
<script>
jQuery(document).ready(function(){
$('.type_hr').hide();
$('.p_2').hide();
jQuery(".type_btn").click(function(e){
$(this).hide();

    
        $("#typed").typed({
            strings: [" The <?php echo $row_1['orgname']; ?> is ranked first with <?php echo $data_field; ?> of <?php echo number_format($row_1['total_abc'],2); ?>
					representing  <?php echo number_format(($row_1['total_abc'] / $grand_total) * 100,2); ?> %  of <?php echo $data_field; ?>  of <?php echo number_format($row_1['total_abc'],2); ?>  "],
            typeSpeed: 0001,
            backDelay: 500,
            loop: false,
            // defaults to false for infinite loop
            loopCount: false,
            callback: function(){  },
            resetCallback: function() {  }
        });
			var delay = 6000;
				setTimeout(function(){ 
				$('.type_hr').show();
				$('.p_2').show();
				play();
				}, delay); 
			});
		});
	

    </script>	
	<?php include('top_abc_graph_script.php'); ?>
  </div>
</div>