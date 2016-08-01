<?php
require('includes/connect.php');
include('header.php');
$fid=$_SESSION['fid'];
$whereDoYouLive = "SELECT f.fid AS ID, f.fname AS first_name, f.lname AS last_name, h.house_address AS house, h.hid AS hid, h.share_choice AS public FROM houses h INNER JOIN friends f ON f.fid=h.fid WHERE f.fid='$fid'";
$result = $conn->query($whereDoYouLive);
if ($result->num_rows > 0) {
?>
<h1> Manage Residences </h1>
<small> Edit your place of residence or add new prefered dining locations </small>
<table class="table table-striped">
<tr>
<th>ID</th>
<th>First Name</th>
<th>Last Name</th>
<th>Address</th>
<th>Publically Sharable</th>
<th>Remove</th>
<th>Edit</th>
</tr>
<?php
    while($row = $result->fetch_assoc()) {
		?>
		<tr>
			<form action='removeResidence.php' method='POST'>
			<td><?php echo $row['ID'];?></td>
			<td><?php echo $row['first_name'];?></td>
			<td><?php echo $row['last_name'];?></td>
			<td><?php echo $row['house'];?>
				<input type='hidden' name="house" value='<?php echo trim($row['house']);?>'></td>
			<td><?php echo $row['public'];?></td>
				<td>
					<input type='hidden' value='<?php echo $fid ?>' name='fid'>
					<button type='submit' class="btn btn-danger">
						<span class="glyphicon glyphicon-trash"></span>
					</button>
					</form>
				</td>
			<td>
				<button class="btn btn-warning" data-toggle="modal" data-target="#<?php echo "modify".$row['hid']; ?>">
					<span class="glyphicon glyphicon-pencil"></span>
				</button>
				<?php 
				echo "<div class='modal fade' id='modify".$row['hid']."'>
						  <div class='modal-dialog'>
							<div class='modal-content'>
							  <div class='modal-header'>
								<button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
								<h4 class='modal-title'>Modify a Residence</h4>
							  </div>
							  <form class='form' action='modifyResidence.php' method='POST'>
							  <div class='modal-body'>
							  <input type='hidden' name='hid' value=".$row['hid'].">
							  <input type='hidden' name='fid' value=".$fid.">
							  <h5>Address:</h5>
								<input type='text' class='form-control' name='newName' value='".trim($row['house'])."'>
						 
							  <h5>Public to Others?:</h5>
									<input type='checkbox' class='form-control' name='publiCheckbox'>
									 </div>	
							  <div class='modal-footer'>
								<button type='button' class='btn btn-danger' data-dismiss='modal'>Close</button>
								<input type='submit' class='btn btn-warning' >
							  </div>
							  </form>
							</div>
						  </div>
					</div>" ;
				?>
			</td>
		</tr>

<?php
    } 
} else {
	?>
	
		<div class="row">
				<div class="col-sm-4"></div>
				<div class="col-sm-4"><center><span class="glyphicon glyphicon-home maincart"></span>

				<br> Looks like you don't have any residences yet! Add one to GetFed!<br>
		<center>
		</div>
				<div class="col-sm-4"></div>
		</div>	
	
	<?php
} 
?>
<tr>
			<td colspan='7'>
			<center>
				<button type='button' class='btn btn-success' data-toggle="modal" data-target="#addResidence" >
					<span class='glyphicon glyphicon-plus-sign'></span>
					 Add A Residence
				</button>
			</center>
			</td>
		</tr>
</table>
<!--Begin Add Residence Modal-->
<div class="modal fade" id="addResidence">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Add a Residence</h4>
      </div>
      <div class="modal-body">
       <form class='form' action='addResidencetoList.php' method="POST">
	   <input type='hidden' name='fid' value='<?php echo $fid; ?>'>
	  <select class="form-control" name="residence" id="residence" onchange="alertChange()">
							<option selected value="">Select an Option Below</option>
							<option value="oncampus">On-Campus</option>
							<option value="offcampus">Off-Campus</option>
							<option value="miscchoice">Misc</option>
	  </select>
	  <h5>Public to Others?: </h5>
			<input type="checkbox" class="form-control"name="publiCheckbox" checked>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-warning" ><!--Test</button>-->
      </div>
	  </form>
    </div>
  </div>
</div>
<!--End Add Residence Modal-->
