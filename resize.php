<?php
$path_parts = pathinfo($_GET['a']);
if ($path_parts['extension'] == "png"){
	$im = imagecreatefrompng($_GET['a']); 
}elseif ($path_parts['extension'] == "jpg"){
	$im = imagecreatefromjpeg($_GET['a']); 
}elseif ($path_parts['extension'] == "jpeg"){
	$im = imagecreatefromjpeg($_GET['a']); 
}elseif ($path_parts['extension'] == "gif"){
	$im = imagecreatefromgif($_GET['a']); 
}else {
	exit("EXTENSION INVALIDA");
}
list($ancho,$alto)=getimagesize($_GET['a']);
if (empty($_GET['width']) || empty($_GET['height'])) {
	$ancho_final = 100;
	$alto_final = 100;
}else{
	$ancho_final = $_GET['width'];
	$alto_final = $_GET['height'];
}
$x_ratio = 100 / $ancho;
$y_ratio = 100 / $alto;
$tmp=imagecreatetruecolor($ancho_final,$alto_final);
imagecopyresampled($tmp,$im,0,0,0,0,$ancho_final, $alto_final,$ancho,$alto);

if ($path_parts['extension'] == "png"){
	header("Content-type: image/png");
	imagepng($tmp);
}elseif ($path_parts['extension'] == "jpg"){
	header("Content-type: image/jpeg");
	imagejpeg($tmp);
}elseif ($path_parts['extension'] == "jpeg"){
	header("Content-type: image/jpeg");
	imagejpeg($tmp);
}elseif ($path_parts['extension'] == "gif"){
	header("Content-type: image/gif");
	imagegif($tmp);
}
imagedestroy($im);

?>
