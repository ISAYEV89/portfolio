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

    $('.js-anchor-link').click(function (e) {
        e.preventDefault();
        var target = $($(this).attr('href'));
        if (target.length) {
            var scrollTo = target.offset().top;
            $('body, html').animate({scrollTop: scrollTo + 'px'}, 800);
        }
    });


    // header scroll background color
    $(window).on("scroll", function () {
        if ($(window).scrollTop() > 50) {
            $(".header").addClass("active");
        } else {
            //remove the background property so it comes transparent again (defined in your css)
            $(".header").removeClass("active");
        }
    });

    if ($(window).scrollTop() > 50) {
        $(".header").addClass("active");
    } else {
        //remove the background property so it comes transparent again (defined in your css)
        $(".header").removeClass("active");
    }

/// popup

    function showPopup(whichpopup) {
        var docHeight = $(document).height();
        var scrollTop = $(window).scrollTop();
        $('.overlay-bg').show().css({'height': docHeight});
        $('.overlay-bg').removeClass('d-none');
        $('.popup' + whichpopup).show().css({'top': scrollTop + 40 + 'px'});
    }

    // function to close our popups
    function closePopup() {
        $('.overlay-bg').addClass('d-none');

        $('.overlay-content').hide();
    }

    $('.show-popup').click(function (event) {
        event.preventDefault();
        var selectedPopup = $(this).data('showpopup');
        showPopup(selectedPopup);
    });

    $('.close-btn, .overlay-bg').click(function () {
        closePopup();
        $('.overlay-bg').addClass('d-none');
    });

    $(document).keyup(function (e) {
        if (e.keyCode == 27) {
            closePopup();
        }
    });


});