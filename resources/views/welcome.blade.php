@vite(['resources/css/app.css','resources/css/welcome.css','resources/js/welcome.js'])
<x-app-layout>
    <div class="carpet">
        <div class="content-block p-4 sm:p-8 dark:bg-gray-800 shadow sm:rounded-lg mt-8">
            <h2 class="text-gray-200">@lang('page.resume')</h2>
            <form method="POST" action="{{ route('pdf.generatePdf') }}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" id="type" name="type" value="Resume">

                <!-- Name -->
                <div>
                    <x-input-label for="name" :value="__('page.name_and_lastname')" />
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- Phone -->
                <div class="mt-4">
                    <x-input-label for="phone" :value="__('page.phone')" />
                    <x-text-input id="phone" class="block mt-1 w-full" type="phone" name="phone" :value="old('phone')" autocomplete="phone" />
                </div>

                <!-- Email Address -->
                <div class="mt-4">
                    <x-input-label for="email" :value="__('page.email')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                </div>

                <!-- New fields Container -->
                <div id="additional-fields-container"></div>

                <!-- Button to create New Field -->
                <div class="mt-4">
                    <button type="button" id="add-field-button" class="text-gray-800 personalized">
                        Добавить поле
                    </button>
                </div>

                <div class="form-group row mb-0">
                    <button type="submit" class="text-gray-800 personalized">
                        >> @lang('page.resume')
                    </button>
                </div>

                <!-- Photo -->
                <div class="mt-4">
                    <x-input-label for="profile_photo" :value="__('page.resume_photo')" />
                    <x-photo-input id="profile_photo" class="block mt-1 w-full"
                                   type="file"
                                   name="profile_photo"
                                   :enctype="true" />
                </div>

                <!-- Country -->
                <div>
                    <x-input-label for="country" :value="__('page.country')" />
                    <x-text-input id="country" class="block mt-1 w-full" type="text" name="country" :value="old('country')" required autocomplete="country" />
                </div>

                <!-- City -->
                <div>
                    <x-input-label for="city" :value="__('page.city')" />
                    <x-text-input id="city" class="block mt-1 w-full" type="text" name="city" :value="old('city')" required autocomplete="city" />
                </div>

                <!-- Address -->
                <div>
                    <x-input-label for="address" :value="__('page.address')" />
                    <x-text-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address')" required autocomplete="address" />
                </div>

                <!-- ZIP -->
                <div>
                    <x-input-label for="zip" :value="__('page.zip')" />
                    <x-text-input id="zip" class="block mt-1 w-full" type="text" name="zip" :value="old('zip')" required autocomplete="zip" />
                </div>

                <div class="form-group row mb-0">
                    <button type="submit" class="text-gray-800 personalized">
                        >> @lang('page.resume')
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
