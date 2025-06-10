<x-layout>
    
    <x-slot:heading>
        Job Details: {{ $job['title'] }}
    </x-slot:heading>

    <div>
        <h2 class="font-bold text-lg">{{ $job['title'] }}</h2>
        <p>This job pays  ${{ $job['salary'] }} per year</p>
    </div>
    <x-button href="/jobs/{{ $job['id'] }}/edit" class="mt-3">Edit Job</x-button>
</x-layout>