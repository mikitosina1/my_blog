@vite(['resources/js/ck_editor.js'])
<div class="content-block p-4 sm:p-8 dark:bg-gray-800 shadow sm:rounded-lg mt-8">
	<form method="POST" action="posts/save">
		@csrf
		<textarea name="content" id="editor">
			@lang('basic.your_text')
		</textarea>
		<button type="submit" class="text-gray-800 personalized">@lang('basic.save')</button>
	</form>
</div>
