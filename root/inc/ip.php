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
$vis_ip = getVisIPAddr();

// Display the IP address
//echo $vis_ip;


$ip = $db->prepare("INSERT INTO `counter_ip` (`ip`)
                  VALUES ('$vis_ip')");
$ip->execute();

/*echo $_SERVER['HTTP_USER_AGENT'];
$mybrowser = get_browser();

echo '<pre>';
print_r($mybrowser);
echo '</pre>';*/

?>