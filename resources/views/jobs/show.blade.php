<x-layout>
    
    <x-slot:heading>
        Job--
        {{ $job['title'] }}
    </x-slot:heading>

    <div>
        <h2 class="font-bold text-lg">{{ $job['title'] }}</h2>
        <p>This job pays  ${{ $job['salary'] }} per year</p>
    </div>
</x-layout>