import './../bootstrap';

document.addEventListener('DOMContentLoaded', function () {
    const prev = $('.prev');
    const next = $('.next');
    const print = $('.print');
    const addAdditionalFieldBtn = $('.add_additional_field');
    const addAdditionalStudying = $('.add_studying');
    const addAdditionalExp = $('.add_experience');
    let step_1 = $('.step_1');
    let step_2 = $('.step_2');
    let step_3 = $('.step_3');
    const aFieldMax = 3;
    let addFieldsCounter = 0;
    let step = 1;

    const initializeSteps = () => {
        step_1.show().css('flex-direction', 'column');
        step_2.hide();
        step_3.hide();
        prev.hide();
        print.hide();
    };

    const toggleStepVisibility = (direction) => {
        if (direction === 'next') step++;
        else step--;

        prev.toggle(step > 1);
        next.toggle(step < 3);
        print.toggle(step === 3);

        step_1.toggle(step === 1).css('flex-direction', 'column');
        step_2.toggle(step === 2).css('flex-direction', 'column');
        step_3.toggle(step === 3).css('flex-direction', 'column');
    };

    const reinitializeSelectors = () => {
        step_1 = $('.step_1');
        step_2 = $('.step_2');
        step_3 = $('.step_3');
    };

    initializeSteps();

    next.click(() => toggleStepVisibility('next'));
    prev.click(() => toggleStepVisibility('prev'));

    addAdditionalFieldBtn.click(function () {
        if (addFieldsCounter < aFieldMax) {
            addFieldsCounter++;
            const lastAdditionalBlock = $('.additional').last();
            const lastAdditionalBlockCopy = lastAdditionalBlock.clone();
            const num = parseInt(lastAdditionalBlock.children('label').attr('for').match(/(\d+)$/)[1]) + 1;
            const tag = `additional${num}`;
            const name = `additional[${num}]`;
            const text = lastAdditionalBlockCopy.children('label').text().replace(/\d+/g, '') + num;

            lastAdditionalBlockCopy.children('label').attr('for', tag).text(text);
            lastAdditionalBlockCopy.find('input').attr({ id: tag, name: name, autocomplete: name });

            addAdditionalFieldBtn.before(lastAdditionalBlockCopy);

            reinitializeSelectors();
        } else {
            $('#maxFieldsAlert').removeClass('hidden').delay(8000).queue(function (next) {
                $(this).addClass('hidden');
                next();
            });
        }
    });
});
