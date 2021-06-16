<?php
  require "config.php";     
  $conn = getdb();

  // update availability status 
  if(isset($_POST['curr_status'])){
     $id = $_POST['id'];
     $curr_status = $_POST['curr_status'];
     $resource = $_POST['resource'];
     $state = $_POST['state'];
     date_default_timezone_set('Asia/Kolkata');
     $created_at = date("Y-m-d H:i:s");

     if(!empty($curr_status)){
         if($resource == 'beds'){
            $sql = "Update beds set status = '".$curr_status."' , created_at = '".$created_at."' where id = '".$id."'";
         }
         if($resource == 'oxygen'){
            $sql = "Update oxygen set status = '".$curr_status."' , created_at = '".$created_at."' where id = '".$id."'";
         }

          if (mysqli_query($conn, $sql)) {
            //echo "Record updated successfully";
            } else {
            echo "Error updating record: " . mysqli_error($conn);
            }
     }

    
      
      if($resource == 'beds'){
         echo "<script type=\"text/javascript\">
         alert(\"Lead has been successfully Uploaded.\");
         window.location = \"../beds/bed.php?state='$state'\"
        </script>";
      }
      if($resource == 'oxygen'){
         echo "<script type=\"text/javascript\">
         alert(\"Lead has been successfully Uploaded.\");
         window.location = \"../oxygen/oxygen.php?state='$state'\"
        </script>";
      }

      mysqli_close($conn);
  }

?>

           