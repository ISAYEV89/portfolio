Basic Slider
<div class="flexslider">
  <ul class="slides">
    <li>
      <img src="slide1.jpg" />
    </li>
    <li>
      <img src="slide2.jpg" />
    </li>
    <li>
      <img src="slide3.jpg" />
    </li>
    <li>
      <img src="slide4.jpg" />
    </li>
  </ul>
</div>
$(window).load(function() {
  $('.flexslider').flexslider({
    animation: "slide"
  });
});

Plugin Url : http://flexslider.woothemes.com/index.html
