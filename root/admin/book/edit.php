<?php
include_once __DIR__ . '/../include/header.php';
include_once __DIR__ . '/../include/menu.php';

/*$row = $db->prepare("SELECT * FROM `book`");
$row->execute();*/

if (isset($_GET['id'])) {

    $id_rew = $_GET['id'];

    $baza = $db->prepare("SELECT * FROM `book` WHERE `id` = '$id_rew' ");
    $baza->execute();
    $baza2 = $baza->fetch(PDO::FETCH_ASSOC);

    if (empty($baza2)) {
        header("Location: $site_url/admin/book/index.php");
    }

}


?>


<div class="wui-content">
    <div class="wui-content-header">
        <a href="#" class="wui-side-menu-trigger"><i class="fa fa-bars"></i></a>
    </div>

    <div class="page">
        <div class="page-header">
            Kitab deyishdir.
        </div>

        <div class="page-main">

            <form action="" method="POST" enctype="multipart/form-data">

                <div class="row">
                    <div class="col-xl-6 col-md-6 margin-center">
                        <label class="form-item">
                            <span class="form-item__title"> Kitab adı </span>
                            <input class="form-item__input" name="title" type="text"
                                   value="<?php echo $baza2['title'] ?>">
                        </label>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xl-6 col-md-6 margin-center">
                        <label class="form-item">
                            <span class="form-item__title"> Müəllif(lər)  </span>
                            <input class="form-item__input" name="author" type="text"
                                   value="<?php echo $baza2['author'] ?>">
                        </label>
                    </div>
                </div>


                <div class="row">
                    <div class="col-xl-6 col-md-6 margin-center">
                        <label class="form-item">
                            <span class="form-item__title"> Səhifə sayı </span>
                            <input class="form-item__input" name="page" type="text"
                                   value="<?php echo $baza2['page'] ?>">
                        </label>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xl-6 col-md-6 margin-center">
                        <label class="form-item">
                            <span class="form-item__title"> Kategoriya </span>
                            <input class="form-item__input" name="category" type="text"
                                   value="<?php echo $baza2['category'] ?>">
                        </label>
                    </div>
                </div>


                <div class="row">
                    <div class="col-xl-6 col-md-6 margin-center">
                        <input class="" type="file" name="fileToUpload" value="">
                        <div> <?php echo $baza2['file'] ?></div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-xl-6 col-md-6 margin-center">
                        <label class="form-item file-input">
                            <input class="choose" type="file" name="imgToUpload"
                                   value="">
                            <span class="button"> Şəkil seç </span>
                            <span class="label">
                                 <?php
                                 if (empty($baza2['image'])) {
                                     ?>
                                     Şəkil seçilməyib
                                     <?php
                                 }
                                 ?>
                        </label>

                        <div class="add-form__img-result">
                            <img class="" id="preview"
                                 src="<?php echo $site_url . '/admin/image/book/' . $baza2['image'] ?>"
                                 alt="your image"/>
                        </div>

                    </div>
                </div>


                <div class="row">
                    <div class="col-xl-6 col-md-6 margin-center">
                        <label class="form-item">


                            <input class="form-item__checkbox" <?php echo ($baza2['s_id'] == 1) ? 'checked' : ''; ?>
                                   name="s_id" type="checkbox" value="1">
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
    $page = $_POST['page'];
    $category = $_POST['category'];


//    print_r($_FILES['fileToUpload']);

    if ($_FILES['fileToUpload']['name'] != "") {

        // olchu
        $size = $_FILES['fileToUpload']['size'];
        $size = $size / (1024 * 1024);
        $size = round($size, 2);

        //format
        $format1 = $_FILES['fileToUpload']['type'];
        $format2 = explode('/', $format1);
        $format = $format2[1];
        $format = strtoupper($format);

        // file
        $file_name = $_FILES['fileToUpload']['name'];
        $file_tmp_name = $_FILES['fileToUpload']['tmp_name'];

        $target_dir = '../image/book/';
        $target_file = $target_dir . $file_name;

        move_uploaded_file($file_tmp_name, $target_file);
    } else {
        $size = $baza2['size'];
        $format = $baza2['format'];
        $file_name = $baza2['file'];
    }

    // shekil


    if ($_FILES['imgToUpload']['name'] != "") {
        $img_name = $_FILES['imgToUpload']['name'];
        $img_tmp_name = $_FILES['imgToUpload']['tmp_name'];

        $target_dir = '../image/book/';
        $target_file2 = $target_dir . $img_name;

        move_uploaded_file($img_tmp_name, $target_file2);
    } else {
        $img_name = $baza2['image'];
    }


    if (isset($_POST['s_id'])) {
        $s_id = $_POST['s_id'];
    } else {
        $s_id = 0;
    }


    /*     $sql = $db->prepare("INSERT INTO `book` (`author`, `size`, `title`, `page`, `format`, `file`, `image`, `category` , `s_id`)
                                                 VALUES ('$author','$size', '$title', '$page', '$format' ,'$file_name', '$img_name', '$category' ,'$s_id')");
         $sql->execute();*/


    $updt = $db->prepare("UPDATE `book` SET author=:author, size=:size, title=:title, page=:page, format=:format, file=:file,image=:image, category=:category, s_id=:s_id WHERE id='$id_rew'");
    $updt->execute(array('author' => $author, 'size' => $size, 'title' => $title, 'page' => $page, 'format' => $format, 'file' => $file_name, 'image' => $img_name, 'category' => $category, 's_id' => $s_id));


    header("Location: $site_url/admin/book/index.php");


}


?>

