<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Applicant Add Detail') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <x-input-error :messages="$errors->get('error')" class="mt-2" />

                    <div>
                        @if ($message = Session::get('success'))
                        <div class="bg-green-100 text-green-700 p-4 rounded mt-4">
                            <strong>{{ $message }}</strong>
                        </div>
                        @endif

                        @if (Session::has('error'))
                        <div class="bg-red-100 text-red-700 p-4 rounded mt-4">
                            {{ Session::get('error') }}
                        </div>
                        @endif
                    </div>

                    <form method="POST" action="{{ route('applicant.detail.store') }}">
                        @csrf
                        <div class="max-w-xl">

                            <a href="{{ route('dashboard') }}" class="text-white bg-slate-700 px-4 py-2">
                                Back to Applicant Dashboard
                            </a>

                            <div class="py-6">
                            </div>

                            <div class="mt-4">
                                <x-input-label for="resume" :value="__('Resume')" />

                                <x-text-input id="resume" class="block mt-1 w-full" type="file" accept="application/pdf,application/vnd.ms-excel" name="resume" required autocomplete="resume" />

                                <x-input-error :messages="$errors->get('resume')" class="mt-2" />
                            </div>

                            <div class="mt-4">
                                <x-input-label for="education" :value="__('Education')" />
                                <x-text-input id="education" class="block mt-1 w-full" type="text" name="education" required autocomplete="education" />
                                <x-input-error :messages="$errors->get('education')" class="mt-2" />
                            </div>

                            <div class="mt-4">
                                <x-input-label for="experience" :value="__('Experience')" />
                                <x-text-input id="experience" class="block mt-1 w-full" type="text" name="experience" required autocomplete="experience" />
                                <x-input-error :messages="$errors->get('experience')" class="mt-2" />
                            </div>


                            <div class="mt-4">
                                <x-input-label for="skills" :value="__('Skills')" />
                                <x-text-input id="skills" class="block mt-1 w-full" type="text" name="skills" required autocomplete="skills" />
                                <x-input-error :messages="$errors->get('skills')" class="mt-2" />
                            </div>

                            <div class="mt-4">
                                <x-input-label for="certifications" :value="__('Certifications')" />
                                <x-text-input id="certifications" class="block mt-1 w-full" type="text" name="certifications" required autocomplete="certifications" />
                                <x-input-error :messages="$errors->get('certifications')" class="mt-2" />
                            </div>


                            <div class="mt-4">
                                <x-input-label for="experience" :value="__('Experience')" />
                                <x-text-input id="experience" class="block mt-1 w-full" type="text" name="experience" required autocomplete="experience" />
                                <x-input-error :messages="$errors->get('experience')" class="mt-2" />
                            </div>


                            <div class="mt-4">
                                <x-input-label for="information" :value="__('Information')" />
                                <x-text-input id="information" class="block mt-1 w-full" type="text" name="information" required autocomplete="information" />
                                <x-input-error :messages="$errors->get('information')" class="mt-2" />
                            </div>



                            <div class="mt-4">
                                <x-input-label for="location" :value="__('Location')" />
                                <x-text-input id="location" class="block mt-1 w-full" type="text" name="location" required autocomplete="location" />
                                <x-input-error :messages="$errors->get('location')" class="mt-2" />
                            </div>


                            <div class="mt-4">
                                <x-primary-button class="mt-3">
                                    Submit
                                </x-primary-button>
                            </div>


                        </div>

                    </form>



                </div>
            </div>
        </div>
    </div>
</x-app-layout>
