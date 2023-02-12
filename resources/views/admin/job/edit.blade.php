<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">

                <form method="POST" action="{{ route('admin.job.update' , ['id' => $job->id] ) }}">
                    @csrf
                    <div class="max-w-xl">
                        <a href="{{ route('admin.dashboard') }}" class="text-white bg-slate-700 px-4 py-2">
                            Back to job list
                        </a>

                        <div class="py-6">
                        </div>

                        <x-input-error :messages="$errors->get('error')" class="mt-2" />


                        @if ($message = Session::get('success'))
                        <div class="bg-green-100 text-green-700 p-4 rounded mt-4">
                            <strong>{{ $message }}</strong>
                        </div>
                        @endif

                        <x-input-error :messages="$errors->get('success')" class="mt-2" />

                        <div class="mt-4">
                            <x-input-label for="title" :value="__('Title')" />
                            <x-text-input id="title" value="{{ $job->title }}" class="block mt-1 w-full" type="text" name="title" required autocomplete="title" />
                            <x-input-error :messages="$errors->get('title')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="company_name" :value="__('Company Name')" />
                            <x-text-input id="company_name" value="{{ $job->company_name }}" class="block mt-1 w-full" type="text" name="company_name" required autocomplete="company_name" />
                            <x-input-error :messages="$errors->get('company_name')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="description" :value="__('Description')" />
                            <x-text-input id="description" value="{{ $job->description }}" class="block mt-1 w-full" type="text" name="description" required autocomplete="description" />
                            <x-input-error :messages="$errors->get('description')" class="mt-2" />
                        </div>


                        <div class="mt-4">
                            <x-input-label for="requirement" :value="__('Requirement')" />
                            <x-text-input id="requirement" value="{{ $job->requirement }}" class="block mt-1 w-full" type="text" name="requirement" required autocomplete="requirement" />
                            <x-input-error :messages="$errors->get('requirement')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="location" :value="__('Location')" />
                            <x-text-input id="location" value="{{ $job->location }}" class="block mt-1 w-full" type="text" name="location" required autocomplete="location" />
                            <x-input-error :messages="$errors->get('location')" class="mt-2" />
                        </div>


                        <div class="mt-4">
                            <x-input-label for="experience" :value="__('Experience')" />
                            <x-text-input id="experience" value="{{ $job->experience }}" class="block mt-1 w-full" type="text" name="experience" required autocomplete="experience" />
                            <x-input-error :messages="$errors->get('experience')" class="mt-2" />
                        </div>


                        <div class="mt-4">
                            <x-input-label for="note" :value="__('Note')" />
                            <x-text-input id="note" value="{{ $job->note }}" class="block mt-1 w-full" type="text" name="note" required autocomplete="note" />
                            <x-input-error :messages="$errors->get('note')" class="mt-2" />
                        </div>



                        <div class="mt-4">
                            <x-input-label for="start_date" :value="__('Start Date')" />
                            <x-text-input id="start_date" value="{{ $job->start_date }}"  class="block mt-1 w-full" type="date" name="start_date" required autocomplete="start_date" />
                            <x-input-error :messages="$errors->get('start_date')" class="mt-2" />
                        </div>




                        <div class="mt-4">
                            <x-input-label for="end_date" :value="__('End Date')" />
                            <x-text-input id="end_date" value="{{ $job->end_date }}"  class="block mt-1 w-full" type="date" name="end_date" required autocomplete="end_date" />
                            <x-input-error :messages="$errors->get('end_date')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-primary-button class="mt-3">
                                Update
                            </x-primary-button>
                        </div>


                    </div>

                </form>

            </div>
        </div>



    </div>
    </div>
</x-admin-layout>
