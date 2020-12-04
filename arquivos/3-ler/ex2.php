<?php
$filename = "logo.png";
$base64 = base64_encode(file_get_contents($filename));
$fileinfo = new finfo(FILEINFO_MIME_TYPE);
$mimetype = $fileinfo->file($filename);
$base64encode = "data:".$mimetype.";base64," . $base64;
?>
<a href="<?php echo $base64encode?>" target="_blank">Link</a>
<img src="<?php echo $base64encode?>">