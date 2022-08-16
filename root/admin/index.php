<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">-->


    <link rel="stylesheet" href="css/bootstrap4.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.2/css/font-awesome.min.css">


    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">

    <title>Admin panel simple</title>
</head>
<body>

<div class="wui-side-menu open pinned" data-wui-theme="dark">
    <div class="wui-side-menu-header">
        <a href="#" class="wui-side-menu-trigger"><i class="fa fa-bars"></i></a>
        <a href="#" class="wui-side-menu-pin-trigger">
            <i class="fa fa-thumb-tack"></i>
        </a>
    </div>
    <ul class="wui-side-menu-items">
        <li>
            <a href="" class="wui-side-menu-item active">
                <i class="box-ico fa fa-music fa-fw"></i>
                <span class="box-title">Home</span>
            </a>
        </li>
        <li>
            <a href="" class="wui-side-menu-item">
                <i class="box-ico fa fa-list-ol fa-fw"></i>
                <span class="box-title">Projects</span>
            </a>
        </li>
        <li>
            <a href="" class="wui-side-menu-item ">
                <i class="box-ico fa fa-users fa-fw"></i>
                <span class="box-title">Messages</span>
            </a>
        </li>
        <li>
            <a href="" class="wui-side-menu-item ">
                <i class="box-ico fa fa-list-alt fa-fw"></i>
                <span class="box-title">Skills</span>
            </a>
        </li>
    </ul>
</div>
<div class="wui-content">
    <div class="wui-content-header">
        <a href="#" class="wui-side-menu-trigger"><i class="fa fa-bars"></i></a>

    </div>


    <div class="wui-content">
        <div class="wui-content-header">
            <a href="#" class="wui-side-menu-trigger"><i class="fa fa-bars"></i></a>
        </div>

        <div class="page">
            <div class="page-header">
                <div>Kitablar</div>
                <div><a class="btn btn-add btn-success" href="/admin/book-inner.php"> <i class="fa fa-plus"></i> Əlavə
                        et </a></div>
            </div>
            <div class="page-main overflow">
                <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>S/s</th>
                        <th>Şəkil</th>
                        <th>Qiymət endirim</th>
                        <th>Kitab haqqında</th>
                        <th>Əməliyyat</th>
                    </tr>
                    </thead>
                    <tbody>


                    <tr>
                        <td>55</td>
                        <td> AZN</td>
                        <td> AZN</td>
                        <td><i class="status-icon fa fa-toggle-on"></i>
                        </td>
                        <td>
                            <a class="edit-icon" href="/admin/book-inner.php">
                                <i class="fa fa-edit"></i>
                            </a>
                            <a class="delete-icon deleteItem"
                               href="/admin/book-delete.php">
                                <i class="fas fa-trash-alt"></i>
                            </a>
                        </td>
                    </tr>


                    </tbody>
                </table>
            </div>
        </div>

    </div>


</div>
<div class="wui-overlay"></div>

<script src="js/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script src="js/main.js"></script>
</body>
</html>