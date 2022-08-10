import $ from 'jquery'

$(document).ready(function () {


    // tabs

    $('ul.tabs li').click(function () {
        var tab_id = $(this).attr('data-tab');

        $('ul.tabs li').removeClass('current');
        $('.tab-content').removeClass('current');

        $(this).addClass('current');
        $("#" + tab_id).addClass('current');
    });


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


});