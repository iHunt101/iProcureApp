<?php 
	include('dbcon.php');
	include('class.php');
	$action = $_POST['action'];
	
	if($action == 'road'){
			$project_type = $_POST['project_type'];
			$ref_id = $_POST['ref_id'];
			$length = $_POST['length'];
			$width = $_POST['width'];
			$finish = $_POST['finish'];
			$pavement_thickness = $_POST['pavement_thickness'];
			$cost_km = $_POST['cost_km'];
			$status = $_POST['status'];
			$performance_rating = $_POST['performance_rating'];
			$target_due_date = $_POST['target_due_date'];
			$extension_date = $_POST['extension_date'];
			$actual_due_date = $_POST['actual_due_date'];
			$slippage = $_POST['slippage'];
			
			$query  = $conn->query("SELECT * FROM project_details WHERE ref_id = '$ref_id' ");
			$count = $query->rowcount();
			
			if($count > 0){
				$query = $conn->prepare("UPDATE project_details SET length = ? , width = ? , finish = ? ,
				pavement_thickness = ? , cost_km = ? ,status = ? , performance_rating = ? , target_due_date = ? , extension_date = ? ,
				actual_due_date = ? , slippage = ? , project_type = ?
				WHERE ref_id = ? ");
				$query->execute(array($length,$width,$finish,$pavement_thickness,$cost_km,$status,
				$performance_rating,$target_due_date,$extension_date,$actual_due_date,$slippage,$project_type,
				$ref_id));		
			}else{
				$query = $conn->prepare("INSERT INTO project_details (ref_id,length,width,
				finish,pavement_thickness,cost_km,status,performance_rating,target_due_date,actual_due_date,slippage,project_type) VALUES(?,?,?,?,?,?,?,?,?,?,?,?) ");
				$query->execute(array($ref_id,$length,$width,$finish,$pavement_thickness,$cost_km,$status,$performance_rating,$target_due_date,$actual_due_date,$slippage,$project_type));
				
			}
			
	}else if($action == 'building'){
	
			$project_type = $_POST['project_type'];
			$ref_id = $_POST['ref_id'];
			$finish = $_POST['finish'];
			$status = $_POST['status'];
			$performance_rating = $_POST['performance_rating'];
			$target_due_date = $_POST['target_due_date'];
			$extension_date = $_POST['extension_date'];
			$actual_due_date = $_POST['actual_due_date'];
			$slippage = $_POST['slippage'];
			$no_of_storey = $_POST['no_of_storey'];
			$floor_area = $_POST['floor_area'];
			$type_of_foundation = $_POST['type_of_foundation'];
			$cost_per_sq_m = $_POST['cost_per_sq_m'];
			
			$query  = $conn->query("SELECT * FROM project_details WHERE ref_id = '$ref_id' ");
			$count = $query->rowcount();
			
			if($count > 0){
				$query = $conn->prepare("UPDATE project_details SET 
				finish = ? ,  status = ? , performance_rating = ? ,
				target_due_date = ? , extension_date = ? , actual_due_date = ? ,
				slippage = ? , no_of_storey = ? , floor_area = ? , 
				type_of_foundation = ? , cost_per_sq_m = ? , project_type = ? 
				WHERE ref_id = ? ");
				$query->execute(array($finish,$status,$performance_rating,$target_due_date,$extension_date,$actual_due_date
				,$slippage,$no_of_storey,$floor_area,$type_of_foundation,$cost_per_sq_m,$project_type,$ref_id));		
			}else{
				$query = $conn->prepare("INSERT INTO project_details (finish,status,performance_rating,target_due_date,extension_date,actual_due_date,
				slippage,no_of_storey,floor_area,type_of_foundation,cost_per_sq_m,project_type,ref_id) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?) ");
				$query->execute(array($finish,$status,$performance_rating,$target_due_date,$extension_date,$actual_due_date
				,$slippage,$no_of_storey,$floor_area,$type_of_foundation,$cost_per_sq_m,$project_type,$ref_id));
				
			}
	
	
	}else if($action == 'bridge'){
		
			$project_type = $_POST['project_type'];
			$ref_id = $_POST['ref_id'];
			$type = $_POST['type'];
			$length = $_POST['length'];
			$finish = $_POST['finish'];
			$width = $_POST['width'];
			$model = $_POST['model'];
			$cost_per_meter = $_POST['cost_per_meter'];
			$status = $_POST['status'];
			$performance_rating = $_POST['performance_rating'];
			$target_due_date = $_POST['target_due_date'];
			$extension_date = $_POST['extension_date'];
			$actual_due_date = $_POST['actual_due_date'];
			$slippage = $_POST['slippage'];

			
			$query  = $conn->query("SELECT * FROM project_details WHERE ref_id = '$ref_id' ");
			$count = $query->rowcount();
			
			if($count > 0){
				$query = $conn->prepare("UPDATE project_details SET  project_type = ?  , type = ? , length = ? , finish = ? ,
				width = ? , model = ? , cost_per_meter = ? , status = ? , performance_rating = ? ,
				target_due_date = ? ,extension_date = ? ,actual_due_date = ? ,slippage = ?
				WHERE ref_id = ? ");
				$query->execute(array($project_type,$type,$length,$finish,
				$width,$model,$cost_per_meter,$status,$performance_rating,
				$target_due_date,$extension_date,$actual_due_date,$slippage,
				$ref_id));		
			}else{
				$query = $conn->prepare("INSERT INTO project_details
				(ref_id,project_type,type,length,finish,width,model,cost_per_meter,status,performance_rating,target_due_date,extension_date,actual_due_date,slippage) 
				VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?) ");
				$query->execute(array($ref_id,$project_type,$type,$length,$finish,$width,$model,$cost_per_meter,$status,$performance_rating,$target_due_date,$extension_date,$actual_due_date,$slippage));
				
			}
		
	
		
	}
?>
