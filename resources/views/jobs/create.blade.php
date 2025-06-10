<x-layout>
    <x-slot:heading>
        Create a new job
    </x-slot:heading>

    <div class="container mx-auto p-4 max-w-3xl">        
        
        <form action="/jobs" method="POST" class="space-y-4">
            @csrf
            <div>
                <label for="title" class="block text-sm font-medium text-gray-700">Job Title</label>
                <input type="text" name="title" id="title" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
            </div>

            <div>
                <label for="salary" class="block text-sm font-medium text-gray-700">Salary</label>
                <input type="number" name="salary" id="salary" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
            </div>

            <div>
                <x-button type="submit">Create Job</x-button>
            </div>
        </form>        
    </div>
</x-layout>