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

<form method="post">

<select name="marques[]" >
<optgroup label="cars">
                <option value="bmw">BMW</option>
                <option value="ford" selected>Ford</option>
                <option value="saab">Saab</option>
            </optgroup>
            <optgroup label="countries">
                <option value="USA">USA</option>
                <option value="RUSSIA">RUSSIA</option>
                <option value="MOLDOVA">MOLDOVA</option>
            </optgroup>

    </select>
  

    <button>Send</button>

</form>


</body>

</html>
