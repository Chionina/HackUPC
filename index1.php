<!DOCTYPE html>
<html>
	<head>
		<title></title>
		<link rel="stylesheet" type="text/css" href="index.css">
	
	        <meta name="format-detection" content="telephone=no">
	        <meta name="apple-mobile-web-app-capable" content="yes" />

		<meta charset="utf-8">
	</head>

	<body class="typeform-default">
		
		<div class="container">
	
			<h1>CV Generator</h1>
			
			<div class="typeform-widget" data-url="//demo.typeform.com/to/PlLJcr" style="width:100%;height:500px;"></div>

			<div id="my-embedded-typeform"
        	 		style="width: 200%; height: 200%; text-align: center; padding-bottom:10px; padding-top:50px;">
			</div>
		</div>
		
		<script src="https://embed.typeform.com/embed.js" type="text/javascript"></script>

		<script type="text/javascript">
                window.addEventListener("DOMContentLoaded", function() {
                	var el = document.getElementById("my-embedded-typeform");
      
   
        window.typeformEmbed.makeWidget(el, "https://admin.typeform.com/to/PlLJcr", {
        hideFooter: true,
        hideHeaders: true,
        opacity: 0,
	onSubmit(data) {
		console.log(data)
		var string_data = JSON.stringify(data)
		window.location = 'http://localhost:9888/?data=' + string_data
	}
      });
    });
  </script>


	</body>
</html>
