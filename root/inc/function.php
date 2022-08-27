<?php

function filter_form($post){
    return is_array($post) ? array_map('filter_form', $post) :  htmlspecialchars(trim($post));
}

function catPort($cat) {

    $cat = explode(",", $cat);
    $cat =  array_filter($cat);
    $cat2 = '';
    foreach ($cat as $key => $val) {
        $cat2 .= $val . ' ';
    }
    return $cat2;
}

//// Tarix ve vaxt Azerbaycan
$date_az = new \DateTime();
$date_az->setTimezone(new \DateTimeZone('+0400')); //GMT
//$date = $date_az->format('Y-m-d H:i:s');



/// get url
$directoryURIPages = $_SERVER['REQUEST_URI'];
$path = parse_url($directoryURIPages, PHP_URL_PATH);
$components_pages = explode('/', $path);
$components_pages = $components_pages[1];



?>