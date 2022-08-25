<?php
include_once __DIR__ . '/../../inc/config.php';

/*if (!(($_SESSION['user']['status']) == 7)) {
    header("Location: $site_url/admin/index.php");
    exit;
}*/

if (empty(($_SESSION['user']))) {
    header("Location: $site_url/admin/login.php");
    exit;
} else if (!(($_SESSION['user']['status']) == 1)){
    header("Location: $site_url/admin/login.php");
    exit;
}


/*echo '<pre>';
print_r($_SESSION['user']);
echo '</pre>';*/

?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
            crossorigin="anonymous"></script>
    <link rel="stylesheet" href="<?php echo $site_url ?>/admin/css/bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo $site_url; ?>/admin/css/select2.min.css" />
    <link rel="stylesheet" href="<?php echo $site_url; ?>/admin/css/select2-bootstrap.min.css" />
    <link rel="stylesheet" href="<?php echo $site_url ?>/admin/css/style.css">
    <title></title>
</head>
<body>

