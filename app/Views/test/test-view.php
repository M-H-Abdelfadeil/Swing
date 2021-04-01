<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?php echo path_public("css/test.css")?>">

    <title>test</title>
</head>
<body>
<h1>test View</h1>
<?php
if($data){
    var_dump($data);
}
?>
</body>
</html>