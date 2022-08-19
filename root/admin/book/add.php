<?php
include_once __DIR__ . '/../include/header.php';
include_once __DIR__ . '/../include/menu.php';

$row = $db->prepare("SELECT * FROM `book`");
$row->execute();

?>


<div class="wui-content">
    <div class="wui-content-header">
        <a href="#" class="wui-side-menu-trigger"><i class="fa fa-bars"></i></a>
    </div>

    <div class="page">
        <div class="page-header">
            Kitab əlavə et.
        </div>

        <div class="page-main">

            <form action="" method="POST" enctype="multipart/form-data">

                <div class="row">
                    <div class="col-xl-6 col-md-6 margin-center">
                        <label class="form-item">
                            <span class="form-item__title"> Kitab adı </span>
                            <input class="form-item__input" name="title" type="text"
                                   value="">
                        </label>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xl-6 col-md-6 margin-center">
                        <label class="form-item">
                            <span class="form-item__title"> Müəllif(lər)  </span>
                            <input class="form-item__input" name="author" type="text"
                                   value="">
                        </label>
                    </div>
                </div>


                <div class="row d-none">
                    <div class="col-xl-6 col-md-6 margin-center">
                        <label class="form-item">
                            <span class="form-item__title"> Format </span>
                            <input class="form-item__input" name="format" type="text"
                                   value="">
                        </label>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xl-6 col-md-6 margin-center">
                        <label class="form-item">
                            <span class="form-item__title"> Səhifə sayı </span>
                            <input class="form-item__input" name="page" type="text"
                                   value="">
                        </label>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xl-6 col-md-6 margin-center">
                        <label class="form-item">
                            <span class="form-item__title"> Kategoriya </span>
                            <input class="form-item__input" name="category" type="text"
                                   value="">
                        </label>
                    </div>
                </div>

                <div class="row d-none">
                    <div class="col-xl-6 col-md-6 margin-center">
                        <label class="form-item">
                            <span class="form-item__title"> Ölçü </span>
                            <input class="form-item__input" name="size" type="text"
                                   value="<?php echo (!empty($baza2['publication_date'])) ? $baza2['publication_date'] : ''; ?>">
                        </label>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xl-6 col-md-6 margin-center">
                        <input class="" type="file" name="fileToUpload" value="">
                    </div>
                </div>


                <div class="row">
                    <div class="col-xl-6 col-md-6 margin-center">
                        <label class="form-item file-input">
                            <input class="choose" type="file" name="imgToUpload"
                                   value="">
                            <span class="button"> Şəkil seç </span>
                            <span class="label">
                                Şəkil seçilməyib
                        </label>
                        <img id="preview"
                             src="">
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
    $author = $_POST['author'];
    $size = $_FILES['fileToUpload']['size'];
    $page = $_POST['page'];
    $format = $_FILES['fileToUpload']['type'];
    $category = $_POST['category'];


    $file_name = $_FILES['fileToUpload']['name'];
    $file_tmp_name = $_FILES['fileToUpload']['tmp_name'];
//    $error = $_FILES['fileToUpload']['error'];



    $target_dir = '../image/book/';
    $target_file = $target_dir . $file_name;

    move_uploaded_file($file_tmp_name, $target_file);

/// shekil

    $img_name = $_FILES['imgToUpload']['name'];
    $img_tmp_name = $_FILES['fileToUpload']['img_name'];

    $target_dir = '../image/book/';
    $target_file = $target_dir . $img_name;

    move_uploaded_file($img_tmp_name, $target_file);


    if (isset($_POST['s_id'])) {
        $s_id = $_POST['s_id'];
    } else {
        $s_id = 0;
    }


     $sql = $db->prepare("INSERT INTO `book` (`author`, `size`, `title`, `page`, `format`, `file`, `image`, `category` , `s_id`)
                                            VALUES ('$author','$size', '$title', '$page', '$format' ,'$file_name', '$img_name', '$category' ,'$s_id')");
     $sql->execute();

     echo "INSERT INTO `book` (`author`, `size`, `title`, `page`, `format`, `file`, `s_id`)
                                            VALUES ('$author','$size', '$title', '$page', '$format' ,'$file_name','$s_id')";

//    header("Location: $site_url/admin/book/index.php");


}


?>

