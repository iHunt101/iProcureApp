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
		<table class="table table-bordered table-condensed">
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
/* 				$nralcode = $row['nralcode']; */
				$total_abc = $row['total_abc'];

		?>
		<tr>
			<td class="center"><?php echo $number; ?></td>
			<td><?php echo $row['agency_name']; ?></td>
			<td class="right"><?php echo number_format($row['total_abc'],2); ?></td>
		</tr>
			<?php
				$array[] = '{"year":'.$number.','.'"income":'.$total_abc.','.'"expenses":'.$total_abc.','.'"title":'.'"'.$row['agency_name'].'"'.'}'; 
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
 $row_1 = $system->top_agency_by_abc_row($year,'0,1');
 $row_2 = $system->top_agency_by_abc_row($year,'1,1');
 $row_3 = $system->top_agency_by_abc_row($year,'2,1');
?>
	
<div class="well">
<p class="color_red">
		
	The <?php echo $row_1['agency_name']; ?>	is ranked 1 with <?php echo $data_field; ?> of <?php echo number_format($row_1['total_abc'],2); ?>
	representing ( <?php echo number_format(($row_1['total_abc'] / $grand_total) * 100,2); ?> % ) of <?php echo $data_field; ?> <?php echo number_format($row_1['total_abc'],2); ?>.
</p>
<p>
	<?php ?>	
		Followed by <?php echo $row_2['agency_name']; ?> and 	
		<?php echo $row_3['agency_name']; ?> with a <?php echo $data_field; ?> of 	
		<?php echo number_format($row_2['total_abc'],2); ?> and
		<?php echo number_format($row_3['total_abc'],2); ?> respectively.
</p>	
</div>
	
<?php 
	$ranking_array =  implode(',',$array);	 
?>
<script>
 var chart = AmCharts.makeChart("graph", {

    "type": "serial",
    "theme": "none",  
    "handDrawn":true,
    "handDrawScatter":1,
    "legend": {
        "useGraphSettings": true,
        "markerSize":12,
        "valueWidth":0,
        "verticalGap":0
    },
    "dataProvider": [<?php echo $ranking_array; ?>],
    "valueAxes": [{
        "minorGridAlpha": 0.08,
        "minorGridEnabled": true,
        "position": "top",
        "axisAlpha":0
    }],
    "startDuration": 1,
    "graphs": [{
         "balloonText": "<span style='font-size:13px;'>Rank <b>[[category]]</b>: [[title]] Total ABC = P <b>[[value]]</b></span>",
        "title": "Income",
        "type": "column",
        "fillAlphas": 0.8,
         
        "valueField": "income"
    }, {
         "balloonText": "<span style='font-size:13px;'>Rank <b>[[category]]</b>: [[title]] Total PO =  P <b>[[value]]</b></span>",
        "bullet": "round",
        "bulletBorderAlpha": 1,
        "bulletColor": "#FFFFFF",
        "useLineColorForBulletBorder": true,
        "fillAlphas": 0,
        "lineThickness": 2,
        "lineAlpha": 1,
        "bulletSize": 7,
        "title": "Expenses",
        "valueField": "expenses"
    }],
    "rotate": true,
    "categoryField": "year",
    "categoryAxis": {
        "gridPosition": "start"
    }
});
</script>

  </div>
</div>