<?php
$current_serving = array(9999); // u really cant loop an empty array
$random_number = rand(1000, 9998);

//  its 1/10000 chances of reapeating the same number
function check($generated)
{
    global $current_serving;
    foreach ($current_serving as $value) {
        if ($generated == $value) {
            $generated = rand(1000, 9999);
            check($generated);
        } else {
            return $generated;
        }
    }
}

function generate()
{
    
    global $random_number;
    global $current_serving;
    if (check($random_number)) {
        array_push($current_serving, $random_number);
        return $random_number;
    }
}
