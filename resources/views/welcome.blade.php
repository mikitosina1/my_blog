@vite(['resources/css/app.css','resources/css/welcome.css'])
<x-app-layout>
    <div class="carpet">
        <div class="content-block p-4 sm:p-8 dark:bg-gray-800 shadow sm:rounded-lg mt-8">
            <h2 class="text-gray-200">@lang('page.resume')</h2>
            <form method="POST" action="{{ route('pdf.generatePdf') }}" enctype="multipart/form-data" class="flex-row">
                @csrf
                <input type="hidden" id="type" name="type" value="Resume">
                <div class="string_1">
                    <div class="left">

                        <!-- Photo -->
                        <div class="mt-4">
                            <x-input-label for="profile_photo" :value="__('page.resume_photo')" />
                            <x-photo-input id="profile_photo" class="block mt-1 w-full"
                                           type="file"
                                           name="profile_photo"
                                           :enctype="true" />
                        </div>

                        <!-- Name -->
                        <div>
                            <x-input-label for="name" :value="__('page.name_and_lastname')" />
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <!-- Phone -->
                        <div class="mt-4">
                            <x-input-label for="phone" :value="__('page.phone')" />
                            <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')" autocomplete="phone" />
                        </div>

                        <!-- Email Address -->
                        <div class="mt-4">
                            <x-input-label for="email" :value="__('page.email')" />
                            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                        </div>

                        <!-- Additional field 1 -->
                        <div class="mt-4">
                            <x-input-label for="additional1" :value="__('page.additional1')" />
                            <div class="row">
                                <x-text-input id="additional1" class="block mt-1 w-full" type="text" name="additional[0]" :value="old('additional1')" required autocomplete="additional1" />
                                <x-note>@lang('page.additional_note')</x-note>
                            </div>
                        </div>

                        <!-- Additional field 2 -->
                        <div class="mt-4">
                            <x-input-label for="additional2" :value="__('page.additional2')" />
                            <div class="row">
                                <x-text-input id="additional2" class="block mt-1 w-full" type="text" name="additional[1]" :value="old('additional2')" required autocomplete="additional2" />
                                <x-note>@lang('page.additional_note')</x-note>
                            </div>
                        </div>

                        <!-- Additional field 3 -->
                        <div class="mt-4">
                            <x-input-label for="additional3" :value="__('page.additional3')" />
                            <div class="row">
                                <x-text-input id="additional3" class="block mt-1 w-full" type="text" name="additional[2]" :value="old('additional3')" required autocomplete="additional3" />
                                <x-note>@lang('page.additional_note')</x-note>
                            </div>
                        </div>
                    </div>
                    <div class="right">

                        <!-- Country -->
                        <div class="mt-4">
                            <x-input-label for="country" :value="__('page.country')" />
                            <x-text-input id="country" class="block mt-1 w-full" type="text" name="country" :value="old('country')" required autocomplete="country" />
                        </div>

                        <!-- City -->
                        <div class="mt-4">
                            <x-input-label for="city" :value="__('page.city')" />
                            <x-text-input id="city" class="block mt-1 w-full" type="text" name="city" :value="old('city')" required autocomplete="city" />
                        </div>

                        <!-- Address -->
                        <div class="mt-4">
                            <x-input-label for="address" :value="__('page.address')" />
                            <x-text-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address')" required autocomplete="address" />
                        </div>

                        <!-- ZIP -->
                        <div class="mt-4">
                            <x-input-label for="zip" :value="__('page.zip')" />
                            <x-text-input id="zip" class="block mt-1 w-full" type="text" name="zip" :value="old('zip')" required autocomplete="zip" />
                        </div>
                    </div>
                </div>
                <div class="string_2">
                    <div class="form-group row mb-0">
                        <button type="submit" class="text-gray-800 personalized">
                            >> @lang('page.resume')
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
