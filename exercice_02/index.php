<?php

function conversion($dollars){
    return $dollars * 1.085965;
}

$euro = 164;
echo 'Aujourd\'hui, le '. date('d-m-Y') .', ' . $euro . ' € corresponds à ' . conversion($euro) . ' $ américains.<br>';
