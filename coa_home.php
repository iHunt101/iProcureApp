



<div class="panel panel-default">
    <div class="panel-heading">COA Advisory : Potential Red-Flagged Contracts</div>
    <div class="panel-body">

 


<!-- <div class="well disp_total">
    
    Loading ....
</div> -->
<span id="typed"></span>
 
<p class="interpret_result_text1" hidden>&nbsp&nbsp&nbsp For the year <strong>2009</strong>, a total of &#8369; <a class="tc_disp"></a> transaction were recorded with a total contract amount
of <a class="tt_disp"></a>, these transactions as listed exceeded &#8369; 500,000.00 and are regarded as potential red-flagged contracts in as much as its variance from the approved budget of contract (ABC)
ranges only from 0.1% to 5%, thus indicating a potentially pre-arranged or rigged procurement process. 
</p>


<script>
jQuery(document).ready(function(){
$('.type_hr').hide();
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


<p class="interpret_result_text2" hidden>&nbsp&nbsp&nbsp A review by the COA of these transactions as listed is highly recommended.
</p>


<button class="btn btn-success intr_btn">Interpret Result</button>
<div class="interpret_result " style="background-color:#ccffcc">


</div>
<br>
<div class="interpret_result2 " style="background-color:#ccffcc">


</div>


  <div class="51data">
<table class="table table-bordered table-condensed">
<thead>
    <tr>
        <th class="center"> #</th>
        <th>Particulars</th>
 
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


 

 

$sql2 = urlencode('SELECT '.$award.'.ref_id,tender_title,approved_budget,contract_amt,org_name,awardee,award_date FROM ' . $bid_info . '
 INNER JOIN  ' . $award . ' ON (' . $award . '.ref_id = '  . $bid_info . '.ref_id )
 INNER JOIN ' . $organization . ' ON '.$bid_info.'.org_id = '.$organization.'.org_id  WHERE contract_amt >= '."'" . '500000' . "' ORDER BY contract_amt desc");  

$json_string2 = file_get_contents("http://philgeps.cloudapp.net:5000/api/action/datastore_search_sql?sql=" . $sql2);
$json2 = json_decode($json_string2, true);
$json2 = $json2 ['result']['records'];
 $num = 1;
  $c_amount = 0;
foreach ($json2 as $key2 => $value2) {

 $val = ($value2['approved_budget'] - $value2['contract_amt']);
 $val = ($val / $value2['contract_amt']);

if ($val < 6) {
   $date = $value2['award_date'];
$dt = new DateTime($date);

$date = $dt->format('M-d-Y');
$c_amount = ($c_amount + $value2['contract_amt']);
?>
   <tr>
	 <td class="center"><?php echo $num; ?></td>
     <td><strong><?php echo $value2['ref_id'] ." : ". $value2['tender_title']; ?></strong>

		<!-- <p>Contract Amt. : <?php echo number_format($value2['contract_amt'],2); ?></p> -->
		<p>Paying Entity : <?php echo $value2['org_name']; ?></p>
		<p>Awardee's Name: <?php echo $value2['awardee']; ?></p>
		<p>Date of Award : <?php echo $date; ?></p>
		<p>Date of Award : <?php echo round($val,2); ?></p>
	
     </td>

  </tr>

<?php 
$num = ($num + 1);
}

}
?>



<p class="total" hidden>
 Total Transactions: <a class='tt'><?php echo $num; ?></a> <br>
 Total Contract Amount  &#8369; <a class='tcamount'><?php echo number_format($c_amount,2); ?></a><br>
 % Variance from ABC 0.1% to 5.0% <?php echo  number_format($c_amount,2); ?><br>
</p>
  
</tbody>
</table>


 </div>  
    </div>
</div>


 








<script type="text/javascript">
    $(document).ready(function() 
    { 
        var total = $('.total').html();
        var tcamount = $('.tcamount').text();
         var tt = $('.tt').text();
        
         


        $(".disp_total").html(total);
        $(".tc_disp").html(tcamount);
        $(".tt_disp").html(tt);
      
         

 

    }); 
    





 
    
   </script>
   
