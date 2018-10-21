<!DOCTYPE html>
<html>
	<head>
		<title></title>
		<link rel="stylesheet" type="text/css" href="index.css">
	
		<meta charset="utf-8">
	</head>

	<body>

	<h1 style="text-align: center;">Enjoy!</h1>
<?php	

$name = $_GET["name"];

//$file = $_GET["file"];
$file = 'C:\wamp64\www\CV.pdf';

//header("Content-type:application/pdf");

// It will be called downloaded.pdf
//header("Content-Disposition:attachment;filename='".$name.".pdf'");

// The PDF source is in original.pdf
//readfile($file);
?>
</body>
</html>