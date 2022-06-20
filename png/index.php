<?php include("./brand.php"); ?>
<?php include("./helper.php"); ?>

<!DOCTYPE html>
<html>
<head>
	<?php include("./head.php"); ?>
	<title></title>
	<meta name="description" content="">
	<meta name="keywords" content="">
</head>
<body>
<?php include("./header.php"); ?>

<div class="container">
	
	<div class="row">
		<p>This free online tool converts your PNG images to JPEG format, applying proper compression methods. Unlike other services, this tool does not ask for your email address, offers mass conversion and allows files up to 50 MB.</p>
	</div>
	
	<div class='row' style='border: 1px solid #CCC; margin: 10px; padding: 10px; box-shadow: 2px 2px 0px 0px #CCC; border-radius: 10px; overflow: hidden;'>	
		<div style='text-align: center; margin: 10px;'>
			<?php
				if(isset($_POST['submit'])) {
					uploadAndConvert();
				}
			?>
		</div>

		<div class="row" style='text-align: center; border: 1px dashed #CCC; padding: 20px; max-width: 1200px; margin: 20px auto; border-radius: 10px;'>
			<form action="" method="post" enctype="multipart/form-data">
				<input type="file" class="form-control-file" name="fileToUpload" id="fileToUpload" required />
				<input class="btn btn-primary" type="submit" value="Upload Image" name="submit" style='margin: 10px;' />
			</form>
		</div>
	</div>
	
	<hr />
	
	<div class="row">
		<img src='./img/main_page.jpg' style="max-width: 750px; margin-bottom: 20px;" class="rounded mx-auto d-block" alt="" />
		<h2 class='display-6'>How to convert PNG to JPG</h2>
		<p>
			<ol>
				<li>Upload any PNG format image you want to convert into JPG.</li>
				<li>Click on Upload Image and the Uploading will start.</li>
				<li>The PNG format image will automatically convert to JPG format and a JPG format image download link will be provided.</li>
				<li>Click on "Download Image in JPG" to download your converted image for free.</li>
			</ol>
		</p>
		
		
		<h2 class='display-6'>How can I convert PNG to JPG for free?</h2>
		<p>
			<ol>
				<li>Upload any PNG format image you want to convert into JPG.</li>
				<li>Click on Upload Image and the Uploading will start.</li>
				<li>The PNG format image will automatically convert to JPG format and a JPG format image download link will be provided.</li>
				<li>Click on "Download Image in JPG" to download your converted image for free.</li>
			</ol>
		</p>
	</div>
</div>
	
<?php include("./footer.php"); ?>




</body>
</html>