<head>
    <link type="text/css" rel="stylesheet" href="css/lightgallery.css" />
</head>

<script src="js/lightgallery.min.js"></script>

### HTML ###
<ul id="lightgallery" class="list-unstyled row">
    <li class="col-xs-6 col-sm-4 col-md-3" data-responsive="img/1-375.jpg 375, img/1-480.jpg 480, img/1.jpg 800" data-src="img/1-1600.jpg" data-sub-html="<h4>Fading Light</h4><p>Classic view from Rigwood Jetty on Coniston Water an old archive shot similar to an old post but a little later on.</p>">
        <a href="">
            <img class="img-responsive" src="img/thumb-1.jpg">
        </a>
    </li>
</ul>

### JavaScript ###
$(function () {
    $( '[data-lightgallery]' ).lightGallery();
})