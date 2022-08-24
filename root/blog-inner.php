<?php require_once __DIR__ . '/include/header.php'; ?>
<?php require_once __DIR__ . '/include/home.php'; ?>

<?php


if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $blog = $db->prepare("SELECT * FROM `blog` WHERE `id` = '$id' AND `s_id` = 1");
    $blog->execute();
    $post = $blog->fetch(PDO::FETCH_ASSOC);

    if (empty($post)) {
        header("Location: $site_url");
    }
} else {
    $id = 0;
}

if ($id == 0) {
    header("Location: $site_url/blog.php");
}


$view = $post['view'] + 1;

$view_upt = $db->prepare("UPDATE `blog`  SET view=:view WHERE id='$id'");
$view_upt->execute(array('view' => $view));


?>


<div class="main">
    <div class="container page">
        <div class="row">


            <div class="col-xl-9 ">

                <div class="blog-inner blog-inner--mb">

                    <h1 class="blog-inner__title"><?php echo $post['title'] ?></h1>

                    <div class="blog-inner__img">
                        <img src="<?php echo $site_url . '/admin/image/blog/' . $post['img'] ?>" alt="">
                    </div>

                    <div class="blog-content">
                       <?php echo $post['text']?>
                    </div>


                </div>

            </div>

            <div class="col-xl-3">
                <?php require_once __DIR__ . '/include/sidebar.php' ?>
            </div>
        </div>
    </div>
</div>


<?php require_once __DIR__ . '/include/footer.php' ?>

