<?php
require('includes/connect.php');
$target_dir2= $_POST['customFile'];
$path = '../testFTPfolder/'.$target_dir2;

//echo $target_dir;

if (!file_exists($target_dir)) {
    mkdir($target_dir, 0777, TRUE)or die("Unable to create to $target_dir");
}else{
	echo "$target_dir either exists or is being created...";
}
include('upload.php');

?>