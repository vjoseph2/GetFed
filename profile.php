<?php
require("includes/connect.php");
include("header.php");
$fid = $_SESSION['fid'];
?>
<h1> View & Edit Your Profile </h1>
<div class='row'>
	<div class='col-sm-4'>
	<img src="<?php echo $_SESSION['profImage'] ?>" class='profileImg'>
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
       
	   <form class="form profileImage" action="change_img.php" method="POST"> 
	 Old Image:<span type="text" class="form-control"><?php echo $_SESSION['profImage'];?></span>
	 New Image:
	   <input type="text" name="nimg" class="form-control">
	   <input type="hidden" name="fid" value='<?php echo $fid?>'>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-warning" ><!--Test</button>-->
      </div>
	  </form>
    </div>
  </div>
</div>
