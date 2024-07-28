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
			toolbar: ['heading', '|', 'bold', 'italic', 'strikethrough', 'subscript', 'superscript', '|', 'link', 'codeBlock', 'imageUpload'],
			heading: {
				options: [
					{ model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
					{ model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
					{ model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' },
					{ model: 'heading3', view: 'h3', title: 'Heading 3', class: 'ck-heading_heading3' },
					{ model: 'heading4', view: 'h4', title: 'Heading 4', class: 'ck-heading_heading4' },
					{ model: 'heading5', view: 'h5', title: 'Heading 5', class: 'ck-heading_heading5' },
				]
			}
		});
		console.log(editor);
	} catch (error) {
		console.error(error);
	}
}

initializeEditor();
