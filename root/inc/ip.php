<?php
function getVisIpAddr()
{

    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        return $_SERVER['HTTP_CLIENT_IP'];
    } else if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        return $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        return $_SERVER['REMOTE_ADDR'];
    }
}

// Store the IP address
//$vis_ip = getVisIPAddr();





/*echo $_SERVER['HTTP_USER_AGENT'];
$mybrowser = get_browser();

echo '<pre>';
print_r($mybrowser);
echo '</pre>';*/


/// v 2


/*Get user ip address*/
$ip_address = $_SERVER['REMOTE_ADDR'];
/*Get user ip address details with geoplugin.net*/
$geopluginURL = 'http://www.geoplugin.net/php.gp?ip=' . $ip_address;
$addrDetailsArr = unserialize(file_get_contents($geopluginURL));
/*Get City name by return array*/
$city = $addrDetailsArr['geoplugin_city'];
/*Get Country name by return array*/
$country = $addrDetailsArr['geoplugin_countryName'];
/*Comment out these line to see all the posible details*/
/*echo '<pre>';
print_r($addrDetailsArr);
die();*/
if (!$city) {
    $city = 'Not Define';
}
if (!$country) {
    $country = 'Not Define';
}
/*echo '<strong>IP Address</strong>:- ' . $ip_address . '<br/>';
echo '<strong>City</strong>:- ' . $city . '<br/>';
echo '<strong>Country</strong>:- ' . $country . '<br/>';*/







$ip = $db->prepare("INSERT INTO `counter_ip` (`ip`, `country`, `city`)
                  VALUES ('$ip_address', '$country', '$city')");
$ip->execute();
?>