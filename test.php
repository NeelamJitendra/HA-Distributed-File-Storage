<?php
include_once('include/header.php');
	//insert into database
	if($_SERVER['REQUEST_METHOD']=='POST')	
	{    
		$file=$_POST['file'];
		$sender=$_POST['sender'];
		
			if(!empty($file)&&!empty($sender))
			{
				
				$SQL ="INSERT INTO can_view(sender,reciver,file_id) VALUES ('$userId','$sender','$file')";
					mysql_real_escape_string($SQL);
					$result = mysql_query($SQL) or die (mysql_error());
				
			}

while ($row = mysql_fetch_array($result)){
?>
   <option  value=" <?php  echo $row['userId']; ?> ">
     <?php echo $row['userName']; ?>
    </option>
<?php
}
?>        
</select>
 <br>
 <br>
 <?php
  $query = "SELECT * from tbl_uploads where userId=$userId";
$result = mysql_query($query) or die(mysql_error()."[".$query."]");?>

    <select  name="file" >
<?php while ($row = mysql_fetch_array($result)){
?>
   <option value=" <?php  echo $row['id']; ?> ">
     <?php echo $row['file'] ; ?>
    </option>
<?php
}
?>        
</select>
<br>
<br>
  <input type="submit" value="submit" >
</form>
<?php
}
?>
</body>

