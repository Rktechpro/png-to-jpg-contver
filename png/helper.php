<?php
	function randomHex() {
		return str_pad(dechex(rand(0x000000, 0xFFFFFF)), 6, 0, STR_PAD_LEFT);
	}
	
	function uploadAndConvert() {
		$randomFileName = randomHex();
		$newJpgFileName = $randomFileName.".jpg";
		$newPngFileName = $randomFileName.".png";
		$target_dir = "uploads/";
		$target_file = $target_dir . $newPngFileName;
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

		// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) {
		  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
		  if($check !== false) {
			//echo "File is an image - " . $check["mime"] . ".";
			$uploadOk = 1;
		  } else {
			echo "File is not an image.";
			$uploadOk = 0;
		  }
		}

		// Check if file already exists
		if (file_exists($target_file)) {
		  echo "Sorry, file already exists.";
		  $uploadOk = 0;
		}

		// Check file size
		if ($_FILES["fileToUpload"]["size"] > 5000000) {
		  echo "Sorry, your file is too large.";
		  $uploadOk = 0;
		}

		// Allow certain file formats
		if($imageFileType != "png") {
		  echo "Sorry, only PNG Format is allowed.";
		  $uploadOk = 0;
		}

		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
		  echo "Sorry, your file was not uploaded.";
		// if everything is ok, try to upload file
		} else {
		  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
			//echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
				$filePath = "./uploads/".htmlspecialchars($newPngFileName);
				$fileDestinationPath = "./converted_files/".$newJpgFileName;

				$image = imagecreatefrompng($filePath);
				$bg = imagecreatetruecolor(imagesx($image), imagesy($image));
				imagefill($bg, 0, 0, imagecolorallocate($bg, 255, 255, 255));
				imagealphablending($bg, TRUE);
				imagecopy($bg, $image, 0, 0, 0, 0, imagesx($image), imagesy($image));
				imagedestroy($image);
				$quality = 50; // 0 = worst / smaller file, 100 = better / bigger file 
				imagejpeg($bg, $fileDestinationPath, $quality);
				imagedestroy($bg);
					
				
				echo "<div><h3>Preview</h3></div>";
				echo "<img src='".$fileDestinationPath."' style='width:300px; margin: 0 auto;' class='img-thumbnail'/><br/>";
				echo "<a href='".$fileDestinationPath."' style='margin-top:10px;' class='btn btn-outline-success' role='button' download>Download Image in JPG</a>";

			
		  } else {
			echo "Sorry, there was an error uploading your file.";
		  }

		}
	}
?>