<script src="assets/plugin/masonry/masonry.min.js"></script>

### HTML ###
<div class="grid" data-masonry='{ "itemSelector": ".grid-item", "columnWidth": 200 }'>
  <div class="grid-item"></div>
  <div class="grid-item"></div>
</div>

### JavaScript ###
$('.grid').masonry({
  // options...
  itemSelector: '.grid-item',
  columnWidth: 200
});

plugin url: https://github.com/desandro/masonry