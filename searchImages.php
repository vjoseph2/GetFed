<head>
	<style>
	.icon-preview{
		width:50px;
		height:auto;
	}
	</style>
</head>
<?php
$dir    = '../testFTPfolder/';
$files1 = scandir($dir);

//print_r($files1);

foreach ($files1 as $value) {
	$fullPath=$dir.$value;
	if ($value=="." || $value==".."){
		
	}else{
	$imgPreview= "<img src='$fullPath' class='icon-preview'>";
    echo "$imgPreview $value <br>";
	}
}
?>