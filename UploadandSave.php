<!DOCTYPE html>
<html>
<head>
	<title>File Upload and Save</title>
</head>
<body>
	<h2>File Upload and Save</h2>
	<form action="" method="post" enctype="multipart/form-data">
		<label>Input Text:</label><br>
		<textarea name="text" rows="10" cols="50"></textarea><br><br>
		<label>Short Text:</label><br>
		<input type="text" name="short_text" maxlength="50"><br><br>
		<label>File Format:</label><br>
		<select name="file_format">
			<option value="sql">SQL</option>
			<option value="py">Python</option>
			<option value="php">PHP</option>
			<option value="r">R</option>
		</select><br><br>
		<input type="submit" value="Upload and Save">
	</form>

	<?php
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$input_text = $_POST["text"];
			$short_text = $_POST["short_text"];
			$file_format = $_POST["file_format"];
			$file_name = $short_text . "." . $file_format;
			$file_content = $input_text;

			$file = fopen($file_name, "w") or die("Unable to open file!");
			fwrite($file, $file_content);
			fclose($file);

			echo "<p>File successfully saved as " . $file_name . "</p>";
		}
	?>
</body>
</html>
