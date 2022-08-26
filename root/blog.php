<?php require_once __DIR__ . '/include/header.php'; ?>
<?php require_once __DIR__ . '/include/home.php'; ?>
<?php


$blogs = $db->prepare("SELECT * FROM `blog` WHERE `s_id` = 1");
$blogs->execute();

?>

<main class="">
    <div class="container page">
        <div class="row">

            <div class="col-xl-9 col-lg-9">

                <div class="post">

                    <?php
                    while ($blog = $blogs->fetch(PDO::FETCH_ASSOC)) {
                        ?>

                        <div class="post__item">
                            <div class="post__left">
                                <a href="<?php echo $site_url . '/blog-inner.php?id=' . $blog['id']; ?>"
                                   class="post__img">
                                    <img src="<?php echo $site_url . '/admin/image/blog/' . $blog['img'] ?>" alt="">
                                </a>
                                <?php
                                    $cat = $db -> prepare("SELECT * FROM `category` WHERE `id` = {$blog['cat_id']} AND  `s_id` = 1 LIMIT 1");
                                    $cat->execute();
                                    $cats = $cat->fetch(PDO::FETCH_ASSOC);
                                ?>
                                <a href="<?php echo $cats['id']; ?>" class="post__cat"><?php echo $cats['title'] ?></a>
                            </div>


                            <div class="post__content">
                                <div>
                                    <h3 class="post__title"><?php echo $blog['title'] ?></h3>
                                    <p class="post__lead">
                                        <?php
                                        $text = strip_tags($blog['text']);
                                        $stringCut = substr($text, 0, 200);
                                        $endPoint = strrpos($stringCut, ' ');
                                        $string = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
                                        $string .= '...';
                                        echo $string;
                                        ?>
                                    </p>
                                </div>

                                <div>
                                    <a href="<?php echo $site_url . '/blog-inner.php?id=' . $blog['id']; ?>"
                                       class="post__read-more"> ARDINI OXU </a>
                                </div>

                            </div>
                        </div>
                        <?php
                    }

                    ?>





                </div>

            </div>
            <div class="col-xl-3 col-lg-3">

                <?php require_once __DIR__ . '/include/sidebar.php'; ?>
            </div>
        </div>
    </div>
</main>
<footer>

</footer>


<script type="text/javascript" src="./assets/js/app.js"></script></body>

</html>
