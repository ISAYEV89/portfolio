<?php

include_once __DIR__ . '/../include/header.php';

if (isset($_GET['delete'])) {
    $id_rew = $_GET['delete'];

    $delete=$db->prepare("DELETE FROM `category` where `id`= '$id_rew' ");
    $delete -> execute();

    header("Location: $site_url/admin/category/index.php");


} else{
    header("Location: $site_url/admin/category/index.php");

}



?>