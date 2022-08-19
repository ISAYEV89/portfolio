<?php
require_once '../inc/config.php';


if (isset($_POST['counter'])) {

    $id = $_POST['counter'];

    $get = $db->prepare("SELECT * FROM `book` WHERE `id` = '$id'");
    $get->execute();
    $get2 = $get ->fetch(PDO::FETCH_ASSOC);

    $download = $get2['download'] + 1;

    $updt2 = $db->prepare("UPDATE `book` SET download=:download WHERE `id`='$id'");
    $updt2->execute(array('download' => $download));

    echo 'done';

}

?>