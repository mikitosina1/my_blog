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
    let step_4 = $('.step_4');

    const additionalFieldsMax = 3;
    let additionalFieldsCounter = 0;
    const additionalExpMax = 7;
    let additionalExpCounter = 0;
    const additionalStudMax = 3;
    let additionalStudCounter = 0;

    let step = 1;

    const initializeSteps = () => {
        step_1.show().css('flex-direction', 'column');
        step_2.hide();
        step_3.hide();
        step_4.hide();
        prev.hide();
        print.hide();
    };

    const toggleStepVisibility = (direction) => {
        step = direction === 'next' ? step + 1 : step - 1;

        prev.toggle(step > 1);
        next.toggle(step < 4);
        print.toggle(step === 4);

        [step_1, step_2, step_3, step_4].forEach((el, index) => {
            el.toggle(step === index + 1).css('display', step === index + 1 ? 'flex' : 'none').css('flex-direction', 'column');
        });
    };

    const reinitializeSelectors = () => {
        step_1 = $('.step_1');
        step_2 = $('.step_2');
        step_3 = $('.step_3');
        step_4 = $('.step_4');
    };

    initializeSteps();

    next.click(() => toggleStepVisibility('next'));
    prev.click(() => toggleStepVisibility('prev'));

    const createCloseButton = (block, counterType) => {
        let closeButton = $('<div class="close"></div>').html(`
            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed">
                <path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z"/>
            </svg>
        `);
        closeButton.click(function() {
            if (counterType === 'experience') additionalExpCounter--;
            if (counterType === 'studying') additionalStudCounter--;
            if (counterType === 'additional') additionalFieldsCounter--;
            block.remove();
            // reinitializeSelectors();
        });
        return closeButton;
    };

    const updateFieldAttributes = (field, prefix, index) => {
        field.find('label, input, textarea').each(function() {
            const forAttr = $(this).attr('for');
            const idAttr = $(this).attr('id');
            const nameAttr = $(this).attr('name');

            if (forAttr) {
                let newFor = forAttr.replace(/\d+$/, '') + index;
                $(this).attr('for', newFor);
            }

            if (idAttr) {
                let newId = idAttr.replace(/\d+$/, '') + index;
                $(this).attr('id', newId);
            }

            if (nameAttr) {
                let newName = nameAttr.replace(/\[\d+\]/, `[${index}]`);
                $(this).attr('name', newName);
            }
        });
    };

    const createCopyField = (field, button) => {
        let lastAdditionalBlockCopy = field.clone();
        lastAdditionalBlockCopy.find('.close').remove(); // Remove existing close button

        if (!field.first().hasClass('additional')) {
            if (field.first().hasClass('experience')) {
                additionalExpCounter++;
                updateFieldAttributes(lastAdditionalBlockCopy, 'experience', additionalExpCounter);
            } else if (field.first().hasClass('studying')) {
                additionalStudCounter++;
                updateFieldAttributes(lastAdditionalBlockCopy, 'studying', additionalStudCounter);
            }
            lastAdditionalBlockCopy.find('.legend').after(createCloseButton(lastAdditionalBlockCopy, field.first().attr('class').split(' ')[2]));
            return button.before(lastAdditionalBlockCopy);
        } else {
            additionalFieldsCounter++;
            let num = additionalFieldsCounter;
            let tag = `additional${num}`;
            let name = `additional[${num}]`;
            lastAdditionalBlockCopy.find('label').attr('for', tag).text(`Additional ${num}`);
            lastAdditionalBlockCopy.find('input').attr({ id: tag, name: name, autocomplete: name });
            lastAdditionalBlockCopy.find('.note-container').html(createCloseButton(lastAdditionalBlockCopy, 'additional'));
            return button.before(lastAdditionalBlockCopy);
        }
    };

    addAdditionalFieldBtn.click(function () {
        if (additionalFieldsCounter < additionalFieldsMax) {
            createCopyField($('.additional').last(), addAdditionalFieldBtn);
            reinitializeSelectors();
        } else {
            dropFieldCountError();
        }
    });

    addAdditionalExp.click(function () {
        if (additionalExpCounter < additionalExpMax) {
            createCopyField($('.experience').last(), addAdditionalExp);
            reinitializeSelectors();
        } else {
            dropFieldCountError();
        }
    });

    addAdditionalStudying.click(function () {
        if (additionalStudCounter < additionalStudMax) {
            createCopyField($('.studying').last(), addAdditionalStudying);
            reinitializeSelectors();
        } else {
            dropFieldCountError();
        }
    });

    function dropFieldCountError() {
        return $('#maxFieldsAlert').removeClass('hidden').delay(8000).queue(function (next) {
            $(this).addClass('hidden');
            next();
        });
    }
});
