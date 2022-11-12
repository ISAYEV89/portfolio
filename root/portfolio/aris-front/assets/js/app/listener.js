/* DOCUMENT INFORMATION
 - Document: Theme_Name
 - Version:  1.0.0
 - Client:   Client_Name
 - Author:   Emin Azeroglu
 */

$ ( function () {

    /* Loading Bock Close */
    $(document).ready(function () {
        Events.LoadingBlockClose();
        $('body').on('click', 'a[href]', function () {
            if (!$(this).attr('download') &&
                !$(this).attr('target') &&
                !$('.carousel-control-prev') &&
                !$('.carousel-control-next') &&
                !$(this).attr('data-no-load')
            ) {
                Events.LoadingBlockOpen();
            }
        });
    });

    /* Click */
    $('body').on('click', '[data-event-click]', function (e) {
        e.preventDefault();
        const MethodName = $(this).attr('data-event-click');
        Events[MethodName]($(this), e);
    });

    /* Submit */
    $('body').on('submit', '[data-event-submit]', function (e) {
        e.preventDefault();
        const MethodName = $(this).attr('data-event-submit');
        Events[MethodName]($(this), e);
    });

    /* Keyup */
    $('body').on('keyup', '[data-event-keyup]', function (e) {
        e.preventDefault();
        const MethodName = $(this).attr('data-event-keyup');
        Events[MethodName]($(this), e);
    });

    /* Keydown */
    $('body').on('keydown', '[data-event-keydown]', function (e) {
        e.preventDefault();
        const MethodName = $(this).attr('data-event-keydown');
        Events[MethodName]($(this), e);
    });

    /* Keypress */
    $('body').on('keypress', '[data-event-keypress]', function (e) {
        e.preventDefault();
        const MethodName = $(this).attr('data-event-keypress');
        Events[MethodName]($(this), e);
    });

    /* Input */
    $('body').on('input', '[data-event-input]', function (e) {
        e.preventDefault();
        const MethodName = $(this).attr('data-event-input');
        Events[MethodName]($(this), e);
    });

    /* Change */
    $('body').on('change', '[data-event-change]', function (e) {
        e.preventDefault();
        const MethodName = $(this).attr('data-event-change');
        Events[MethodName]($(this), e);
    });

    /* Load */
    $('body').on('load', '[data-event-load]', function (e) {
        e.preventDefault();
        const MethodName = $(this).attr('data-event-load');
        Events[MethodName]($(this), e);
    });

    /* Focus */
    $('body').on('focus', '[data-event-focus]', function (e) {
        e.preventDefault();
        const MethodName = $(this).attr('data-event-focus');
        Events[MethodName]($(this), e);
    });

} );