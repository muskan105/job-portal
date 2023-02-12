<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="">
                    <a href="{{ route('admin.job.add') }}" class="text-white bg-slate-700 px-4 py-2">
                        Create Job
                    </a>

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

                    <table class="table-auto w-full text-left mt-10">
                        <thead>
                            <tr class="bg-gray-200">
                                <th class="px-4 py-2">Title</th>
                                <th class="px-4 py-2">Company Name</th>
                                <th class="px-4 py-2">Experience</th>
                                <th class="px-4 py-2">Applications</th>
                                <th class="px-4 py-2">Updated At</th>
                                <th class="px-4 py-2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($jobs as $job)
                            <tr>
                                <td class="border px-4 py-2">{{ $job->title }}</td>

                                <td class="border px-4 py-2">{{ $job->company_name }}</td>

                                <td class="border px-4 py-2">{{ $job->experience }}</td>

                                <td class="border px-4 py-2">{{ $job->applied }}</td>

                                <td class="border px-4 py-2">{{ $job->updated_at->diffForHumans() }}</td>

                                <td class="border px-4 py-2">
                                    <div class="flex justify-between items-cente">
                                        <a href="{{ route('admin.job.edit', ['id' => $job->id]) }}" class="
                                text-slate-800 font-extrabold bg-blue-400 px-4 py-2">Edit</a>

                                        <form method="POST" action="{{ route('admin.job.delete', ['id' => $job->id]) }}">
                                            @csrf
                                            <input type="submit" value="Delete" class="
                                text-slate-800 font-extrabold bg-red-400 px-4 py-2">
                                        </form>

                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="flex justify-start p-5">
                        {{ $jobs->links() }}
                    </div>

                    @endif



                </div>
            </div>



        </div>
    </div>
</x-admin-layout>
