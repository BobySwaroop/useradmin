

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post" action="upload.php" enctype="multipart/form-data">
        <input type="file" name="file">
        <label for="category">Choosee your category</label>
        <select name="cat" id="category">
            <option>cricket</option>
            <option>football</option>
        </select><br>
        <input type="text" name="msg"><br>
        <input type="submit" name="submit">
    </form>
</body>
</html>