	<?php include('header.php'); ?>
  <body>

		<div class="container">
					<div class="row">
						<div class="col-lg-12">
							



<?php


$organization = '"ec10e1c4-4eb3-4f29-97fe-f09ea950cdf1"';
$bid_info = '"baccd784-45a2-4c0c-82a6-61694cd68c9d"';
$award = '"539525df-fc9a-4adf-b33d-04747e95f120"';
$bid_list = '"6427affb-e841-45b8-b0dc-ed267498724a"';

 
 ?>




<div class="panel panel-danger">
    <div class="panel-heading"> Business Competition Survey</div>
    <div class="panel-body">

 
 <form method="get">
    <select name="search">


<?php
 

$sql = urlencode('SELECT business_category FROM ' . $bid_info . ' GROUP BY business_category');  

$json_string = file_get_contents("http://philgeps.cloudapp.net:5000/api/action/datastore_search_sql?sql=" . $sql);
$json = json_decode($json_string, true);
$json = $json ['result']['records'];
   
foreach ($json as $key => $value) {

   $categ = $value['business_category'];
   echo "<option>$categ</option>";

}
?> 
</select>
    <button class="btn btn-primary">Search</button>
</form>
 
 
<div class="table_div">
    <table class="table table-bordered table-condensed">

<thead>
    <tr style="font-size:15px">
        <th> #</th>
        <th>Business Competitors</th>
         <th>Business Category</th>
 
    </tr>
</thead>
<tbody>

<?php
// error_reporting(0);





if (isset($_GET['search'])) {
     $search = $_GET['search'];
}else{
     $search = '%';
}


 
 

$sql2 = urlencode('SELECT '.$bid_info.'.ref_id,awardee,award_date ,tender_title,org_id,contract_amt,business_category FROM ' . $bid_info . '  
 INNER JOIN  ' . $award . ' ON (' . $award . '.ref_id = '  . $bid_info . ".ref_id )  WHERE business_category LIKE '%$search%'  ORDER BY award_date LIMIT 100");  

$json_string2 = file_get_contents("http://philgeps.cloudapp.net:5000/api/action/datastore_search_sql?sql=" . $sql2);
$json2 = json_decode($json_string2, true);
$json2 = $json2 ['result']['records'];
   $num = 1; 
foreach ($json2 as $key2 => $value2) {

   $date = $value2['award_date'];
$dt = new DateTime($date);

$date = $dt->format('M-d-Y');
 
 

   echo "<tr>";
    echo "<td style='text-align:center'>$num</td>";
    echo "<td><strong> ".$value2['awardee']."</td>";
         echo "<td style='text-align:right;padding-right:6px;'>".$value2['business_category']." </td>";
   
    echo "</tr>";


$num = ($num + 1);
 

}
 
 
 

 
 
?>

 
</tbody>
</table>
</div>

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
   

							
							
							
							
							
						</div>
					</div>
		</div>
  </body>
<?php include('script.php'); ?>  
</html>





