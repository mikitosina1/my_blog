@vite(['resources/css/app.css','resources/css/welcome.css'])
<x-app-layout>
    <div class="carpet">
        <div class="content-block p-4 sm:p-8 dark:bg-gray-800 shadow sm:rounded-lg mt-8">
            <h2 class="text-gray-200">@lang('pdf.resume')</h2>
            <form method="POST" action="{{ route('pdf.generatePdf') }}">
                @csrf
                <input type="hidden" id="type" name="type" value="Resume">
                <div class="form-group row mb-0">
                    <button type="submit" class="text-gray-800 personalized">
                        @lang('pdf.get_test')
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
