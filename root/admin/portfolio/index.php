<?php
include_once __DIR__ . '/../include/header.php';
include_once __DIR__ . '/../include/menu.php';

$row = $db->prepare("SELECT * FROM `portfolio` ORDER by `id` DESC");
$row->execute();

?>

<div class="wui-content">
    <div class="wui-content-header">
        <a href="#" class="wui-side-menu-trigger"><i class="fa fa-bars"></i></a>
    </div>

    <div class="page">
        <div class="page-header">
            <div>Portfolio</div>
            <div><a class="btn btn-add btn-success" href="<?php echo $site_url; ?>/admin/portfolio/add.php"> <i
                            class="fa fa-plus"></i> Əlavə et </a></div>
        </div>
        <div class="page-main overflow">
            <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>S/s</th>
                    <th>Shekil</th>
                    <th>Bashliq</th>
                    <th>URL</th>
                    <th>Kategoriya</th>
                    <th>Status</th>
                    <th>Emeliyyat</th>
                </tr>
                </thead>
                <tbody>

                <?php
                    $s = 0;
                while ($e = $row->fetch(PDO::FETCH_ASSOC)) {
                    $s++
                    ?>
                    <tr>
                        <td><?php echo $s ?></td>
                        <td >
                            <img class="img-blog" src="<?php echo $site_url . '/admin/image/portfolio/' . $e['img'] ?>" alt="">
                        </td>
                        <td><?php echo $e['title'] ?></td>
                        <td><?php echo $e['url'] ?></td>
                        <td><?php echo $e['cat'] ?></td>

                        <td><i class="status-icon fa fa-toggle-<?php echo ($e['s_id'] == 1) ? 'on' : 'off'; ?>"></i>
                        </td>
                        <td>
                            <a class="edit-icon" href="<?php echo $site_url ?>/admin/portfolio/edit.php?id=<?php echo $e['id']; ?>">
                                <i class="fa fa-edit"></i>
                            </a>
                            <a class="delete-icon deleteItem confirm"  href="<?php echo $site_url ?>/admin/portfolio/delete.php?delete=<?php echo $e['id']; ?>">
                                <i class="fas fa-trash-alt"></i>
                            </a>
                        </td>
                    </tr>

                    <?php
                }
                ?>





                </tbody>
            </table>
        </div>
    </div>

</div>


<?php
include_once __DIR__ . '/../include/footer.php';


?>
