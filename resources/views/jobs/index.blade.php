<x-layout>
    
    <x-slot:heading>
        <div class="flex justify-between items-center mb-4">
            <h2>Job listing</h2>
            
            <a href="/jobs/create" class="inline-block bg-gray-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                Create Job
            </a>
        </div>
    </x-slot:heading>
    <div class="container mx-auto p-4">
        @foreach ($jobs as $job)
            <a href="/jobs/{{ $job['id'] }}" class="block mb-4 p-4 bg-gray-100 hover:bg-gray-200 rounded">
                <div class="font-bold text-blue-500">{{$job->employer->name}}</div>
                <div>
                    <strong>{{ $job['title'] }}</strong> pays ${{ $job['salary'] }} per year.
                </div>
            </a>
        @endforeach

        {{ $jobs->links() }}
        {{-- {{ $jobs->links('vendor.pagination.semantic-ui') }} --}}
    </div>
</x-layout>