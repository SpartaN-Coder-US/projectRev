<?php

if ($_SERVER["REQUEST_METHOD"]=== "POST"){
    var_dump($_POST);

}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset ="utf-8">
    <title>This is title</title>


</head>

<body>

<form method = "post">  

<input name = "search">
<input name = "password" type = "password">

<button>Send</button>

</form>

</body>

</html>
