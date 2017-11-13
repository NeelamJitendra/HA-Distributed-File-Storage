<?php
	ob_start();
	session_start();
	require_once 'dbconnect.php';
	
	// if session is not set this will redirect to login page
	if( !isset($_SESSION['user']) ) {
		header("Location: index.php");
		exit;
	}
	// select loggedin users detail
	$res=mysql_query("SELECT * FROM users WHERE userId=".$_SESSION['user']);
	$userRow=mysql_fetch_array($res);
	$userId=$userRow['userId'];
include_once 'dbconnect.php';
if(isset($_POST['btn-upload']))
{    
     
	$file = rand(1000,100000)."-".$_FILES['file']['name'];
    $file_loc = $_FILES['file']['tmp_name'];
	$file_size = $_FILES['file']['size'];
	$file_type = $_FILES['file']['type'];
	$dir_id=$_POST['dir_name'];
	  if($dir_id>0){
	  $sqlQuery="select * from tbl_directory where dir_status='1' and dir_userId='$userId' and dir_id='$dir_id' ORDER BY dir_name ASC";
	  }
	  else{
	   $sqlQuery="select * from tbl_directory where dir_status='1' and dir_userId='$userId' and dir_name='".$userRow['userFoldername']."' ORDER BY dir_name ASC";
	  }
	  $rsQuery=mysql_query($sqlQuery) or die($sqlQuery.' '.mysql_error());
	  if(mysql_num_rows($rsQuery)>0){
	    $results=mysql_fetch_assoc($rsQuery);
		$dir_id=$results['dir_id'];
		$dir_size=$results['dir_size'];
		if(strtolower($results['dir_name'])==$userRow['userFoldername'])
		 $folder="uploads/".$userRow['userFoldername'].'/';
		 else
		$folder="uploads/".$userRow['userFoldername'].'/'.strtolower($results['dir_name']).'/';
		
		//$total_size=get_sum_of_field($table='tbl_uploads',$field='size',$cond="where userId='$userId' and file_dir_id='$dir_id'");
	  }
	  else if($userRow['userFoldername']!=''){	  
	   $folder="uploads/".$userRow['userFoldername'].'/';
	   
	  }
	
   // $size_in_MB= 1024*$dir_size;
 

	
	
	// new file size in KB
	$new_size = $file_size/1024;  
	//$all_size = $new_size+$total_size;
	
	// new file size in KB
	/*if($all_size>$size_in_MB){
	}*/
	
	// make file name in lower case
	$new_file_name = strtolower($file);
	// make file name in lower case
	
	$final_file=str_replace(' ','-',$new_file_name);
	$userId=$_SESSION['user'];
	
	
	if(move_uploaded_file($file_loc,$folder.$final_file))
	{
		$sql="INSERT INTO tbl_uploads(file,type,size,userId,file_status,file_dir_id) VALUES('$final_file','$file_type','$new_size','$userId','1','$dir_id')";
		
		
		mysql_query($sql);
		?>
		<script>
		alert('successfully uploaded');
        window.location.href='home.php?success';
        </script>
		<?php
	}
	else
	{
		?>
		<script>
		alert('error while uploading file');
        window.location.href='home.php?fail';
        </script>
		<?php
	}
  
}
?>