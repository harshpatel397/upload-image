<?php
$upload_errors = array  //error 
        (

                UPLOAD_ERR_OK           =>  "No Errors.", 
                UPLOAD_ERR_INI_SIZE     =>  "Larger than upload_max_filesize.", 
                UPLOAD_ERR_FORM_SIZE    =>  "Larger than form MAX_FILE_SIZE.", 
                UPLOAD_ERR_PARTIAL      =>  "Partial upload.", 
                UPLOAD_ERR_NO_FILE      =>  "No file.", 
                UPLOAD_ERR_NO_TMP_DIR   =>  "No temporary directory", 
                UPLOAD_ERR_CANT_WRITE   =>  "Can't write to disk",
                UPLOAD_ERR_EXTENSION    =>  "File upload stopped by extension."

        );
         $error = $_FILES['file_upload']['error'];
         $message = $upload_errors[$error];
        
	if(isset($_POST['submit'])){
	$tmp_file=$_FILES['file_upload']['tmp_name'];
	$target_file=basename($_FILES['file_upload']['name']);
	$upload_dir="upload";
	 if(move_uploaded_file($tmp_file,$target_file)){
		$message="file upload successfully" ;
	}
	else
	{
		  $error = $_FILES['file_upload']['error'];
          $message = $upload_errors[$error];
	}
}
?>
<?php
if(isset($_POST['submit'])){
	echo "<pre>";
	print_r($_FILES['file_upload']);
	echo "</pre>";
	echo "<hr>";

}
?>
<html>
<head>
<title>upload the file</title>
</head>
<style>
        .message {
            font-family: sans-serif;
            color: #00BAE5;
            font-size: 16px;
        }
       </style>
<body>
	<?php if(!empty($message)){
		echo "<p class='message'> {$message} </p>";}?>    
	
	<form action="upload.php"  enctype="multipart/form-data"  method="post">
	<input type="hidden" name="max_file_size" value="1000000">
	<input type="file" name="file_upload">
	<input type="submit" name="submit" value="upload" style="background-color:green; font-size:15px;">
</form>
</body>
</html>	

