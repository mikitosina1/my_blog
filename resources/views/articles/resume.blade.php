@vite(['resources/js/pages/resume.js', 'resources/css/resume.css'])
<div class="content-block p-4 sm:p-8 dark:bg-gray-800 shadow sm:rounded-lg mt-8">
    <h2 class="text-gray-200">@lang('page.resume')</h2>
    <form method="POST" action="{{ route('pdf.generatePdf') }}" enctype="multipart/form-data" class="flex-row">
        @csrf
        <input type="hidden" id="type" name="type" value="Resume">
        <div class="string_1">
            <div class="left">

                <!-- Photo -->
                <div class="mt-4 step_2">
                    <x-input-label for="profile_photo" :value="__('page.resume_photo')" />
                    <x-photo-input id="profile_photo" class="block mt-1 w-full"
                                   type="file"
                                   name="profile_photo"
                                   :enctype="true" />
                </div>

                <!-- Name -->
                <div class="mt-4 step_1">
                    <x-input-label for="name" :value="__('page.name_and_lastname')" />
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- Phone -->
                <div class="mt-4 step_1">
                    <x-input-label for="phone" :value="__('page.phone')" />
                    <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')" autocomplete="phone" />
                </div>

                <!-- Email Address -->
                <div class="mt-4 step_1">
                    <x-input-label for="email" :value="__('page.email')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                </div>

                <!-- Additional field -->
                <div class="mt-4 step_1 additional">
                    <x-input-label for="additional0" :value="__('page.additional0')" />
                    <div class="row">
                        <x-text-input id="additional0" class="block mt-1 w-full" type="text" name="additional[0]" :value="old('additional0')" required autocomplete="additional0" />
                        <x-note>@lang('page.additional_note')</x-note>
                    </div>
                </div>

                <!-- Add Additional field button -->
                <a class="text-gray-800 personalized step_1 add_additional_field">
                    + @lang('page.add_field')
                </a>

                <!-- If Additional fields too much -->
                <div id="maxFieldsAlert" class="hidden alert">
                    @lang('page.max_fields_reached')
                </div>

                <!-- Top 10 Skills -->
                <div class="mt-4  step_2">
                    <x-input-label for="skills" :value="__('page.skills')" />
                    <div class="row">
                        <x-text-input id="skills" class="block mt-1 w-full" type="text" name="skills" :value="old('skills')" autocomplete="skills" />
                        <x-note>@lang('page.skills_note')</x-note>
                    </div>
                </div>
            </div>
            <div class="right">

                <!-- Country -->
                <div class="mt-4 step_1">
                    <x-input-label for="country" :value="__('page.country')" />
                    <x-text-input id="country" class="block mt-1 w-full" type="text" name="country" :value="old('country')" required autocomplete="country" />
                </div>

                <!-- City -->
                <div class="mt-4 step_1">
                    <x-input-label for="city" :value="__('page.city')" />
                    <x-text-input id="city" class="block mt-1 w-full" type="text" name="city" :value="old('city')" required autocomplete="address" />
                </div>

                <!-- Address -->
                <div class="mt-4 step_1">
                    <x-input-label for="address" :value="__('page.address')" />
                    <x-text-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address')" required autocomplete="address-level2" />
                </div>

                <!-- ZIP -->
                <div class="mt-4 step_1">
                    <x-input-label for="zip" :value="__('page.zip')" />
                    <x-text-input id="zip" class="block mt-1 w-full" type="text" name="zip" :value="old('zip')" required autocomplete="postal-code" />
                </div>

                <!-- Working Experience -->
                <div class="mt-4 step_2">
                    <x-input-label for="experience" :value="__('page.experience')" />
                    <x-text-input id="experience" class="block mt-1 w-full" type="text" name="experience[0]" :value="old('experience')" />
                </div>

                <!-- Add Working Experience -->
                <a class="text-gray-800 step_2 personalized add_experience">
                    + @lang('page.add_field')
                </a>

                <!-- If Additional fields too much -->
                <div id="maxFieldsAlert" class="hidden alert">
                    @lang('page.max_fields_reached')
                </div>

                <!-- Studying -->
                <div class="mt-4 step_2">
                    <x-input-label for="studying" :value="__('page.studying')" />
                    <x-text-input id="studying" class="block mt-1 w-full" type="text" name="studying" :value="old('studying')" />
                </div>

                <!-- Add Studying -->
                <a class="text-gray-800 step_2 personalized add_studying">
                    + @lang('page.add_field')
                </a>

                <!-- If Additional fields too much -->
                <div id="maxFieldsAlert" class="hidden alert">
                    @lang('page.max_fields_reached')
                </div>
            </div>
        </div>
        <div class="string_2">
            <div class="form-group row mb-0">
                <a class="text-gray-800 personalized prev">
                    << @lang('page.prev')
                </a>
                <a class="text-gray-800 personalized next">
                    >> @lang('page.next')
                </a>
                <button type="submit" class="text-gray-800 personalized print">
                    @lang('page.resume')
                </button>
            </div>
        </div>
    </form>
</div>
