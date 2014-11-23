<style type="text/css">
    #chartdiv {
    width   : 100%;
    height  : 500px;
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
    <div class="panel-heading">BIR Advisory : Taxable Dues of Bidders</div>
    <div class="panel-body">

<!--  <div style="50%">
    <input type="" class="form-control search116_str" style="width:100px;">
    <button class="btn btn-success" onclick='search116_name()' >Search agency</button>
    <select>
        
    </select>
    <button class="btn btn-success search116_name">Select Year</button>

 </div> 
 -->
  <div class="51data">


    <table class='51data display' id='table_id' border="1" width="100%" style="font-size:11px;">

<thead>
    <tr style="font-size:15px">
        <th>Reference #</th>
        <th>Name of Awarded Suppliers</th>
        <th>Potential Revenue (&#8369;)</th>
 
    </tr>
</thead>
<tbody>

<?php
// error_reporting(0);



$organization = '"ec10e1c4-4eb3-4f29-97fe-f09ea950cdf1"';
$bid_info = '"baccd784-45a2-4c0c-82a6-61694cd68c9d"';
$award = '"539525df-fc9a-4adf-b33d-04747e95f120"';
$bid_list = '"6427affb-e841-45b8-b0dc-ed267498724a"';

if (isset($_GET['amount'])) {
     $amount = $_GET['amount'];
}else{
     $amount = '100000';
}


 


// echo $value['award_id'] . "<br>";

$sql2 = urlencode('SELECT awardee,org_name,award_id,award_date,contract_amt from '. $award .' 
    INNER JOIN ' . $bid_info . ' ON '. $award .'.ref_id = '.$bid_info.'.ref_id
    INNER JOIN ' . $organization . ' ON '.$bid_info.'.org_id = '.$organization.'.org_id WHERE contract_amt >= '."'". $amount ."'".' ORDER BY award_id '); 

$json_string2 = file_get_contents("http://philgeps.cloudapp.net:5000/api/action/datastore_search_sql?sql=" . $sql2);
$json2 = json_decode($json_string2, true);
 
$json2 = $json2 ['result']['records'];

foreach ($json2 as $key2 => $value2) {

$date = $value2['award_date'];
$dt = new DateTime($date);

$date = $dt->format('M-d-Y');

   echo "<tr>";
    echo "<td>". $value2['award_id'] ."</td>";
    echo "<td><strong>" . $value2['awardee'] . "</strong><br>
    Project: ".$value2['org_name']."
    <br>
    Paying Entity: ".$value2['org_name']."
    <br>
    <a style='color:red'>Award Date :". $date."</a>
    </td>";
    echo "<td style='text-align:right;padding-right:6px;'> ".number_format($value2['contract_amt'],2)."</td>";
 
    echo "</tr>";


}
 

 
 
?>

 
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
   
