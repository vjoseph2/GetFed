<?php
require("includes/connect.php");
include("header.php");
$fid = $_SESSION['fid'];
$profileSrc=$_SESSION['profImage'];
?>
<h1> View & Edit Your Profile </h1>
<div class='row'>
	<div class='col-sm-4'>
	<img src="<?php echo $profileSrc; ?>" class='profileImg'>
	<button data-toggle="modal" data-target="#img-modal" class='form-control btn btn-primary'>
	Click Here to Change Your Profile Image
	<span class='glyphicon glyphicon-picture'></span>
	</button>
	</div>
	<div class='col-sm-8'>
		<table class="table table-striped">
			<tr><th colspan='2'><center>Basic Information</center></th></tr>
			<tr><td>Name: </td><td><?php echo $_SESSION['firstname']." ".$_SESSION['lastname'];?></td></tr>
			<tr><td>Best Way to Contact: </td><td><b><?php echo $_SESSION['prefmethod']; ?></b></td></tr>
			<tr><td>Username</td><td> <?php echo $_SESSION['user']; ?></td></tr>
			<tr><td>Password</td><td>*******</td></tr>
		</table>
	<center><a href="#"><small>Advanced Settings <span class='glyphicon glyphicon-cog'></span></small></a></center>
	</div>
</div>
<div class="modal fade" id="img-modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Change Profile Image</h4>
      </div>
      <div class="modal-body">
       <?php

	
$files1 = scandir($path);
//$checkPath = empty(scandir($path));
//echo $checkPath;
/*if ($checkPath==1){
	$files1 = scandir($path);
}else{
	$files1 = NULL;
}*/
if (empty($files1)){
	echo "<h3>You Currently Have No Images Available<br><small>Add some?</small></h3>";
}else{
	echo "<h3>Images Currently Available:</h3> <ul class='imgGrid'>";
	foreach ($files1 as $value) {
		$fullPath=$path.$value;
		if ($value=="." || $value==".."){
			
		}else{
		$imgPreview= "<li class='imgGridblocks'><img src='$fullPath' class='icon-preview'>";
		echo "$imgPreview $value </li>";
		}
	}
	echo "</ul>";
	
}
//print_r($files1);

?>
	   <form class="form profileImage" action="upload.php" method="POST" enctype="multipart/form-data"> 
	   <input type='hidden' name='customFile' value='<?php echo $_SESSION['firstname']."_".$_SESSION['lastname']."_".$fid; ?>'>
	 Old Image:
	 <span type="text" class="form-control"><?php echo $_SESSION['profImage'];?></span>
	  Upload an Image:
	   <input type="file" name="fileToUpload" id="fileToUpload" >
	   <input type="hidden" name="fid" value='<?php echo $fid?>'>
	   <input type="submit"  value='Upload an Image' class="btn btn-warning" >
	   </form>
	   <hr>
	 <form class="form" action="change_img.php" method="POST">
	 Choose an Image: 
	 <select class="form-control" type="text" name="chooseImg">
		<?php
			foreach ($files1 as $value) {
					$fullPath=$path.$value;
					if ($value=="." || $value==".."){
						
					}else{
					$imgPreview= "<option value='$path$value'> <img src='$fullPath' class='icon-preview'>";
					echo "$imgPreview $value</option>";
					}
				}			
		?>
	 </select>
	<input type="hidden" name="fid" value='<?php echo $fid?>'>
      </div>
      <div class="modal-footer">
	  <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      <input type="submit"  value='Update Profile Image' class="btn btn-success" >
        <!--Test</button>-->
      </div>
	 </form>
    </div>
  </div>
</div>
