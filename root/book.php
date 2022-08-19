<?php require_once __DIR__ . '/include/header.php'; ?>
<?php require_once __DIR__ . '/include/home.php'; ?>

<?php

$books = $db->prepare("SELECT * FROM `book` WHERE `s_id` = 1 ORDER by `id` DESC ");
$books->execute();

?>

    <main class="">
        <div class="container page">
            <div class="row">

                <div class="col-xl-9 col-lg-9 book">

                    <?php

                    while ($book = $books->fetch(PDO::FETCH_ASSOC)) {
                        ?>
                             <div class="book__item">
                            <div class="book__img">
                                <img class="book__img" src="<?php echo $site_url . '/admin/image/book/' . $book['image'] ?>"
                                     alt="">
                            </div>

                            <div class="book__content">
                                <div>
                                    <h3 class="book__title"> <?php echo $book['title'] ?> </h3>

                                    <div class="book__info">
                                        <span class="info-green"><?php echo $book['page'] ?> Səhifə</span>
                                        <span class="m-info">·</span>
                                        <span class="info-green"><?php echo $book['size'] ?> MB</span>
                                        <span class="m-info">·</span>
                                        <span class="info-green"><?php echo $book['download'] ?> Yükləmə</span>
                                        <span class="m-info">·</span>
                                        <span class="info-green"><?php echo $book['format'] ?></span>

                                    </div>


                                </div>

                                <div class="text-right">

                                    <a href="<?php echo $site_url . '/book-inner.php?id=' . $book['id'] ?>" class="book__download">
                                        <i class="fas fa-download"></i>
                                        <span>Yukle</span>
                                    </a>

                                </div>

                            </div>
                        </div>
                        <?php
                    }

                    ?>




                </div>


                <div class="col-xl-3 col-lg-3">
                    <?php require_once __DIR__ . '/include/sidebar.php'; ?>

                </div>
            </div>
        </div>
    </main>

<?php require_once __DIR__ . './include/footer.php' ?>