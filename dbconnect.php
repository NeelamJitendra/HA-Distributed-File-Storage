<?php

	// this will avoid mysql_connect() deprecation error.
	error_reporting( ~E_DEPRECATED & ~E_NOTICE );
	// but I strongly suggest you to use PDO or MySQLi.
if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') {
            // this is HTTPS
            $protocol  = "https";
        } else {
            // this is HTTP
            $protocol  = "http";
        }
if($_SERVER['HTTP_HOST']=='localhost:8080'){
$site_url=$protocol."://".$_SERVER['HTTP_HOST']."/new_work/";
$url=$protocol."://".$_SERVER['HTTP_HOST']."/new_work/";
$upload_path=$protocol."://".$_SERVER['HTTP_HOST']."/new_work/uploads/";
$base_path='uploads';

    define('DBHOST', 'localhost');
	define('DBUSER', 'root');
	define('DBPASS', '');
	define('DBNAME', 'dbtest');
}
else{
$site_url=$protocol."://".$_SERVER['HTTP_HOST']."/";
$url=$protocol."://".$_SERVER['HTTP_HOST']."/";
$upload_path=$protocol."://".$_SERVER['HTTP_HOST']."/uploads";
    define('DBHOST', 'localhost');
	define('DBUSER', 'root');
	define('DBPASS', '');
	define('DBNAME', 'dbtest');
}	
		
	$conn = mysql_connect(DBHOST,DBUSER,DBPASS);
	$dbcon = mysql_select_db(DBNAME);
	
	if ( !$conn ) {
		die("Connection failed : " . mysql_error());
	}
	
	if ( !$dbcon ) {
		die("Database Connection failed : " . mysql_error());
	}

function file_count($dir, $pattern = "*",&$counter) {
        // find all files and folders matching pattern
         $files = glob($dir . "/$pattern"); 
		
        //interate thorugh the files and folders
        foreach($files as $file){ 
		   
            //if it is a directory then re-call unlinkr function to delete files inside this directory     
            if (is_dir($file) and !in_array($file, array('..', '.')))  {
			    $counter=$counter+1;
                file_count($file, $pattern,$counter);
			
                //remove the directory itself
               // rmdir($file);
                } else if(is_file($file) and ($file != __FILE__)) {
				
                // make sure you don't delete the current script
                $counter=$counter+1;
            }
        }
       
 }
 
 
function get_value($table='',$field='',$cond=''){
  $sqlQuery="select * from $table $cond";
  $rsQuery=mysql_query($sqlQuery) or die($sqlQuery.' '.mysql_error());
  if(mysql_num_rows($rsQuery)>0){
   $rows=mysql_fetch_assoc($rsQuery);
   return $rows[$field];
  }
  else{
     return null;
  }

}

function get_table_row($table='',$field='',$cond=''){
  $sqlQuery="select * from $table $cond";
  $rsQuery=mysql_query($sqlQuery) or die($sqlQuery.' '.mysql_error());
  if(mysql_num_rows($rsQuery)>0){
   $rows=mysql_fetch_assoc($rsQuery);
   return $rows;
  }
  else{
     return null;
  }

}

function count_rows($table='',$field='',$cond=''){
  $sqlQuery="select * from $table $cond";
  $rsQuery=mysql_query($sqlQuery) or die($sqlQuery.' '.mysql_error());
  if(mysql_num_rows($rsQuery)>0){
   
   return mysql_num_rows($rsQuery);
  }
  else{
     return null;
  }

}

function get_sum_of_field($table='',$field='',$cond=''){
  if($field!=''){
		  $sqlQuery="select SUM($field) from $table $cond";
		  $rsQuery=mysql_query($sqlQuery) or die($sqlQuery.' '.mysql_error());
		  if(mysql_num_rows($rsQuery)>0){
		   $rows=mysql_fetch_assoc($rsQuery);
		   $sum=$rows["SUM($field)"];
		   return $sum;
		  }
		  else{
			 return null;
		  }
  }
  else{
     return 0;
  }
}