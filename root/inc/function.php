<?php

function filter_form($post){
    return is_array($post) ? array_map('filter_form', $post) :  htmlspecialchars(trim($post));
}


//// Tarix ve vaxt Azerbaycan
$date_az = new \DateTime();
$date_az->setTimezone(new \DateTimeZone('+0400')); //GMT
//$date = $date_az->format('Y-m-d H:i:s');

function test($tt) {
    echo $tt;
}

?>