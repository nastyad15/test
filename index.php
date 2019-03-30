
<html>
<head>
    <title> File Upload</title>
</head>
<body>

<form action="uploads.php" method="POST" enctype="multipart/form-data">
    <h1> File Upload</h1>
    <input type="file" name="file">
    <button type="submit" name="submit">Click To Upload</button>
    <p><strong>Only</strong> for jpg, jpeg, png, pdf, txt.</p>
</form>
</body>
</html>

<?php
echo '<table border = "1">';
echo '<tr><th>File</th><th>Name</th><th>Extension</th><th>Size</th><th>Delete</th></tr>';
$data = scandir('files');
if (isset($_GET['unlink']) && trim($_GET['unlink'])!==""){
    unlink('files/'.$_GET['unlink']);
}
for ($f = 2; $f < count($data); $f++) {
    $exten = explode(".", $data[$f]);
    $ex = end($exten);
    $name = basename($data[$f], $ex);
    $name = rtrim($name, ".");
    $size = filesize('files/'.$data[$f]);

echo "<tr><td><br><a download='$data[$f]' href='files/'>$data[$f]</a><br></td><td>$name</td><td>$ex</td><td>$size byte</td><td><a href='?unlink=$data[$f]'>Delete</a></td></tr>";
}
?>