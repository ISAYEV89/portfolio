<?php
include_once __DIR__ . '/../include/header.php';
include_once __DIR__ . '/../include/menu.php';


if (isset($_GET['id'])) {
    $id_rew = $_GET['id'];

    $baza = $db->prepare("SELECT * FROM `skill` WHERE `id` = '$id_rew' ");
    $baza->execute();
    $baza2 = $baza->fetch(PDO::FETCH_ASSOC);

    if (empty($baza2)) {
        $id_rew = 0;
    }
} else {
    $id_rew = 0;
}


echo $id_rew;

?>


<div class="wui-content">
    <div class="wui-content-header">
        <a href="#" class="wui-side-menu-trigger"><i class="fa fa-bars"></i></a>
    </div>

    <div class="page">
        <div class="page-header">
            <span> Bacariq elave et.</span>
            <div><a class="btn btn-add btn-success" href="<?php echo $site_url; ?>/admin/skill/index.php"> GERI </a>
            </div>

        </div>

        <div class="page-main">

            <form action="" method="POST" enctype="multipart/form-data">

                <div class="row">
                    <div class="col-xl-6 col-md-6 margin-center">
                        <label class="form-item">
                            <span class="form-item__title"> Bacariq </span>
                            <input required class="form-item__input" name="title" type="text"
                                   value="<?php echo (!empty($baza2['title'])) ? $baza2['title'] : ''; ?>">
                        </label>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xl-6 col-md-6 margin-center">
                        <label class="form-item">
                            <span class="form-item__title"> Faiz </span>
                            <input required class="form-item__input" name="percent" type="text"
                                   value="<?php echo (!empty($baza2['percent'])) ? $baza2['percent'] : ''; ?>">
                        </label>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xl-6 col-md-6 margin-center">
                        <span class="form-item__title"> Teref </span> <br>
                          <input type="radio" <?php echo ($baza2['side'] == 1) ? 'checked' : '' ?> id="html" name="side" value="1">
                          <label for="html">Programlashdirma</label><br>
                          <input type="radio" <?php echo ($baza2['side'] == 2) ? 'checked' : '' ?> id="css" name="side" value="2">
                          <label for="css">Diger</label><br>
                    </div>
                </div>


                <div class="row">
                    <div class="col-xl-6 col-md-6 margin-center">
                        <label class="form-item">

                            <?php
                            if ($id_rew == 0) {
                                $check = 1;

                            } else {
                                $check = $baza2['s_id'];
                            }

                            ?>

                            <input <?php echo ($check == 1) ? 'checked' : ''; ?> class="form-item__checkbox" name="s_id"
                                                                                 type="checkbox" value="1">
                            <span class="form-item__title"> Saytda görsənsin </span>
                        </label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-6 col-md-6 margin-center">
                        <?php
                        if (isset($_SESSION['message'])) {
                            ?>
                            <div class="error-msg">
                                <p class="error-msg__lead"> <?php echo $_SESSION['message'] ?> </p>
                            </div>

                            <?php
                            unset($_SESSION['message']);
                        }
                        ?>

                        <div class="error-msg d-none">
                            <p class="error-msg__lead">Text bölməsi doldurulmalıdır.</p>
                        </div>

                    </div>
                </div>

                <div class="row">
                    <div class="col-xl-6 col-md-6 margin-center text-right">
                        <input class="form-item__submit" id="sub" name="btn_submit" type="submit" value="Əlavə et">
                    </div>
                </div>


            </form>

        </div>
    </div>

</div>


<?php
include_once __DIR__ . '/../include/footer.php';

if (isset($_POST['btn_submit'])) {


    $title = trim($_POST['title']);
    $percent = trim($_POST['percent']);
    $side = trim($_POST['side']);


    if (isset($_POST['s_id'])) {
        $s_id = $_POST['s_id'];
    } else {
        $s_id = 0;
    }

    if ($title == "" || $percent == "") {
        $_SESSION['message'] = 'Text bölməsi doldurulmalıdır.';
        header("Location: $site_url/admin/skill/add.php");

    } else {
        if ($id_rew == 0) {
            $sql = $db->prepare("INSERT INTO `skill` (`title`, `percent`, `side` ,`s_id`)
                                           VALUES ('$title','$percent', '$side' ,'$s_id')");
            $sql->execute();
        } else {
            $updt = $db->prepare("UPDATE `skill` SET title=:title, percent=:percent, side=:side ,s_id=:s_id WHERE id='$id_rew'");
            $updt->execute(array('title' => $title, 'percent' => $percent, 'side' => $side,'s_id' => $s_id));
        }

        header("Location: $site_url/admin/skill/index.php");
    }


}


?>


<script>


</script>