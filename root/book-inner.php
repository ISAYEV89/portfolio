<?php require_once __DIR__ . '/include/header.php'; ?>
<?php require_once __DIR__ . '/include/home.php'; ?>

<?php

if (isset($_GET['id'])) {

    $id_rew = $_GET['id'];

    $baza = $db->prepare("SELECT * FROM `book` WHERE `id` = '$id_rew' ");
    $baza->execute();
    $baza2 = $baza->fetch(PDO::FETCH_ASSOC);

    if (empty($baza2)) {
        header("Location: $site_url/book.php");
    }

}

?>



<main>
    <div class="container page">
        <div class="row">
            <div class="col-xl-9 ">
                <div class="book-inner book-inner--mb">
                    <div class="book-inner__img">
                        <img src="<?php echo $site_url . '/admin/image/book/' . $baza2['image'] ?>" alt="">
                    </div>

                    <div class="book-inner__content">

                        <div>
                            <h1 class="book-inner__title"><?php echo $baza2['title'] ?></h1>

                            <div class="book__info mr-ss">
                                <span class="info-green"><?php echo $baza2['page'] ?> Səhifə</span>
                                <span class="m-info">·</span>
                                <span class="info-green"><?php echo $baza2['size'] ?> MB</span>
                                <span class="m-info">·</span>
                                <span class="info-green"><?php echo $baza2['download'] ?> Yükləmə</span>
                                <span class="m-info">·</span>
                                <span class="info-green"><?php echo $baza2['format'] ?></span>
                            </div>

                            <div>
                                <span class="">Müəllif :</span><span class="info-green"> <?php echo $baza2['author'] ?></span>
                                <span id="d_id" class="d-none"><?php echo $baza2['id'] ?></span>
                            </div>

                        </div>

                        <div class="text-right">

                            <a download href="<?php echo $site_url . '/admin/image/book/' . $baza2['file'] ?>"
                               class="book__download downloadCounter">
                                <i class="fas fa-download"></i>
                                <span>Yüklə</span>
                            </a>
                        </div>
                    </div>

                </div>

            </div>
            <div class="col-xl-3 col-lg-3">

                <div class="sidebar">
                    <div class="sidebar__item">

                        <div class="sidebar__header">
                            <span class="sidebar__title">bloqlar</span>
                        </div>

                        <div class="sidebar__content">

                            <a href="" class="sidebar-blog">
                                <div class="sidebar-blog__img">
                                    <img src="assets/image/blog/blog1.jpg" alt="">
                                </div>
                                <h5 class="sidebar-blog__title">How beauty marks changed how we think about death</h5>
                            </a>

                            <a href="" class="sidebar-blog">
                                <div class="sidebar-blog__img">
                                    <img src="assets/image/blog/blog1.jpg" alt="">
                                </div>
                                <h5 class="sidebar-blog__title">How beauty marks changed how we think about death</h5>
                            </a>

                            <a href="" class="sidebar-blog">
                                <div class="sidebar-blog__img">
                                    <img src="assets/image/blog/blog1.jpg" alt="">
                                </div>
                                <h5 class="sidebar-blog__title">How beauty marks changed how we think about death</h5>
                            </a>
                        </div>

                        <a href="" class="sidebar-more">HAMISINA BAX</a>

                        </a>
                    </div>


                    <div class="sidebar__item">

                        <div class="sidebar__header">
                            <span class="sidebar__title">KITABLAR</span>
                        </div>

                        <div class="sidebar__content">
                            <a href="" class="sidebar-book">
                                <img src="assets/image/book/Komputer_ve_İnformasiya-kommunikasiya_Texnologiyalari.png"
                                     alt="">
                            </a>

                            <a href="" class="sidebar-more">HAMISINA BAX</a>
                        </div>

                    </div>



                    <div class="sidebar__item">

                        <div class="sidebar__header">
                            <span class="sidebar__title">Tags</span>
                        </div>

                        <div class="sidebar__content">
                            <a href="" class="tags-item">HTML</a>
                            <a href="" class="tags-item">Javascript</a>
                            <a href="" class="tags-item">PHP</a>
                            <a href="" class="tags-item">MySql</a>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
</main>

<?php require_once __DIR__ . './include/footer.php' ?>