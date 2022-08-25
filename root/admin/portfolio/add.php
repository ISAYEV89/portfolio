<?php
include_once __DIR__ . '/../include/header.php';
include_once __DIR__ . '/../include/menu.php';

$row = $db->prepare("SELECT * FROM `portfolio`");
$row->execute();

?>


<div class="wui-content">
    <div class="wui-content-header">
        <a href="#" class="wui-side-menu-trigger"><i class="fa fa-bars"></i></a>
    </div>

    <div class="page">
        <div class="page-header">
            Portfolio əlavə et.
        </div>

        <div class="page-main">

            <form action="" method="POST" enctype="multipart/form-data">

                <div class="row">
                    <div class="col-xl-6 col-md-6 margin-center">
                        <label class="form-item">
                            <span class="form-item__title"> Sayt adi </span>
                            <input class="form-item__input" name="title" type="text"
                                   value="">
                        </label>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xl-6 col-md-6 margin-center">
                        <label class="form-item">
                            <span class="form-item__title"> URL  </span>
                            <input class="form-item__input" name="url" type="text"
                                   value="">
                        </label>
                    </div>
                </div>


                <div class="row">
                    <div class="col-xl-6 col-md-6 margin-center">
                        <label class="form-item">
                            <span class="form-item__title"> Kategoriya </span> <br>

                            <select id="multiple" multiple class="select2 w-100" name="category[]">
                                <option value="cat-1">Front-end</option>
                                <option value="cat-2">Back-end</option>
                                <option value="cat-3">Diger</option>
                            </select>

                        </label>
                    </div>
                </div>


                <div class="row">
                    <div class="col-xl-6 col-md-6 margin-center">
                        <div class="add-form__img">
                            <label for="addImageInput" class="add-form__img-input">
                                <span class="btn-submit"><i class="far fa-image"></i>Shekil sech</span>
                                <input type='file' name="fileToUpload" hidden id="addImageInput">
                            </label>

                            <div class="add-form__img-result">
                                <img class="d-none" id="blah" src="" alt="your image"/>
                            </div>
                        </div>
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

<!-- jQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- Select2 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script>

    $("#multiple").select2({
        allowClear: true
    });
</script>


<?php
include_once __DIR__ . '/../include/footer.php';

if (isset($_POST['btn_submit'])) {

    $title = $_POST['title'];
    $category = $_POST['category'];
    $url = $_POST['url'];


    $img_name = $_FILES['fileToUpload']['name'];
    $img_size = $_FILES['fileToUpload']['size'];
    $tmp_name = $_FILES['fileToUpload']['tmp_name'];
    $error = $_FILES['fileToUpload']['error'];

    $img = $img_name;


    $target_dir = '../image/portfolio/';
    $target_file = $target_dir . $img;
    move_uploaded_file($tmp_name, $target_file);


    $cat = '';
    foreach ($category as $key => $val) {
        $cat .= $val . ',';
    }


    if (isset($_POST['s_id'])) {
        $s_id = $_POST['s_id'];
    } else {
        $s_id = 0;
    }


    $sql = $db->prepare("INSERT INTO `portfolio` (  `title`, `img`, `cat` , `url`, `s_id`)
                                            VALUES ( '$title',  '$img', '$cat' , '$url','$s_id')");
    $sql->execute();



    header("Location: $site_url/admin/portfolio/index.php");


}


?>

