<?php
include_once __DIR__ . '/../include/header.php';
include_once __DIR__ . '/../include/menu.php';

$row = $db->prepare("SELECT * FROM `category`");
$row->execute();

?>


<div class="wui-content">
    <div class="wui-content-header">
        <a href="#" class="wui-side-menu-trigger"><i class="fa fa-bars"></i></a>
    </div>

    <div class="page">
        <div class="page-header">
            Kategoriya əlavə et.
        </div>

        <div class="page-main">

            <form action="" method="POST" enctype="multipart/form-data">

                <div class="row">
                    <div class="col-xl-6 col-md-6 margin-center">
                        <label class="form-item">
                            <span class="form-item__title"> Kategoriya adı </span>
                            <input class="form-item__input" name="title" type="text"
                                   value="">
                        </label>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xl-6 col-md-6 margin-center">
                        <label class="form-item">


                            <input checked
                                   class="form-item__checkbox" name="s_id" type="checkbox" value="1">
                            <span class="form-item__title"> Saytda görsənsin </span>
                        </label>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xl-6 col-md-6 margin-center">
                        <label class="form-item text-right">
                            <input class="form-item__submit" name="btn_submit" type="submit" value="Əlavə et">
                        </label>
                    </div>
                </div>

            </form>

        </div>
    </div>

</div>


<?php
include_once __DIR__ . '/../include/footer.php';

if (isset($_POST['btn_submit'])) {

    $title = $_POST['title'];
    $s_id = $_POST['s_id'];


    $sql = $db->prepare("INSERT INTO `category` (`title`,  `s_id`)
                                            VALUES ('$title','$s_id')");
    $sql->execute();

    echo "INSERT INTO `book` (`title`, `s_id`)
                                            VALUES ('$title','$s_id')";

    header("Location: $site_url/admin/category/index.php");


}


?>

