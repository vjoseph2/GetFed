<?php
require('includes/connect.php');
include('header.php');
$fid=$_SESSION['fid'];
$whereDoYouLive = "SELECT f.fid AS ID, f.fname AS first_name, f.lname AS last_name, h.house_address AS house FROM houses h INNER JOIN friends f ON f.fid=h.fid WHERE f.fid='$fid'";
$result = $conn->query($whereDoYouLive);
if ($result->num_rows > 0) {
?>
<h1> Manage Residences </h1>
<small> Edit your place of residence or add new prefered dining locations </small>
<table class="table table-striped">
<th>ID</th>
<th>First Name</th>
<th>Last Name</th>
<th>Address</th>
<?php
    while($row = $result->fetch_assoc()) {
		?>
		<tr>
			<td><?php echo $row['ID'];?></td>
			<td><?php echo $row['first_name'];?></td>
			<td><?php echo $row['last_name'];?></td>
			<td><?php echo $row['house'];?></td>
		</tr>

<?php
    }
} else {
	?>
	
		<div class="row">
				<div class="col-sm-4"></div>
				<div class="col-sm-4"><center><span class="glyphicon glyphicon-shopping-cart maincart"></span>

				<br> Looks like you don't have any residences yet! Add one to GetFed!<br>
		<center>
		</div>
				<div class="col-sm-4"></div>
		</div>	
	
	<?php
} 
?>
<tr>
			<td colspan='4'>
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
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-warning" ><!--Test</button>-->
      </div>
	  </form>
    </div>
  </div>
</div>
<!--End Login Modal-->