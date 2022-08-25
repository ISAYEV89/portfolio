import $ from 'jquery'


$(document).ready(function () {


    ////group input

    function checkGroupInputValue(className) {
        let name = $('.' + className);
        let nameLength = name.length;
        if (nameLength > 0) {
            for (let i = 0; i < name.length; i++) {
                let valueLength = $(name[i]).val().length;
                if (valueLength > 0) {
                    $(name[i]).siblings('label').addClass('active');
                    $(name[i]).addClass('active');
                }
            }
        }
    }

    checkGroupInputValue('group__input');
    checkGroupInputValue('group__select');

    $(document).on('focusin', '.group__input', function () {
        $(this).siblings('label').addClass('active');
        $(this).addClass('active');
    });

    $(document).on('focusout', '.group__input', function () {
        let $this = $(this);
        let value = $(this).val();
        if (value.length === 0) {
            $this.siblings('label').removeClass('active');
            $(this).removeClass('active');
        }
    });

    $(document).on('change', '.group__select', function () {

        let value = $(this).val();

        if (value !== "") {
            $(this).addClass('active')
        } else {
            $(this).removeClass('active')
        }
    });

    // progress bar animation

    var Animation = function (animationBar, percentage) {

        this.animationBar = animationBar;
        this.percentage = percentage;
        this.animationArray = null;
        this.animationOffset = null;
        this.labelArray = null;
        this.percentageArray = null;
        this.index = 0;
        this.initialize();
    };

    Animation.prototype.initialize = function () {
        this.animationArray = document.getElementsByClassName(this.percentage);
        if (this.animationOffset === null)
            this.animationOffset = [];

        if (this.labelArray === null)
            this.labelArray = [];

        if (this.percentageArray === null)
            this.percentageArray = [];
        this.setUpElements();
    };

    Animation.prototype.setUpElements = function () {

        for (var i = 0; i < this.animationArray.length; i++) {
            var elem = this.animationArray[i],
                offset = elem.offsetTop + document.getElementsByClassName(this.percentage)[0].clientHeight,
                percentage = $(this.animationArray[i]).data(this.percentage);
            this.animationOffset.push(offset);
            this.percentageArray.push(percentage);
            $(this.animationArray[i]).find('.label').html('Percentage: ' + percentage + '%');
        }
        this.attachListeners();
    }

    Animation.prototype.attachListeners = function () {
        $(window).on('scroll', this.onWindowScroll.bind(this));
    };

    Animation.prototype.onWindowScroll = function () {
        for (var i = 0; i < this.animationArray.length; i++) {
            if (window.pageYOffset >= this.animationOffset[this.index] - window.innerHeight) {
                this.showElement();
                this.index++;
            } else
                return;
        }
    };

    Animation.prototype.showElement = function () {
        var element = document.getElementsByClassName(this.percentage)[this.index];
        element.classList.remove('hidden');
        this.animateBar(element, this.percentageArray[this.index]);
    };

    Animation.prototype.animateBar = function (element, width) {

        var $element = $(element),
            className = ' p' + width;

        $element.find(this.animationBar).addClass(className);
    };

    new Animation('.animation-bar', 'progress-bar');

    //
    /* var scrollOffset = $(document).scrollTop();
     var con = $('.skill').offset().top;
     var containerOffset = con - window.innerHeight;


     if (scrollOffset > containerOffset) {
         $('.progress-bar').removeClass('hidden');
     }*/


    //// menu navbar


    const openedMenu = document.querySelector('.opened-menu');
    const closedMenu = document.querySelector('.closed-menu');
    const navbarMenu = document.querySelector('.navbar');
    const menuOverlay = document.querySelector('.overlay');


    openedMenu.addEventListener('click', toggleMenu);
    closedMenu.addEventListener('click', toggleMenu);
    menuOverlay.addEventListener('click', toggleMenu);

// Toggle Menu Function
    function toggleMenu() {
        navbarMenu.classList.toggle('active');
        menuOverlay.classList.toggle('active');
        document.body.classList.toggle('scrolling');
    }

    navbarMenu.addEventListener('click', (event) => {
        if (event.target.hasAttribute('data-toggle') && window.innerWidth <= 992) {
            // Prevent Default Anchor Click Behavior
            event.preventDefault();
            const menuItemHasChildren = event.target.parentElement;

            // If menuItemHasChildren is Expanded, Collapse It
            if (menuItemHasChildren.classList.contains('active')) {
                collapseSubMenu();
            } else {
                // Collapse Existing Expanded menuItemHasChildren
                if (navbarMenu.querySelector('.menu-item-has-children.active')) {
                    collapseSubMenu();
                }
                // Expand New menuItemHasChildren
                menuItemHasChildren.classList.add('active');
                const subMenu = menuItemHasChildren.querySelector('.sub-menu');
                subMenu.style.maxHeight = subMenu.scrollHeight + 'px';
            }
        }
    });





    // anchor same page slowly


    $('.js-anchor-link').click(function(e){
        e.preventDefault();
        var target = $($(this).attr('href'));
        if(target.length){
            var scrollTo = target.offset().top;
            $('body, html').animate({scrollTop: scrollTo+'px'}, 800);
        }
    });
});