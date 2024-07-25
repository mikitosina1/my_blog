import './bootstrap';
import $ from 'jquery';
import Alpine from 'alpinejs';

window.Alpine = Alpine;
Alpine.start();
window.$ = $;

async function initializeEditor() {
	try {
		const { default: ClassicEditor } = await import('@ckeditor/ckeditor5-build-classic');

		const editor = await ClassicEditor.create(document.querySelector('#editor'), {
			// Пример настроек конфигурации CKEditor
			toolbar: ['heading', '|', 'bold', 'italic', 'link'],
			heading: {
				options: [
					{ model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
					{ model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
					{ model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' },
				]
			}
		});
		console.log(editor);
	} catch (error) {
		console.error(error);
	}
}

initializeEditor();
