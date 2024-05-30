import './bootstrap';

document.addEventListener('DOMContentLoaded', function () {
    let fieldCount = 0;
    const maxFields = 3;
    const addButton = document.getElementById('add-field-button');
    const container = document.getElementById('additional-fields-container');

    addButton.addEventListener('click', function () {
        if (fieldCount < maxFields) {
            fieldCount++;
            const newField = document.createElement('div');
            newField.classList.add('mt-4');
            newField.innerHTML = `
                <x-input-label for="additional_field_${fieldCount}" :value=" ${fieldCount}" />
                <x-text-input id="additional_field_${fieldCount}" class="block mt-1 w-full" type="text" name="additional_fields[]" />
            `;
            container.appendChild(newField);
        } else {
            alert('Вы можете добавить не более 3 дополнительных полей.');
        }
    });
});
