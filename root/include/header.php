<?php
require_once __DIR__ . '/../inc/config.php';
require_once __DIR__ . '/../inc/ip.php';

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <?php
    if (($components_pages == 'book.php' || $components_pages == 'book-inner.php')) {
        ?>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">

        <?php
    }
    ?>


    <link rel="apple-touch-icon" sizes="180x180"
          href="<?php echo $site_url ?>/assets/static/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32"
          href="<?php echo $site_url ?>/assets/static/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16"
          href="<?php echo $site_url ?>/assets/static/favicon/favicon-16x16.png">
    <link rel="manifest" href="<?php echo $site_url ?>/assets/static/favicon/site.webmanifest">
    <link rel="mask-icon" href="<?php echo $site_url ?>/assets/static/favicon/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

    <title>Portfolio</title>
    <link href="<?php echo $site_url ?>/assets/css/app.css" rel="stylesheet">
</head>
<body>


<header class="header">
    <div class="container">
        <section class="wrapper">
            <a href="<?php echo $site_url ?>" class="header-logo">
                <img src="<?php echo $site_url ?>/assets/image/icon/logo.png" alt="">
            </a>
            <button type="button" class="opened-menu">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </button>
            <div class="overlay"></div>
            <nav class="navbar">
                <button type="button" class="closed-menu">
                    <div class="closed-icon">
                        <i class="fas fa-times"></i>
                    </div>

                </button>
                <ul class="menu">
                    <li class="menu-item">
                        <a class="<?php echo (($components_pages == 'index.php' || $components_pages == '')) ? 'active' : ''; ?>"
                           href="<?php echo $site_url ?>">Ana Səhifə </a></li>
                    <li class="menu-item">
                        <a class="<?php echo (($components_pages == 'blog.php' || $components_pages == 'blog-inner.php')) ? 'active' : ''; ?>"
                           href="<?php echo $site_url . '/blog.php' ?>">Bloq</a></li>
                    <li class="menu-item">
                        <a class="<?php echo (($components_pages == 'book.php' || $components_pages == 'book-inner.php')) ? 'active' : ''; ?>"
                           href="<?php echo $site_url . '/book.php' ?>">Kitablar</a></li>
                </ul>
            </nav>
        </section>


    </div>
</header>

