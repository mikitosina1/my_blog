<!DOCTYPE html>
@vite(['resources/css/app.css','resources/css/welcome.css'])
<x-app-layout>
	<div class="carpet">
		@include('articles.resume')
		@include('articles.test')
	</div>
</x-app-layout>
