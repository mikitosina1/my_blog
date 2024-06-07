@vite(['resources/js/pages/resume.js', 'resources/css/resume.css'])
<div class="content-block p-4 sm:p-8 dark:bg-gray-800 shadow sm:rounded-lg mt-8">
    <h2 class="text-gray-200">@lang('page.resume')</h2>
    <form method="POST" action="{{ route('pdf.generatePdf') }}" enctype="multipart/form-data" class="flex-row">
        @csrf
        <input type="hidden" id="type" name="type" value="Resume">
        <div class="string_1">
            <div class="left">

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

                <!-- Photo -->
                <div class="mt-4 step_2">
                    <x-input-label for="profile_photo" :value="__('page.resume_photo')" />
                    <x-photo-input id="profile_photo" class="block mt-1 w-full"
                                   type="file"
                                   name="profile_photo"
                                   :enctype="true" />
                </div>

                <!-- Top 10 Skills -->
                <div class="mt-4  step_2 step_2 skill_block__main">
                    <x-input-label for="skills" :value="__('page.skills')" />
                    <div class="row">
                        <x-text-input id="skills" class="block mt-1 w-full" type="text" name="skills" :value="old('skills')" autocomplete="skills" />
                        <x-note>@lang('page.skills_note')</x-note>
                    </div>
                </div>

                <!-- Add Skill -->
                <a class="text-gray-800 step_2 personalized add_skill">
                    + @lang('page.add_skill')
                </a>

                <!-- Working Experience -->
                <div class="mt-4 step_3 bordered experience">
                    <div class="legend">{{__('page.experience')}}</div>
                    <x-input-label for="experience0" :value="__('page.company')" />
                    <x-text-input id="experience0" class="block mt-1 w-full" type="text" name="experience[0][title]" :value="old('experience')" />
                    <x-input-label for="experience_desc0" :value="__('page.description')" />
                    <x-textarea-input id="experience_desc0" class="block mt-1 w-full" type="textarea" name="experience[0][description]" :value="old('experience')" />
                </div>

                <!-- Add Working Experience -->
                <a class="text-gray-800 step_3 personalized add_experience">
                    + @lang('page.add_field')
                </a>

                <!-- Studying -->
                <div class="mt-4 step_4 bordered studying">
                    <div class="legend">{{__('page.studying')}}</div>
                    <x-input-label for="studying" :value="__('page.education_inst')" />
                    <x-text-input id="studying" class="block mt-1 w-full" type="text" name="studying[0][title]" :value="old('studying')" />
                    <x-input-label for="studying_desc" :value="__('page.description')" />
                    <x-textarea-input id="studying_desc" class="block mt-1 w-full" type="textarea" name="studying[0][description]" :value="old('studying_desc')" />
                </div>

                <!-- Add Studying -->
                <a class="text-gray-800 step_4 personalized add_studying">
                    + @lang('page.add_field')
                </a>

                <!-- Certificates -->
                <div class="mt-4 step_5 bordered certificates">
                    <div class="legend">{{__('page.certificates')}}</div>
                    <x-input-label for="certificates" :value="__('page.certificates_title')" />
                    <x-text-input id="certificates" class="block mt-1 w-full" type="text" name="certificates[0][title]" :value="old('certificates')" />
                    <x-input-label for="certificates_desc" :value="__('page.certificates_url')" />
                    <x-textarea-input id="certificates_desc" class="block mt-1 w-full" type="textarea" name="certificates[0][description]" :value="old('certificates_desc')" />
                </div>

                <!-- Add Certificates -->
                <a class="text-gray-800 step_5 personalized add_certificates">
                    + @lang('page.add_field')
                </a>
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
