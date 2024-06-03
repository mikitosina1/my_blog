import './../bootstrap';

document.addEventListener('DOMContentLoaded', function () {
    const prev = $('.prev');
    const next = $('.next');
    const print = $('.print');
    const step_1 = $('.step_1');
    const step_2 = $('.step_2');
    const addAdditionalFieldBtn = $('.add_additional_field');
    const aFieldMax = 3;
    let addCounter = 0;

    step_2.hide();

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

    addAdditionalFieldBtn.click(function () {
        addCounter++;
        if (addCounter <= aFieldMax) {
            let lastAdditionalBlock = $('.additional').last();
            let lastAdditionalBlockCopy = lastAdditionalBlock.clone();
            let num = parseInt(lastAdditionalBlock.children('label').attr('for').match(/(\d+)$/)[1]) + 1;
            let tag = 'additional' + num;
            let name = 'additional[' + num + ']';
            let text = lastAdditionalBlockCopy.children('label').text().replace(/\d+/g, '') + (num + 1);

            lastAdditionalBlockCopy.children('label').attr({
                for: tag
            });
            lastAdditionalBlockCopy.children('label').text(text);
            lastAdditionalBlockCopy.children('div').children('input').attr({
                id: tag,
                name: name,
                autocomplete: name
            });

            addAdditionalFieldBtn.before(lastAdditionalBlockCopy);
        } else {
            $('#maxFieldsAlert').removeClass('hidden');
            setTimeout(function () {
                $('#maxFieldsAlert').addClass('hidden');
            }, 8000);
        }
    });
});
