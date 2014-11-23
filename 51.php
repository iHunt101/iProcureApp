<style type="text/css">
	#chartdiv {
	width	: 100%;
	height	: 500px;
}				

.typed-cursor{
    opacity: 1;
    -webkit-animation: blink 0.7s infinite;
    -moz-animation: blink 0.7s infinite;
    animation: blink 0.7s infinite;
}
@keyframes blink{
    0% { opacity:1; }
    50% { opacity:0; }
    100% { opacity:1; }
}
@-webkit-keyframes blink{
    0% { opacity:1; }
    50% { opacity:0; }
    100% { opacity:1; }
}
@-moz-keyframes blink{
    0% { opacity:1; }
    50% { opacity:0; }
    100% { opacity:1; }
}

</style>

<script type="text/javascript" src="http://www.amcharts.com/lib/3/amcharts.js"></script>
<script type="text/javascript" src="http://www.amcharts.com/lib/3/serial.js"></script>
<script type="text/javascript" src="http://www.amcharts.com/lib/3/themes/none.js"></script>


<div class="panel panel-default">
    <div class="panel-heading">PM -  Procurement Savings Analysis</div>
    <div class="panel-body">



<div id="chartdiv"></div>					

	<p class="interpret_result_text1" hidden>&nbsp&nbsp&nbsp For the year <strong>2009</strong>, the Government of the Philippines (GOP) allocated an amount of P <span style='font-weight:bold' class='tr_cont2' ></span> for bid requests,
	and after biddng, the GOP awarded a lower consolidated contract amount of P<span style='font-weight:bold' class='gop_award_cont2' ></span>, and realized a savings of <span style='font-weight:bold' class='ts_cont2' ></span>, and attaining an efficiency of <span style='font-weight:bold' class='sa_cont2' ></span> %. Likewise, 
	the GOP also awarded a FAP-funded project amounting to P <span style='font-weight:bold' class='fap_award_cont2' ></span>, out of the total awarded contracts amounting to P <span style='font-weight:bold' class='award_cont2'></span>.</p>

	<hr>

	<p class="interpret_result_text2" hidden><br><br>&nbsp&nbsp&nbspSa taong <strong>2009</strong>, ang Gobyerno ng Pilipinas (GOP) ay naghain ng halagang P <span style='font-weight:bold' class='tr_cont2' ></span> para sa mga proyekto,
	at pagkatapos ng biddng, ay gumasta lamang ito ng P<span style='font-weight:bold' class='gop_award_cont2' ></span>, para pambayad sa lahat ng kontrata sa mga proyekto. Samakatuid, nakaipon ang Gobyerno ng  P<span style='font-weight:bold' class='ts_cont2' ></span> .</p>



<table border="1" style="text-align:right;width:100%">
	<tr>
		<th style="text-align:right">Total Bid Requests, GOP:</th>
		<td style="text-align:right;padding-right:5px;"><span class='tr_cont ' ></span></td>
	</tr>
	<tr>
		<th style="text-align:right">Total Bid Awarded, GOP:</th>
		<td style="text-align:right;padding-right:5px;"><span class='gop_award_cont ' ></span></td>
	</tr>
	<tr>
		<th style="text-align:right">Total Bid Awarded, FAP:</th>
		<td style="text-align:right;padding-right:5px;"><span class='fap_award_cont ' ></span></td>
	</tr>
	<tr>
		<th style="text-align:right">Total Savings, GOP:</th>
		<td style="text-align:right;padding-right:5px;"><span class='ts_cont ' ></span></td>
	</tr>
	<tr>
		<th style="text-align:right">Savings Eff,%, GOP :</th>
		<td style="text-align:right;padding-right:5px;"><span class='sa_cont ' ></span></td>
	</tr>
</table>
 


<button class="btn btn-success intr_btn">Interpret Result</button>
<div class="interpret_result " style="background-color:#ccffcc">


</div>
<br>
<div class="interpret_result2 " style="background-color:#ccffcc">


</div>

<hr>

    

</div>
</div>



<div class="panel panel-default">
    <div class="panel-heading">GP 116 Find ongoing projects</div>
    <div class="panel-body">

 <div style="50%">
 	<input type="" class="form-control search116_str" style="width:100px;">
 	<button class="btn btn-success" onclick='search116_name()' >Search agency</button>
 	<select>
 		
 	</select>
 	<button class="btn btn-success search116_name">Select Year</button>

 </div> 
 <div class="51data">


 	<table class='51data display' id='table_id' border="1" width="100%" style="font-size:11px;">

<thead>
	<tr>
		<th>No</th>
		<th>Agency Name</th>
		<th>Request (P)</th>
		<th>Award</th>
		<th>% Eff</th>
	</tr>
</thead>
<tbody>

<?php
error_reporting(0);



$organization = '"ec10e1c4-4eb3-4f29-97fe-f09ea950cdf1"';
$bid_info = '"baccd784-45a2-4c0c-82a6-61694cd68c9d"';
$award = '"539525df-fc9a-4adf-b33d-04747e95f120"';


// if (isset($_GET['page'])) {
// 	$page = '15'
// }


$sql = urlencode('SELECT org_name,approved_budget,contract_amt,contract_start_date FROM ' . $organization . ' 
	INNER JOIN  ' . $bid_info . ' ON (' . $organization . '.org_id = '  . $bid_info . '.org_id )
	INNER JOIN  ' . $award . ' ON (' . $bid_info .'.ref_id =' . $award . '.ref_id) LIMIT 10');


$json_string = file_get_contents("http://philgeps.cloudapp.net:5000/api/action/datastore_search_sql?sql=" . $sql);
$json = json_decode($json_string, true);
$json = $json ['result']['records'];
$num = 1;
$reqtot = 0;
$awardtot = 0;
$fap = 0;
$gop_award = 0;
$fap_award = 0;
foreach ($json as $key => $value) {

	$eff = ($value['contract_amt'] / $value['approved_budget']);
	$eff = round($eff * 100,2);
	$reqtot = ($reqtot + $value['approved_budget']);
	$awardtot = ($awardtot + $value['contract_amt']);
	$date = $value['contract_start_date'];

	echo "<tr>";
	echo "<td>$num</td>";

	echo "<td>" . $value['org_name'] . "</td>";
	echo "<td style='text-align:right'> ". number_format($value['approved_budget'],2) ."</td>";
	echo "<td style='text-align:right'> ". number_format($value['contract_amt'],2) ."</td>";
	echo "<td style='text-align:right'> $eff </td>";
	echo "</tr>";
	$num = ($num + 1);
	if ($value['approved_budget'] == 0) {
		$fap = ($fap + $value['contract_amt']);
		$fap_award = ($fap_award + $value['contract_amt']);
	}else{
		$gop_award = ($gop_award + $value['contract_amt']);
	}

}

	$efftot = ($gop_award / $reqtot);
	$efftot = round($efftot * 100,2);
	$se = ($reqtot - $gop_award);
	$ts = ($se / $reqtot);
	$ts = round($ts * 100,2);
?>

<tr>
	
	<td colspan="2"></td>
		<?php echo "<td style='text-align:right' class='reqtot'>" . number_format($reqtot,2) . "</td>"; ?>
		<?php echo "<td style='text-align:right' class='awardtot'>" . number_format($awardtot,2) . "</td>"; ?>
		<?php echo "<td style='text-align:right' class='ts'> $ts </td>"; ?>
		<?php echo "<td style='display:none;' class='savings'>". number_format($se,2) ."</td>";?>
		<?php echo "<td style='display:none;' class='fap'>". number_format($fap,2) ."</td>";?>
		<?php echo "<td style='display:none;' class='gop_award'>". number_format($gop_award,2) ."</td>";?>
		<?php echo "<td style='display:none;' class='fap_award'>". number_format($fap_award,2) ."</td>";?>

</tr>
</tbody>
</table>


 </div>  
	</div>
</div>


 







<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> 
<script src="type/typed.js" type="text/javascript"></script>
<script type="text/javascript" src="js/troll.js"></script>

<!-- DataTables CSS -->
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.4/css/jquery.dataTables.css">

<!-- DataTables -->
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.4/js/jquery.dataTables.js"></script>

<script type="text/javascript">
	$(document).ready(function() 
    { 
    	var reqtot = $('.reqtot').text();
    	var awardtot = $('.awardtot').text();
    	var savings = $('.savings').text();
    	var ts = $('.ts').text();
    	var fap = $('.fap').text();
    	var fap_award = $('.fap_award').text();
    	var gop_award = $('.gop_award').text();


        $(".tr_cont").html(reqtot);
        $(".ta_cont").html(awardtot);
        $(".ts_cont").html(savings);
        $(".sa_cont").html(ts);
        $(".fap_cont").html(fap);
        $(".gop_award_cont").html(gop_award);
        $(".fap_award_cont").html(fap_award);

        $(".ts_cont2").text(savings);
		$(".tr_cont2").text(reqtot);
        $(".sa_cont2").text(ts);
        $(".gop_award_cont2").text(gop_award);
        $(".fap_award_cont2").text(fap_award);        
        $(".award_cont2").text(awardtot);
         

var reqtot2 =  $('.reqtot').text().replace(/,/g, ''),
    asANumber = +reqtot2;
var fap_award2 = $('.fap_award').text().replace(/,/g, ''),
    asANumber = +fap_award2;
var gop_award2 =  $('.gop_award').text().replace(/,/g, ''),
    asANumber = +gop_award2;
var savings2 = $('.savings').text().replace(/,/g, ''),
    asANumber = +savings;


var chart = AmCharts.makeChart("chartdiv",
{
    "type": "serial",
	"theme": "none",
    "dataProvider": [{
        "name": "Requested, GOP",
        "points": reqtot2,
        "color": "#7F8DA9",
         "bullet": "http://www.amcharts.com/lib/3/images/0.gif"
    }, {
        "name": "Awarded, GOP",
        "points": gop_award2,
        "color": "#FEC514",
        "bullet": "http://www.amcharts.com//lib/3/images/1.gif"
    }, {
        "name": "Awarded, FAP",
        "points": fap_award2,
        "color": "#DB4C3C",
        "bullet": "http://www.amcharts.com//lib/3/images/2.gif"
    }, {
        "name": "Savings, GOP",
        "points": savings2,
        "color": "#DAF0FD",
        "bullet": "http://www.amcharts.com//lib/3/images/3.gif"
    }],
    "valueAxes": [{
        "maximum": 39999999999,
        "minimum": 0,
        "axisAlpha": 0,
        "dashLength": 1,
        "position": "left"
    }],
    "startDuration": 1,
    "graphs": [{
        "balloonText": "<span style='font-size:13px;'>[[category]]: <b>[[value]]</b></span>",
        "bulletOffset": 16,
        "bulletSize": 34,
        "colorField": "color",
        "cornerRadiusTop": 8,
        "customBulletField": "bullet",
        "fillAlphas": 0.8,
        "lineAlpha": 0,
        "type": "column",
        "valueField": "points"
    }],
    "marginTop": 0,
    "marginRight": 0,
    "marginLeft": 0,
    "marginBottom": 0,
    "autoMargins": false,
    "categoryField": "name",
    "categoryAxis": {
        "axisAlpha": 0,
        "gridAlpha": 0,
        "inside": true,
        "tickLength": 0
    },
	"exportConfig":{
      "menuTop":"0px",
      "menuRight":"0px",
      "menuItems": [{
      "icon": 'http://www.amcharts.com//lib/3/images/export.png',
      "format": 'png'	  
      }]  
    }
});



    } 
); 
    





 
	
   </script>
   
