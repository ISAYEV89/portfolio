<?php
include_once __DIR__ . '/../include/header.php';
include_once __DIR__ . '/../include/menu.php';


if (isset($_GET['id'])) {

    $id_rew = $_GET['id'];

    $baza = $db->prepare("SELECT * FROM `category` WHERE `id` = '$id_rew' ");
    $baza->execute();
    $baza2 = $baza->fetch(PDO::FETCH_ASSOC);


    if (empty($baza2)) {
        header("Location: $site_url/admin/category/index.php");
    }

}

?>


<div class="wui-content">
    <div class="wui-content-header">
        <a href="#" class="wui-side-menu-trigger"><i class="fa fa-bars"></i></a>
    </div>

    <div class="page">
        <div class="page-header">
            <div>Katgoriya adini deyishdirmek</div>
        </div>
        <div class="page-main overflow">


            <div class="tag-add">


                <form action="" method="post">

                    <div class="container">

                        <div class="row">
                            <div class="col-xl-6 col-md-6 margin-center">
                                <label class="form-item">
                                    <span class="form-item__title"> Tag adı </span>
                                    <input class="form-item__input" name="title" type="text"
                                           value="<?php echo $baza2['title'] ?>">
                                </label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xl-6 col-md-6 margin-center">
                                <label class="form-item">

                                    <input
                                        <?php echo ($baza2['s_id'] == 1) ? 'checked' : ''; ?>
                                           class="form-item__checkbox" name="s_id" type="checkbox" value="1">
                                    <span class="form-item__title"> Saytda görsənsin </span>
                                </label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xl-6 col-md-6 margin-center">
                                <label class="form-item text-right">
                                    <input class="form-item__submit" name="btn_submit" type="submit" value="Deyishdir">
                                </label>
                            </div>
                        </div>

                    </div>
                </form>


            </div>

        </div>
    </div>

</div>


<?php


if (isset($_POST['btn_submit'])) {

    $title = $_POST['title'];

    if (isset($_POST['s_id'])) {
        $s_id = $_POST['s_id'];
    } else {
        $s_id = 0;
    }


    $updt = $db->prepare("UPDATE `category` SET title=:title , s_id=:s_id WHERE id='$id_rew'");
    $updt->execute(array('title' => $title, 's_id' => $s_id));
    header("Location: $site_url/admin/category/index.php");

}

include_once __DIR__ . '/../include/footer.php';
?>

