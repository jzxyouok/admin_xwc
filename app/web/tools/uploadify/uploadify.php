<?php
/*
Uploadify
Copyright (c) 2012 Reactive Apps, Ronnie Garcia
Released under the MIT License <http://www.opensource.org/licenses/mit-license.php> 
*/
header("Content-type:text/html;charset=utf-8");
// Define a destination
$targetFolder = getcwd().'/uploads'; // Relative to the root

$verifyToken = md5('unique_salt' . $_POST['timestamp']);

if (!empty($_FILES) && $_POST['token'] == $verifyToken) {
	$tempFile = $_FILES['Filedata']['tmp_name'];
	$targetPath = $_SERVER['DOCUMENT_ROOT'] . $targetFolder;
    $fileParts = pathinfo($_FILES['Filedata']['name']);

//    var_export($fileParts);
    $filename = getSaveName($fileParts['extension']);
	$targetFile = $targetFolder. '/' .$filename ;

	// Validate the file type
	$fileTypes = array('jpg','jpeg','gif','png','txt','doc','docx'); // File extensions

	if (in_array($fileParts['extension'],$fileTypes)) {
		move_uploaded_file($tempFile,$targetFile);
        $data = array("filepath" => $targetFile,"filename" => $filename );
		echo json_encode($data);exit();
	} else {

		echo 'Invalid file type.';
	}
}


function getSaveName($ext){
    return md5(uniqid(rand())).".{$ext}";
}

?>