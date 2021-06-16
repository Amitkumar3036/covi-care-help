<?php

// include database connection file
include "../database/config.php";

// establish connection
$conn = getdb();

//read excel file through simple xlsx library and insert in database 
 if(isset($_POST["Import"])){
	 if(isset($_FILES['uploadfile']['name'])){
		$resource = $_POST['resource'];
		$filename=$_FILES['uploadfile']['tmp_name'];	
		
		include "xlsx.php";
		if ( $excel = SimpleXLSX::parse($filename) ) {		
			$excel_rows = $excel->rows();
			
			unset($excel_rows[0]);
			foreach($excel_rows as $rows){
				$name = $rows[0]; 
				$contact1 = $rows[1]; 
				$contact2 = $rows[2];				
				$status = $rows[3]; 
				$state = $rows[4]; 
				$location = $rows[5]; 
				
				date_default_timezone_set('Asia/Kolkata');
				$created_at = date("Y-m-d H:i:s");	 		
                
				if($resource == 'beds'){
					$sql = "insert into beds(name,contact1,contact2,status,state,location,created_at) 
					values ('$name','$contact1','$contact2','$status','$state','$location','$created_at')";		 			
				}

				if($resource == 'oxygen'){
					$sql = "insert into oxygen(name,contact1,contact2,status,state,location,created_at) 
					values ('$name','$contact1','$contact2','$status','$state','$location','$created_at')";		 			
				}

		 		mysqli_query($conn,$sql);

			 	echo "<script type=\"text/javascript\">
			 	 alert(\"CSV File has been successfully Imported.\");
			 	 window.location = \"excelupload.php\"
			    </script>";
			}
		} else {
			echo SimpleXLSX::parseError();
		}
	 }
	   
	
 }	
 ?>