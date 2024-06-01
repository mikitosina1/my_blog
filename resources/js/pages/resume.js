import './../bootstrap';

document.addEventListener('DOMContentLoaded', function () {
    const prev = $('.prev');
    const next = $('.next');
    const print = $('.print');
    const step_1 = $('.step_1');
    const step_2 = $('.step_2');

    next.click(function () {
        next.hide();
        prev.css('display', 'flex');
        print.show();
        step_1.hide();
        step_2.css('display', 'flex');
        step_2.css('flex-direction', 'column');
    });

    prev.click(function () {
        next.css('display', 'flex');
        prev.hide();
        print.hide();
        step_1.css('display', 'flex');
        step_1.css('flex-direction', 'column');
        step_2.hide();
    });
});
