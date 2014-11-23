<?php 
include('dbcon.php'); 
$url_data = 'http://philgeps.cloudapp.net:5000';
$bid_information = '"baccd784-45a2-4c0c-82a6-61694cd68c9d"';
$award = '"539525df-fc9a-4adf-b33d-04747e95f120"';
$organization  = '"ec10e1c4-4eb3-4f29-97fe-f09ea950cdf1"';



class system_class{
	/* year list  */
	public function year_list(){
		global $url_data;
		global $bid_information;
		global $award;
		$sql = urlencode('SELECT to_char(publish_date, \'YYYY\') as year  FROM '.$bid_information.' GROUP BY year  ORDER BY year DESC');
		$query = file_get_contents(''.$url_data.'/api/action/datastore_search_sql?sql='.$sql.'');
		$query = json_decode($query, true);
		return $query['result']['records'];
		
	}
	public function year_list_asc(){
		global $url_data;
		global $bid_information;
		global $award;
		$sql = urlencode('SELECT to_char(publish_date, \'YYYY\') as year  FROM '.$bid_information.' GROUP BY year  ORDER BY year ASC');
		$query = file_get_contents(''.$url_data.'/api/action/datastore_search_sql?sql='.$sql.'');
		$query = json_decode($query, true);
		return $query['result']['records'];
	}
	public function year_count(){
		global $url_data;
		global $bid_information;
		global $award;
		$sql = urlencode('SELECT  to_char(publish_date, \'YYYY\') as year_count   FROM '.$bid_information.' GROUP BY year_count ');
		$query = file_get_contents(''.$url_data.'/api/action/datastore_search_sql?sql='.$sql.'');
		$query = json_decode($query, true);
		return count($query['result']['records']);
	}
	public function last_year(){
		global $url_data;
		global $bid_information;
		global $award;
		$sql = urlencode('SELECT to_char(publish_date, \'YYYY\') as year  FROM '.$bid_information.' GROUP BY year  ORDER BY year ASC');
		$query = file_get_contents(''.$url_data.'/api/action/datastore_search_sql?sql='.$sql.'');
		$query = json_decode($query, true);
		return $query['result']['records'][0]['year'];
		
	}
	public function first_year(){
		global $url_data;
		global $bid_information;
		global $award;
		$sql = urlencode('SELECT to_char(publish_date, \'YYYY\') as year  FROM '.$bid_information.' GROUP BY year  ORDER BY year DESC');
		$query = file_get_contents(''.$url_data.'/api/action/datastore_search_sql?sql='.$sql.'');
		$query = json_decode($query, true);
		return $query['result']['records'][0]['year'];
		
	}


	
	/* end year  */
	/* gppb library  */
	public function gppb_lib_list($page_limit){
		global $conn;
		$query = $conn->query("SELECT * FROM gppb_lib $page_limit");
		return $query->fetchAll();
	}
	public function gppb_lib_rowcount(){
		global $conn;
		$query = $conn->query("SELECT * FROM gppb_lib");
		return $query->rowcount();
	}
	public function gppb_lib_search($type,$search){
		global $conn;
		$query = $conn->query("SELECT * FROM gppb_lib WHERE issue_no = '$type' AND issuance LIKE '%$search%'");
		return $query->fetchAll();
	}
	public function search_lib_rowcount($type,$search){
		global $conn;
		$query = $conn->query("SELECT * FROM gppb_lib WHERE issue_no = '$type' AND issuance LIKE '%$search%'");
		return $query->rowcount();
	}
	/* end gppb library  */

	/* agency  */
	public function agency_list(){
		global $url_data;
		global $organization;
		$member_type = 'Buyer';
		$sql = urlencode('SELECT org_id,org_name FROM '.$organization.' WHERE member_type = '."'".$member_type."'".'  ORDER BY org_name ASC LIMIT 20 ');
		$query = file_get_contents(''.$url_data.'/api/action/datastore_search_sql?sql='.$sql.'');
		$query = json_decode($query, true);
		return $query['result']['records'];
	}
	public function selected_agency($agency_id){
		global $url_data;
		global $organization;
		$sql = urlencode('SELECT org_id,org_name FROM '.$organization.' WHERE org_id = '.$agency_id.' ');
		$query = file_get_contents(''.$url_data.'/api/action/datastore_search_sql?sql='.$sql.'');
		$query = json_decode($query, true);   
		return $query['result']['records'][0];
	}
	public function top_agency_by_abc($year,$limit){
		global $url_data;
		global $bid_information;
		global $award;
		$sql = urlencode('SELECT org_id,SUM(approved_budget) as total_abc FROM '.$bid_information.' WHERE to_char(publish_date, \'YYYY\') = '."'".$year."'".'
		GROUP BY '.$bid_information.'.org_id ORDER BY total_abc DESC LIMIT '.$limit.'');
		$query = file_get_contents(''.$url_data.'/api/action/datastore_search_sql?sql='.$sql.'');
		$query = json_decode($query, true);
		return $query['result']['records'];
	}
	public function top_agency_by_abc_test($year,$limit){
		global $url_data;
		global $bid_information;
		global $award;
		$posted = "Posted";
		$updated = "Updated";
		
		$sql = urlencode('SELECT org_id,SUM(approved_budget) as total_abc,SUM(contract_amt) as total_ca FROM '.$bid_information.'
		LEFT JOIN '.$award.' ON '.$bid_information.'.ref_id = '.$award.'.ref_id  WHERE '.$award.'.award_status in ('."'".$posted."'".' ,'."'".$updated."'".') AND to_char('.$bid_information.'.publish_date, \'YYYY\') = '."'".$year."'".'
		GROUP BY '.$bid_information.'.org_id ORDER BY total_abc DESC LIMIT '.$limit.'');
		$query = file_get_contents(''.$url_data.'/api/action/datastore_search_sql?sql='.$sql.'');
		$query = json_decode($query, true);
		return $query['result']['records'];
	}
	public function top_agency_by_abc_pop($year){
		global $url_data;
		global $bid_information;
		global $award;
		$posted = "Posted";
		$updated = "Updated";
		
		$sql = urlencode('SELECT tender_title,awardee,funding_source,org_id,approved_budget,contract_amt FROM '.$bid_information.'
		LEFT JOIN '.$award.' ON '.$bid_information.'.ref_id = '.$award.'.ref_id  WHERE approved_budget = 0 AND '.$award.'.award_status in ('."'".$posted."'".' ,'."'".$updated."'".') AND to_char('.$bid_information.'.publish_date, \'YYYY\') = '."'".$year."'".'
		ORDER BY contract_amt DESC ');
		$query = file_get_contents(''.$url_data.'/api/action/datastore_search_sql?sql='.$sql.'');
		$query = json_decode($query, true);
		return $query['result']['records'];
	}
	public function top_agency_by_abc_pop_con($year){
		global $url_data;
		global $bid_information;
		global $award;
		$posted = "Posted";
		$updated = "Updated";
		$gop = "Government of the Philippines (GOP)";
		
		$sql = urlencode('SELECT funding_source,org_id,SUM(approved_budget) AS total_abc,SUM(contract_amt) AS total_ca  FROM '.$bid_information.'
		LEFT JOIN '.$award.' ON '.$bid_information.'.ref_id = '.$award.'.ref_id  WHERE funding_source != '."'".$gop."'".' AND approved_budget = 0 AND '.$award.'.award_status in ('."'".$posted."'".' ,'."'".$updated."'".') AND to_char('.$bid_information.'.publish_date, \'YYYY\') = '."'".$year."'".'
		GROUP BY org_id,funding_source ORDER BY total_ca DESC ');
		$query = file_get_contents(''.$url_data.'/api/action/datastore_search_sql?sql='.$sql.'');
		$query = json_decode($query, true);
		return $query['result']['records'];
	}
	public function count_supplier_by_year($year){
		global $url_data;
		global $organization;
		$member_type = "Supplier";

		
		$sql = urlencode('SELECT COUNT('.$organization.'.org_id) as total_count FROM '.$organization.'
		WHERE to_char(org_reg_date, \'YYYY\')  = '."'".$year."'".' AND member_type = '."'".$member_type."'".'
		GROUP BY to_char(org_reg_date, \'YYYY\') ');
		$query = file_get_contents(''.$url_data.'/api/action/datastore_search_sql?sql='.$sql.'');
		$query = json_decode($query, true);
		return $query['result']['records'][0]['total_count']; 
		

	}
	
	public function count_buyer_by_year($year){
		global $url_data;
		global $organization;
		$member_type = "Buyer";

		$sql = urlencode('SELECT COUNT('.$organization.'.org_id) as total_count FROM '.$organization.'
		WHERE to_char(org_reg_date, \'YYYY\')  = '."'".$year."'".' AND member_type = '."'".$member_type."'".'
		GROUP BY to_char(org_reg_date, \'YYYY\') ');
		$query = file_get_contents(''.$url_data.'/api/action/datastore_search_sql?sql='.$sql.'');
		$query = json_decode($query, true);
		return $query['result']['records'][0]['total_count']; 
		
	}
	public function sum_request_by_year($year){
		global $url_data;
		global $organization;
		global $bid_information;
		global $award;
		$member_type = "Buyer";

		$sql = urlencode('SELECT SUM('.$bid_information.'.approved_budget) as total_abc,SUM('.$award.'.contract_amt) as total_ca FROM '.$bid_information.' LEFT JOIN '.$award.' ON '.$award.'.ref_id = '.$bid_information.'.ref_id
		WHERE to_char('.$bid_information.'.publish_date, \'YYYY\')  = '."'".$year."'".' AND approved_budget != 0 
		GROUP BY to_char('.$bid_information.'.publish_date, \'YYYY\') ');
		$query = file_get_contents(''.$url_data.'/api/action/datastore_search_sql?sql='.$sql.'');
		$query = json_decode($query, true);
		return $query['result']['records'][0]; 
		
	}
	
	public function all_agency_by_abc($year){
		global $conn;
		$query = $conn->query("SELECT *,sum(approved_budget) as total_abc FROM bid_information 
		LEFT JOIN organization ON organization.org_id = bid_information.org_id
		WHERE DATE_FORMAT(publish_date,'%Y') = '$year' GROUP BY bid_information.org_id ORDER BY total_abc DESC 
		");
		return $query->fetchAll();
	}
	public function top_agency_by_abc_sum($year,$limit){
	
		global $url_data;
		global $bid_information;
		global $award;
		$sql = urlencode('SELECT SUM(approved_budget) as total_abc FROM '.$bid_information.' ORDER BY total_abc DESC LIMIT '.$limit.'');
		$query = file_get_contents(''.$url_data.'/api/action/datastore_search_sql?sql='.$sql.'');
		$query = json_decode($query, true);
		return $query['result']['records'][0];
	}
	
	
	public function top_agency_by_abc_sum_test($year){
	
		global $url_data;
		global $bid_information;
		global $award;
		$sql = urlencode('SELECT SUM(approved_budget) as total_abc,SUM('.$award.'.contract_amt) AS total_ca FROM '.$bid_information.' 
		LEFT JOIN '.$award.' ON '.$award.'.ref_id = '.$bid_information.'.ref_id
		ORDER BY total_abc ');
		$query = file_get_contents(''.$url_data.'/api/action/datastore_search_sql?sql='.$sql.'');
		$query = json_decode($query, true);
		return $query['result']['records'][0];

	}
	
	public function top_agency_by_abc_row($year,$limit){
/* 		global $conn;
		$query = $conn->query("SELECT *,sum(approved_budget) as total_abc FROM bid_information 
		LEFT JOIN organization ON organization.org_id = bid_information.org_id
		WHERE DATE_FORMAT(publish_date,'%Y') = '$year' GROUP BY bid_information.org_id ORDER BY total_abc DESC  LIMIT $limit
		");
		return $query->fetch(); */
		
		
		global $url_data;
		global $bid_information;
		global $award;
		$sql = urlencode('SELECT SUM(approved_budget) as total_abc FROM '.$bid_information.' ORDER BY total_abc DESC LIMIT '.$limit.'');
		$query = file_get_contents(''.$url_data.'/api/action/datastore_search_sql?sql='.$sql.'');
		$query = json_decode($query, true);
		return $query['result']['records'][0];
		
	}
	public function selected_agency_data($year,$agency_id){
		global $url_data;
		global $bid_information;
		global $award;
		$sql = urlencode('SELECT SUM(approved_budget) as total_abc FROM '.$bid_information.' LIMIT 20');
		$query = file_get_contents(''.$url_data.'/api/action/datastore_search_sql?sql='.$sql.'');
		$query = json_decode($query, true);
		return $query['result']['records'];
		
		
/* 		$query = $conn->query("SELECT *,sum(approved_budget) as total_abc,sum(award.budget) as total_ca FROM bid_information 
		LEFT JOIN award ON award.ref_id = bid_information.ref_id
		WHERE DATE_FORMAT(bid_information.publish_date,'%Y') = '$year' AND org_id = '$agency_id' ");
		return $query->fetch(); */
	}
	public function agency_request_by_month($year,$agency_id){
/* 		global $conn;
		$query = $conn->query("SELECT * FROM bid_information 
		WHERE DATE_FORMAT(publish_date,'%c') = '$month' AND  DATE_FORMAT(publish_date,'%Y') = '$year' AND bid_information.org_id = '$agency_id' ");
		return $query->rowcount(); */
		global $url_data;
		global $bid_information;
	
		$sql = urlencode('SELECT COUNT(ref_id) as count_data FROM '.$bid_information.' WHERE  org_id = '.$agency_id.' AND to_char(publish_date,\'YYYY\') = '.$year.' ');
		$query = file_get_contents(''.$url_data.'/api/action/datastore_search_sql?sql='.$sql.'');
		$query = json_decode($query, true);
		/* return count($query); */
		return $query['result']['records'][0]['count_data'];
		
	}
	public function agency_request_total_count($year,$agency_id){
		global $conn;
		$query = $conn->query("SELECT * FROM bid_information 
		WHERE DATE_FORMAT(publish_date,'%Y') = '$year' AND bid_information.org_id = '$agency_id' ");
		return $query->rowcount();
	}
	public function agency_award_by_month($month,$year,$agency_id){
	
		global $conn;
		$query = $conn->query("SELECT * FROM bid_information
		LEFT JOIN award ON award.ref_id = bid_information.ref_id		
		WHERE  DATE_FORMAT(award_date,'%c') = '$month'
		AND  DATE_FORMAT(award_date,'%Y') = '$year' AND bid_information.org_id = '$agency_id' ");
		return $query->rowcount();
	}
	public function agency_award_total_count($year,$agency_id){
		global $conn;
		$query = $conn->query("SELECT * FROM bid_information 
		LEFT JOIN award ON award.ref_id = bid_information.ref_id
		WHERE DATE_FORMAT(award_date,'%Y') = '$year' AND bid_information.ref_id = '$agency_id' ");
		return $query->rowcount();
	}

	public function agency_abc_by_month($month,$year,$agency_id){
		global $conn;
		$query = $conn->query("SELECT *,SUM(approved_budget) as abc_total FROM bid_information 
		WHERE DATE_FORMAT(publish_date,'%c') = '$month' AND  DATE_FORMAT(publish_date,'%Y') = '$year' AND bid_information.org_id = '$agency_id' ");
		$row =  $query->fetch();
		return $row['abc_total'];
	}
	public function agency_abc_total($year,$agency_id){
		global $conn;
		$query = $conn->query("SELECT *,SUM(approved_budget) as abc_total FROM bid_information 
		WHERE DATE_FORMAT(publish_date,'%Y') = '$year' AND bid_information.org_id = '$agency_id' ");
		$row =  $query->fetch();
		return number_format($row['abc_total'],2);
	}
	
	public function agency_ca_by_month($month,$year,$agency_id){
		global $conn;
		$query = $conn->query("SELECT *,SUM(award.budget) as total_ca FROM bid_information 
		LEFT JOIN award ON award.ref_id = bid_information.ref_id
		WHERE DATE_FORMAT(award_date,'%c') = '$month' AND  DATE_FORMAT(award_date,'%Y') = '$year' AND bid_information.org_id = '$agency_id' ");
		$row =  $query->fetch();
		return $row['total_ca'];
	}
	public function agency_ca_total($year,$agency_id){
		global $conn;
		$query = $conn->query("SELECT *,SUM(award.budget) as total_ca FROM bid_information
		LEFT JOIN award ON award.ref_id = bid_information.ref_id	
		WHERE DATE_FORMAT(award_date,'%Y') = '$year' AND bid_information.org_id = '$agency_id' ");
		$row =  $query->fetch();
		return number_format($row['total_ca'],2);
	}
	public function agency_infra_projects($year,$agency_id){

		global $url_data;
		global $bid_information;
		$sql = urlencode('SELECT ref_no,ref_id '.$bid_information.' WHERE org_id = '.$agency_id.' ');
		$query = file_get_contents(''.$url_data.'/api/action/datastore_search_sql?sql='.$sql.'');
		$query = json_decode($query, true);
		return  $query['result']['records'];
	}
	/* end agency */
	/* phil_geps  */
	public function selected_bid_info($id){
		global $conn;
		$query = $conn->query("SELECT * FROM bid_information 
		LEFT JOIN award ON award.ref_id = bid_information.ref_id
		LEFT JOIN project_details ON project_details.ref_id = bid_information.ref_id
		WHERE bid_information.ref_id = '$id' ");
		return  $query->fetch();
	}
	/* end phil_geps */
	/* search reference number  */
	public function search_reference_number($search){
		global $conn;
		$query = $conn->query("SELECT * FROM phil_geps WHERE reference_number LIKE '$search' ");
		return $query->fetchAll();
	}
	/* end search  */
	/* search bid purpose  */
	public function search_title($search){
		global $conn;
		$query = $conn->query("SELECT * FROM phil_geps WHERE title LIKE '$search' ");
		return $query->fetchAll();
	}
	/* end search  */
	/* search award notice number  */
	public function search_award_notice_number($search){
		global $conn;
		$query = $conn->query("SELECT * FROM phil_geps WHERE award_notice_number LIKE '$search' ");
		return $query->fetchAll();
	}
	/* end search  */
	/* calendar */
		public function calendar_date($agency_id,$url){
		global $url_data;
		global $bid_information;
		$sql = urlencode('SELECT closing_date FROM '.$bid_information.' WHERE org_id = '.$agency_id.'');
		$query = file_get_contents(''.$url_data.'/api/action/datastore_search_sql?sql='.$sql.'');
		$query = json_decode($query, true);
		$count =  count($query['result']['records']);
			foreach($query['result']['records'] as $row){
					$originalDate = $row['closing_date'];
					$date = date("Y-m-d", strtotime($originalDate));
					$day = date("d", strtotime($originalDate));
					$array_date[] = '"'.$date.'":{"number": "" , "url":"#'.$url.'&date='.$date.'" }';
			}		
			if($count > 0){	
				echo	$date_array =  implode(',',$array_date);	
			}
	  }
	/* end calendar */
	/* bir search */
		public function search_in_bir($search){
			global $conn;
			$query = $conn->query("SELECT * FROM bir WHERE business_name LIKE '$search' ");
			return $query->fetch();
		}
	/* end bir search  */
	/* dti search */
		public function search_in_dti($search){
			global $conn;
			$query = $conn->query("SELECT * FROM dti WHERE business_name LIKE '$search' ");
			return $query->fetch();
		}
	/* end bir search  */
	/* dti search */
		public function search_in_philgeps($search){
			global $conn;
			$query = $conn->query("SELECT * FROM philgeps WHERE business_name LIKE '$search' ");
			return $query->fetch();
		}
	/* end bir search  */
	/* national */
	public function national_request_by_month($month,$year){
		global $conn;
		$query = $conn->query("SELECT * FROM bid_information 
		WHERE DATE_FORMAT(publish_date,'%c') = '$month' AND  DATE_FORMAT(publish_date,'%Y') = '$year' ");
		return $query->rowcount();
	}
	public function national_request_total_count($year){
		global $conn;
		$query = $conn->query("SELECT * FROM bid_information WHERE DATE_FORMAT(publish_date,'%Y') = '$year'");
		return $query->rowcount();
	}
	public function national_award_by_month($month,$year){
		global $conn;
		$query = $conn->query("SELECT * FROM award 
		WHERE  DATE_FORMAT(award_date,'%c') = '$month' AND  DATE_FORMAT(award_date,'%Y') = '$year'  ");
		return $query->rowcount();
	}
	public function national_award_total_count($year){
		global $conn;
		$query = $conn->query("SELECT * FROM award WHERE DATE_FORMAT(award_date,'%Y') = '$year' ");
		return $query->rowcount();
	}

	public function national_abc_by_month($month,$year){
		global $conn;
		$query = $conn->query("SELECT *,SUM(approved_budget) as abc_total FROM bid_information 
		WHERE DATE_FORMAT(publish_date,'%c') = '$month' AND  DATE_FORMAT(publish_date,'%Y') = '$year' ");
		$row =  $query->fetch();
		return $row['abc_total'];
	}
	public function national_abc_total($year){
		global $conn;
		$query = $conn->query("SELECT *,SUM(approved_budget) as abc_total FROM bid_information 
		WHERE DATE_FORMAT(publish_date,'%Y') = '$year' ");
		$row =  $query->fetch();
		return number_format($row['abc_total'],2);
	}
	
	public function national_ca_by_month($month,$year){
		global $conn;
		$query = $conn->query("SELECT *,SUM(budget) as total_ca FROM award 
		WHERE DATE_FORMAT(award_date,'%c') = '$month' AND  DATE_FORMAT(award_date,'%Y') = '$year' ");
		$row =  $query->fetch();
		return $row['total_ca'];
	}
	public function national_ca_total($year){
		global $conn;
		$query = $conn->query("SELECT *,SUM(budget) as total_ca FROM award 
		WHERE DATE_FORMAT(award_date,'%Y') = '$year'  ");
		$row =  $query->fetch();
		return number_format($row['total_ca'],2);
	}
	
	/* end national */
	/* procurement mode  */
	public function agency_type_pb($agency_type){

		global $url_data;
		global $bid_information;
		global $organization;
		$search_val = "Public Bidding";

			$sql = urlencode('SELECT COUNT('.$bid_information.'.procurement_mode) as total_count FROM '.$bid_information.'
			LEFT JOIN '.$organization.' ON '.$organization.'.org_id = '.$bid_information.'.org_id 
			WHERE procurement_mode LIKE '."'".$search_val."'".' and '.$organization.'.government_organization_type = '."'".$agency_type."'".'  GROUP BY procurement_mode   ');
			$query = file_get_contents(''.$url_data.'/api/action/datastore_search_sql?sql='.$sql.'');
			$query = json_decode($query, true);
			
	
				return  $query['result']['records'][0]['total_count'];

	}
	public function agency_type_other($agency_type){

		global $url_data;
		global $bid_information;
		global $organization;
		$search_val = "Public Bidding";

			$sql = urlencode('SELECT COUNT('.$bid_information.'.procurement_mode) as total_count FROM '.$bid_information.'
			LEFT JOIN '.$organization.' ON '.$organization.'.org_id = '.$bid_information.'.org_id 
			WHERE procurement_mode !=  '."'".$search_val."'".' and '.$organization.'.government_organization_type = '."'".$agency_type."'".'  GROUP BY procurement_mode   ');
			$query = file_get_contents(''.$url_data.'/api/action/datastore_search_sql?sql='.$sql.'');
			$query = json_decode($query, true);
	/* 		 '.$organization.'.government_organization_type = '."'".$agency_type."'".' */
			
			
			return  $query['result']['records'][0]['total_count'];
			
			
			
		
	}
 	public function pb_total_count($year){
		global $conn;
		$query = $conn->query("SELECT * FROM bid_information 
		WHERE procurement_mode LIKE 'Public Bidding' AND DATE_FORMAT(publish_date,'%Y') = '$year'");
		return $query->rowcount();
	} 

 	public function other_total_count($year){
		global $conn;
		$query = $conn->query("SELECT * FROM bid_information 
		WHERE procurement_mode NOT LIKE 'Public Bidding' AND DATE_FORMAT(publish_date,'%Y') = '$year'");
		return $query->rowcount();
	} 
	public function agency_type_abc($year,$agency_type){
		global $conn;
/* 		$query = $conn->query("SELECT *,SUM(approved_budget) as total_abc  FROM bid_information
		LEFT JOIN organization ON bid_information.org_id = organization.org_id
		WHERE government_branch = '$agency_type' AND procurement_mode LIKE 'Public Bidding' AND  DATE_FORMAT(bid_information.publish_date,'%Y') = '$year' ");
		$row = $query->fetch();
		return $row['total_abc']; */
		
		global $url_data;
		global $bid_information;
		global $organization;
		$search_val = "Public Bidding";

			$sql = urlencode('SELECT SUM('.$bid_information.'.approved_budget) as total_abc FROM '.$bid_information.'
			LEFT JOIN '.$organization.' ON '.$organization.'.org_id = '.$bid_information.'.org_id 
			WHERE  '.$organization.'.government_organization_type = '."'".$agency_type."'".'  ');
			$query = file_get_contents(''.$url_data.'/api/action/datastore_search_sql?sql='.$sql.'');
			$query = json_decode($query, true);
	/* 		 '.$organization.'.government_organization_type = '."'".$agency_type."'".' */
			
			
			return  $query['result']['records'][0]['total_abc'];
		
		
	}
	public function agency_type_abc_total($year){
		global $conn;
		$query = $conn->query("SELECT *,SUM(approved_budget) as total_abc  FROM bid_information LEFT JOIN organization ON organization.org_id = bid_information.org_id
		WHERE  procurement_mode LIKE 'Public Bidding' AND  DATE_FORMAT(publish_date,'%Y') = '$year' ");
		$row = $query->fetch();
		return $row['total_abc'];
	}
	public function agency_type_ca($year,$agency_type){

		global $url_data;
		global $bid_information;
		global $organization;
		global $award;
		$search_val = "Public Bidding";
		$others = "Others";

			$sql = urlencode('SELECT SUM('.$award.'.contract_amt) as total_ca FROM '.$bid_information.'
			LEFT JOIN '.$award.' ON '.$award.'.ref_id = '.$bid_information.'.ref_id 
			LEFT JOIN '.$organization.' ON '.$organization.'.org_id = '.$bid_information.'.org_id 
			WHERE '.$organization.'.government_organization_type = '."'".$agency_type."'".'   ');
			$query = file_get_contents(''.$url_data.'/api/action/datastore_search_sql?sql='.$sql.'');
			$query = json_decode($query, true);
	/* 		 '.$organization.'.government_organization_type = '."'".$agency_type."'".' */
			
			
			return  $query['result']['records'][0]['total_ca'];
		
	
	
	}
	public function agency_type_ca_total($year){
		global $conn;
		$query = $conn->query("SELECT *,SUM(award.budget) as total_ca  FROM bid_information
		LEFT JOIN award ON award.ref_id = bid_information.ref_id
		WHERE procurement_mode NOT LIKE 'Public Bidding' AND  DATE_FORMAT(bid_information.publish_date,'%Y') = '$year' ");
		$row = $query->fetch();
		return $row['total_ca'];
	}
	/* end procurement mode */
	
	/* agency_type */
	public function agency_type_list(){
/* 		global $conn;
		$query = $conn->query("SELECT * FROM organization WHERE member_type LIKE 'Government Agency' GROUP BY government_branch ");
		return $query->fetchAll(); */
		
		global $url_data;
		global $organization;
		
		$sql = urlencode('SELECT government_organization_type  FROM '.$organization.'  GROUP BY government_organization_type ');
		$query = file_get_contents(''.$url_data.'/api/action/datastore_search_sql?sql='.$sql.'');
		$query = json_decode($query, true);
		return $query['result']['records'];

		
	} 	
	/* end agency type */
	/* project_type */
	public function project_type_list(){
		global $conn;
		$query = $conn->query("SELECT * FROM project_type");
		return $query->fetchAll();
	} 	
	/* end project_type  */
	/* agency procurement */
	public function agency_procurement($agency_id,$year,$type){
		global $conn;
/* 		$query = $conn->query("SELECT * FROM bid_information
		LEFT JOIN award ON award.ref_id = bid_information.ref_id
		WHERE awardee = '' AND  DATE_FORMAT(bid_information.publish_date,'%Y') = '$year' AND  org_id = '$agency_id' AND classification = '$type'
		ORDER BY bid_information.approved_budget DESC 
		");
		return $query->fetchAll(); */

		global $url_data;
		global $bid_information;
		global $award;
		$posted = "Posted";
		$updated = "Updated";

		$sql = urlencode('SELECT ref_no,contract_amt,approved_budget,tender_title,closing_date FROM '.$bid_information.' LEFT JOIN '.$award.' ON '.$award.'.ref_id = '.$bid_information.'.ref_id WHERE org_id = '."'".$agency_id."'".' AND classification  = '."'".$type."'".' AND to_char('.$bid_information.'.publish_date,\'YYYY\') = '."'".$year."'".' AND '.$award.'.award_status in ('."'".$posted."'".' ,'."'".$updated."'".') ');
		$query = file_get_contents(''.$url_data.'/api/action/datastore_search_sql?sql='.$sql.'');
		$query = json_decode($query, true);
		
		return $query['result']['records'];		

		
		
	} 
	
	public function agency_procurement_total($agency_id,$year,$type){

		global $url_data;
		global $bid_information;
		global $award;
		$posted = "Posted";
		$updated = "Updated";

		$sql = urlencode('SELECT SUM('.$bid_information.'.approved_budget) as total_abc,SUM('.$award.'.contract_amt) as total_ca FROM '.$bid_information.' LEFT JOIN '.$award.' ON '.$award.'.ref_id = '.$bid_information.'.ref_id WHERE org_id = '."'".$agency_id."'".' AND classification  = '."'".$type."'".' AND to_char('.$bid_information.'.publish_date,\'YYYY\') = '."'".$year."'".' AND '.$award.'.award_status in ('."'".$posted."'".' ,'."'".$updated."'".') ');
		$query = file_get_contents(''.$url_data.'/api/action/datastore_search_sql?sql='.$sql.'');
		$query = json_decode($query, true);
		
		return $query['result']['records'][0];
		
		

		
	} 
	
	public function agency_procurement_total_all($agency_id,$year){
		global $conn;
		$query = $conn->query("SELECT *,SUM(approved_budget) as total_abc , SUM(award.budget) as total_ca FROM bid_information
		LEFT JOIN award ON award.ref_id = bid_information.ref_id
		WHERE award.awardee = '' AND DATE_FORMAT(bid_information.publish_date,'%Y') = '$year' AND  org_id = '$agency_id' 
		");
		return $query->fetch();
	} 
	
	
	public function agency_procurement_award($agency_id,$year,$type){
		global $conn;
/* 		$query = $conn->query("SELECT * FROM bid_information
		LEFT JOIN award ON award.ref_id = bid_information.ref_id
		WHERE awardee != '' AND  DATE_FORMAT(bid_information.publish_date,'%Y') = '$year' AND  org_id = '$agency_id' AND classification = '$type'
		ORDER BY award.budget DESC 
		");
		return $query->fetchAll(); */
		
		global $url_data;
		global $bid_information;
		global $award;
		$posted = "Posted";
		$updated = "Updated";

		$sql = urlencode('SELECT contract_enddate,award_date,awardee,ref_no,contract_amt,approved_budget,tender_title,closing_date  FROM '.$bid_information.' LEFT JOIN '.$award.' ON '.$award.'.ref_id = '.$bid_information.'.ref_id WHERE org_id = '."'".$agency_id."'".' AND classification  = '."'".$type."'".' AND to_char('.$bid_information.'.publish_date,\'YYYY\') = '."'".$year."'".' AND '.$award.'.award_status in ('."'".$posted."'".' ,'."'".$updated."'".') ');
		$query = file_get_contents(''.$url_data.'/api/action/datastore_search_sql?sql='.$sql.'');
		$query = json_decode($query, true);
		
		return $query['result']['records'];
		
		
	} 
	public function agency_procurement_total_award($agency_id,$year,$type){
		global $conn;
/* 		$query = $conn->query("SELECT *,SUM(award.budget) as total_abc FROM bid_information
		LEFT JOIN award ON award.ref_id = bid_information.ref_id
		WHERE DATE_FORMAT(bid_information.publish_date,'%Y') = '$year' AND  bid_information.org_id = '$agency_id' AND classification LIKE '$type'
		");
		$row = $query->fetch();
		return $row['total_abc']; */
		
		
		global $url_data;
		global $award;

		
		$sql = urlencode('SELECT SUM('.$award.'.budget) as total_abc FROM '.$award.'');
		$query = file_get_contents(''.$url_data.'/api/action/datastore_search_sql?sql='.$sql.'');
		$query = json_decode($query, true);
		
		return $query['result']['records'][0]['total_abc'];
		
	} 
	public function agency_procurement_total_all_award($agency_id,$year){
		global $conn;
		$query = $conn->query("SELECT *,SUM(approved_budget) as total_abc , SUM(award.budget) as total_ca FROM bid_information
		LEFT JOIN award ON award.ref_id = bid_information.ref_id
		WHERE award.awardee != '' AND DATE_FORMAT(bid_information.publish_date,'%Y') = '$year' AND  org_id = '$agency_id' 
		");
		return $query->fetch();
	}
	/* end agency procurement */
	
	/* classification_list */
	public function classification_list(){
/* 		global $conn;
		$query = $conn->query("SELECT classification FROM bid_information GROUP BY classification");
		return $query->fetchAll();
		 */
		global $url_data;
		global $bid_information;
		
		$sql = urlencode('SELECT classification FROM '.$bid_information.' GROUP BY classification ');
		$query = file_get_contents(''.$url_data.'/api/action/datastore_search_sql?sql='.$sql.'');
		$query = json_decode($query, true);
		return $query['result']['records']; 
		
	}
	/* end classification  */
}
$system = new system_class();
?>