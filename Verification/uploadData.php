<?php

// include database connection file
include "../database/config.php";

	// establish connection
	$conn = getdb();

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
	
		// collect value of input field
		$name = $_REQUEST['name'];		
		$contact1 = $_REQUEST['contact1'];
		$contact2 = $_REQUEST['contact2'] ?? "";		
		$state = $_REQUEST['state'];
		$location = $_REQUEST['area'];
		$status = $_REQUEST['availability'];
		$resource = $_REQUEST['resource'];
	
		date_default_timezone_set('Asia/Kolkata');
		$created_at = date("Y-m-d H:i:s");
		

		if( $resource == 'bed'){
			$sql = "insert into beds(name,contact1,contact2,status,state,location,created_at) 
			values ('$name','$contact1','$contact2','$status','$state','$location','$created_at')";	 			
		}
		
		if( $resource == 'oxygen'){			
			$sql = "insert into oxygen(name,contact1,contact2,status,state,location,created_at) 
			values ('$name','$contact1','$contact2','$status','$state','$location','$created_at')";	 			
		}
		mysqli_query($conn,$sql);
		echo "<script type=\"text/javascript\">
		 	 	 alert(\"Lead has been successfully Uploaded.\");
			 	 window.location = \"index.html\"
			    </script>";
	}

	// Closing the connection.
	$conn->close();
  
 ?>