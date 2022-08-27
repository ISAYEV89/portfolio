<?php
require_once '../inc/config.php';

if (isset($_POST['email'])) {


    $_POST = array_map('filter_form', $_POST);

    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $text = $_POST['text'];


    if ($name == '') {
        echo 'yoxdur';
    }  elseif ($email == '') {
        echo 'yoxdur';
    } elseif ($text == '') {
        echo 'yoxdur';
    } else {
        $contact = $db->prepare("INSERT INTO `contact` (`name`, `email`, `phone`, `text`) 
                                VALUES ('$name', '$email', '$phone', '$text')");
        $contact->execute();

        echo 'var';
    }


}

?>