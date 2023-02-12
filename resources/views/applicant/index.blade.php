<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Applicant Dashboard') }}
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

                    @if ($jobs->count() > 0 )

                    @foreach ($jobs as $job)

                    <!-- job card -->
                    <div class="bg-slate-200 p-5 border-2 border-solid border-slate-700 m-5 pb-5">
                        <div class="">

                            <h3 class="text-slate-900 font-extrabold text-3xl">{{ $job->title }}</h3>
                            <p><span class="font-bold">Company Name: </span>{{ $job->company_name }}</p>
                            <p><span class="font-bold">Experience: </span>{{ $job->experience }}</p>
                        </div>

                        <div class="mt-10">
                            <form method="POST" action="{{ route('applicant.job.apply', ['id' => $job->id]) }}">
                                @csrf

                                @if($job->applications->isNotEmpty())
                                <input type="submit" value="Applied" class="
                                text-white bg-green-700 px-4 py-2">

                                @else

                                <input type="submit" value="Apply" class="
                                text-white bg-blue-700 px-4 py-2">
                                @endif
                            </form>
                        </div>

                    </div>

                    @endforeach

                    <div class="flex justify-start p-5">
                        {{ $jobs->links() }}
                    </div>

                    @endif




                </div>
            </div>
        </div>
    </div>
</x-app-layout>
