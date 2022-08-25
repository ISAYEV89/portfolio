<?php require_once __DIR__ . './include/header.php'; ?>


    <div class="home">
        <div class="container">

            <div class="row">

                <div class="col-lg-6">
                    <div class="home__img">
                        <img src="./assets/image/icon/avatar.png" alt="">
                    </div>
                </div>

                <div class="col-lg-6 home__info-wrap">
                    <div class="home__info">
                        <h3 class="d-none">SALAM</h3>
                        <h1>ELÇİN İSAYEV</h1>
                        <h2>FULL-STACK DEVELOPER</h2>
                    </div>
                </div>

            </div>

        </div>
    </div>


    <div class="page-wrap">
        <div class="page skill">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="main-title">
                            <h2 class="title-h2 title-h2--mb text-center">TEXNİKİ BACARIQLAR</h2>
                        </div>
                    </div>

                    <div class="col-xl-6">

                        <div class="skill-block">
                            <h3>Web | Proqramlaşdırma</h3>

                            <div class="skill-block__main">

                                <?php

                                $skills = $db->prepare("SELECT * FROM `skill` WHERE `side` = 1 AND `s_id` = 1");
                                $skills->execute();

                                while ($skill = $skills->fetch(PDO::FETCH_ASSOC)) {
                                    ?>
                                        <div class="skill-block__item">
                                        <h4><?php echo $skill['title'] ?> <span class="skill-block__count">
                                                <?php echo $skill['percent'] ?></span>%</h4>
                                        <div class="skill-block__progress">
                                            <div class="progress-bar hidden" role="progressbar" aria-valuenow="<?php echo $skill['percent'] ?>"
                                                 aria-valuemin="0"
                                                 aria-valuemax="100" style="width: <?php echo $skill['percent'] ?>%;"></div>
                                        </div>
                                    </div>
                                    <?php
                                }
                                ?>



                            </div>


                        </div>
                    </div>
                    <div class="col-xl-6">

                        <div class="skill-block">
                            <h3>Köməkçi Vasitələr</h3>
                            <div class="skill-block__main">
                                <?php

                                $skills = $db->prepare("SELECT * FROM `skill` WHERE `side` = 2 AND `s_id` = 1");
                                $skills->execute();

                                while ($skill = $skills->fetch(PDO::FETCH_ASSOC)) {
                                    ?>
                                    <div class="skill-block__item">
                                        <h4><?php echo $skill['title'] ?> </h4>

                                        <div class="skill-block__progress">
                                            <div class="progress-bar hidden" role="progressbar" aria-valuenow="<?php echo $skill['percent'] ?>"
                                                 aria-valuemin="0"
                                                 aria-valuemax="100" style="width: 100%;"></div>
                                        </div>
                                    </div>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
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
                        <li class="element-item cat-2">
                            <a href="" class="portfolio__item">
                                <img class="portfolio__img" src="./assets/image/portfolio/port3.webp" alt="">
                                <div class="portfolio__content">giveaway.az</div>
                            </a>
                        </li>

                        <li class="element-item  cat-2">
                            <a href="" class="portfolio__item">
                                <img class="portfolio__img" src="./assets/image/portfolio/port1.webp" alt="">
                                <div class="portfolio__content">giveaway.az</div>
                            </a>
                        </li>

                        <li class="element-item cat-1 cat-3">
                            <a href="" class="portfolio__item">
                                <img class="portfolio__img" src="./assets/image/portfolio/port2.webp" alt="">
                                <div class="portfolio__content">giveaway.az</div>
                            </a>
                        </li>

                        <li class="element-item cat-1 cat-2">
                            <a href="" class="portfolio__item">
                                <img class="portfolio__img" src="./assets/image/portfolio/port2.webp" alt="">
                                <div class="portfolio__content">giveaway.az</div>
                            </a>
                        </li>

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

                    <div class="col-xl-4 blog__item">

                        <a href="" class="blog__img">
                            <img src="./assets/image/blog/24.png" alt="">

                            <div class="blog__content">
                                <div class="blog__title">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi
                                    dignissimos dolorem ipsum nisi non praesentium quam quas soluta ut, veniam.
                                </div>
                            </div>

                        </a>


                    </div>

                    <div class="col-xl-4 blog__item">

                        <a href="" class="blog__img">
                            <img src="./assets/image/blog/24.png" alt="">

                            <div class="blog__content">
                                <div class="blog__title">Lorem ipsum dolor sit amet, consectetur adipisicing.</div>
                            </div>

                        </a>


                    </div>

                    <div class="col-xl-4 blog__item">

                        <a href="" class="blog__img">
                            <img src="./assets/image/blog/24.png" alt="">

                            <div class="blog__content">
                                <div class="blog__title">Lorem ipsum dolor sit.</div>
                            </div>

                        </a>


                    </div>

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

                    <div class="col-xl-3 ">
                        <a href="" class="book-wrap__item">
                            <img src="./assets/image/book/Kompüter_texnikası_və_proqramlaşdırma.jpg" alt="">
                        </a>
                    </div>

                    <div class="col-xl-3 ">
                        <a href="" class="book-wrap__item">
                            <img src="./assets/image/book/Kompüter_və_İnformasiya-kommunikasiya_Texnologiyaları.png"
                                 alt="">
                        </a>
                    </div>

                    <div class="col-xl-3 ">
                        <a href="" class="book-wrap__item">
                            <img src="./assets/image/book/Scratch_2.0_Proqramlaşdırma_Dili_1-ci_Hissə.jpg" alt="">
                        </a>
                    </div>

                    <div class="col-xl-3 ">
                        <a href="" class="book-wrap__item">
                            <img src="./assets/image/book/Kompüter_texnikası_və_proqramlaşdırma.jpg" alt="">
                        </a>
                    </div>

                </div>
            </div>
        </div>

        <div class="page contact">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="main-title">
                            <h2 class="title-h2 title-h2--mb text-center text-uppercase">Əlaqə</h2>
                            <p class="main__title"> Sayt sifarish vermek isteyirsinizse zehmet olmasa </p>
                        </div>
                    </div>

                    <form action="" class="contact-form">

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
                            <select class="group__select active" name="" id="">
                                <option value="">Bilinmir</option>
                                <option value="Vizitka tipli sayt">Vizitka tipli sayt</option>
                                <option value="Landing page">Landing page</option>
                                <option value="Bloq">Bloq</option>
                                <option value="Fərdi sayt">Fərdi sayt</option>
                                <option value="Korporativ sayt">Korporativ sayt</option>
                                <option value="Kataloq tipli sayt">Kataloq tipli sayt</option>
                                <option value="E-commerce">E-commerce</option>

                            </select>
                            <label class="group__label active">Saytın funksionalı seçin</label>
                        </div>

                        <p class="group__text">Sifarish vermek istediyiniz saytlar haqqinda etrafli meluman ve <strong>numune</strong>
                            saytlari qeyd ederdiniz</p>
                        <div class="group group--mb-xs group--w-100 ">

                            <textarea class="group__input height-100 contact-text" name="email" type="email"></textarea>
                            <label class="group__label">Qeyd </label>
                        </div>

                        <input type="submit" class="group__submit" id="contact-send" value="Göndər">

                    </form>

                </div>
            </div>
        </div>


    </div>


<?php require_once __DIR__ . './include/footer.php' ?>