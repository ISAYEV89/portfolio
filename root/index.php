<?php require_once __DIR__ . '/include/header.php'; ?>
<?php require_once __DIR__ . '/include/home.php'; ?>


    <div class="page-wrap">


        <div class=" page skill">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="main-title">
                            <h2 class="title-h2 title-h2--mb text-center">TEXNİKİ BACARIQLAR</h2>
                        </div>
                    </div>

                    <?php

                    $skills = $db->prepare("SELECT * FROM `skill` WHERE `s_id` = 1");
                    $skills->execute();

                    while ($skill = $skills->fetch(PDO::FETCH_ASSOC)) {
                        ?>
                        <div class="col-md-6">
                            <div class="progress-container progress-primary"><span
                                        class="progress-badge"><?php echo $skill['title'] ?></span>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-primary" data-aos="progress-full"
                                         data-aos-offset="10" data-aos-duration="1000" role="progressbar"
                                         aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"
                                         style="width: <?php echo $skill['percent'] . '%' ?>;"></div>
                                    <span class="progress-value"><?php echo $skill['percent'] . '%' ?></span>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    ?>

                </div>
            </div>
        </div>


        <div class="page portfolio">

            <div class="container">


                <h2 class="title-h2 title-h2--mb text-center">PORTFOLIO</h2>

                <div data-js="hero-demo">
                    <div class="filters button-group js-radio-button-group device-type">
                        <button class="button is-checked" data-filter="*">Hamısı</button>
                        <button class="button" data-filter=".cat-1">Front-End</button>
                        <button class="button" data-filter=".cat-2">Back-End</button>
                        <button class="button" data-filter=".cat-3">Digər</button>
                    </div>

                    <ul class="grid">

                        <?php

                        $portfolio = $db->prepare("SELECT * FROM `portfolio` WHERE `s_id` = 1");
                        $portfolio->execute();

                        while ($port = $portfolio->fetch(PDO::FETCH_ASSOC)) {
                            ?>
                            <li class="element-item <?php echo catPort($port['cat']) ?>" data-aos="zoom-in">
                                <a href="<?php echo $port['url'] ?>" target="_blank" class="portfolio__item">
                                    <img class="portfolio__img"
                                         src="<?php echo $site_url . '/admin/image/portfolio/' . $port['img'] ?>"
                                         alt="">
                                    <div class="portfolio__content"><?php echo $port['title'] ?></div>
                                </a>
                            </li>

                            <?php
                        }
                        ?>


                    </ul>
                </div>
            </div>
        </div>

        <div class="page blog">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="main-title">
                            <h2 class="title-h2 title-h2--mb text-center">BLOQ</h2>
                        </div>
                    </div>

                    <?php
                    $blogs = $db->prepare("SELECT * FROM `blog` WHERE `s_id` = 1  ORDER by `id` DESC LIMIT 3");
                    $blogs->execute();


                    while ($blog = $blogs->fetch(PDO::FETCH_ASSOC)) {
                        ?>
                        <div class="col-xl-4 blog__item" data-aos="flip-up">

                            <a href="<?php echo $site_url . '/blog-inner.php?id=' . $blog['id']; ?>" class="blog__img">
                                <img src="<?php echo $site_url . '/admin/image/blog/' . $blog['img'] ?>" alt="">

                                <div class="blog__content">
                                    <div class="blog__title"><?php echo $blog['title'] ?></div>
                                </div>

                            </a>


                        </div>


                        <?php
                    }
                    ?>


                </div>
            </div>
        </div>

        <div class="page book-wrap">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="main-title">
                            <h2 class="title-h2 title-h2--mb text-center text-uppercase">Kitablar</h2>
                            <p class="main__title">Azərbaycan dilində informasiya texnologiyalarına aid kitablar.
                                Bütün kitab hərkəsə açıq olan müxtəlif internet mənbələrdən toplanmışdır.</p>
                        </div>
                    </div>

                    <?php
                    $books = $db->prepare("SELECT * FROM `book` WHERE `s_id` = 1 ORDER by `id` DESC LIMIT 4 ");
                    $books->execute();

                    while ($book = $books->fetch(PDO::FETCH_ASSOC)) {
                        ?>
                        <div class="col-xl-3 " data-aos="fade-up">
                            <a href="<?php echo $site_url . '/book-inner.php?id=' . $book['id']; ?>"
                               class="book-wrap__item">
                                <img src="<?php echo $site_url . '/admin/image/book/' . $book['image'] ?>" alt="">
                            </a>
                        </div>

                        <?php
                    }

                    ?>


                </div>
            </div>
        </div>

        <div class="page contact position-relative" id="contact">
            <div class="container" >
                <div class="row">
                    <div class="col-xl-12">
                        <div class="main-title">
                            <h2 class="title-h2 title-h2--mb text-center text-uppercase">Əlaqə</h2>
                            <p class="main__title"> Sayt sifarish vermek isteyirsinizse zehmet olmasa </p>
                        </div>
                    </div>

                    <form  class="contact-form">

                        <div class="group group--mb-xs group--w-100 ">
                            <input class="group__input contact-email" name="name" type="email">
                            <label class="group__label">Ad və Soyad *</label>
                        </div>

                        <div class="group group--mb-xs group--w-100 ">
                            <input class="group__input contact-email" name="email" type="email">
                            <label class="group__label">E-poçt *</label>
                        </div>

                        <div class="group group--mb-xs group--w-100 ">
                            <input class="group__input contact-email" name="email" type="email">
                            <label class="group__label">Telefon </label>
                        </div>


                        <div class="group group--mb-xs group--w-100 ">

                            <textarea class="group__input height-xs contact-text" name="email" type="email"></textarea>
                            <label class="group__label">Qeyd </label>
                        </div>

                        <input type="submit" class="group__submit show-popup" data-showpopup="1"  id="contact-send" value="Göndər">

                    </form>




                </div>
            </div>
        </div>


    </div>


    <div class="overlay-bg">
        <div class="overlay-content popup1 show-popup f-modal-alert">
            <div class="popup-flex">
                <h2 class="user-header__title">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae inventore iure labore nisi quis rem ullam. Iure pariatur placeat voluptatem!</h2>
                <div class="f-modal-icon f-modal-success animate">
                    <span class="f-modal-line f-modal-tip animateSuccessTip"></span>
                    <span class="f-modal-line f-modal-long animateSuccessLong"></span>
                    <div class="f-modal-placeholder"></div>
                    <div class="f-modal-fix"></div>
                </div>
                <div>
                    <input type="submit" class="group__submit close-btn " value="BAĞLA">
                </div>
            </div>

        </div>
    </div>

<?php require_once __DIR__ . '/include/footer.php' ?>