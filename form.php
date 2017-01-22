<?php
//Getting POST data from array
    $value = $_POST['veg'];
    for ($i=0;  $i <  count($value); $i++)  { 
        echo "$value[$i] ";
    }
    echo $_POST['color'];
