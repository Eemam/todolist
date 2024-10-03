<x-layout>

    <x-slot:title>{{ $title }}</x-slot:title>
    
    <x-slot:header>{{ $header }}</x-slot:header>
    
    
    @session('success')
    <div class="absolute right-5 mt-5 ">
        <div id="toast-success" class="flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 border border-green-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800" role="alert">
            <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                </svg>
                <span class="sr-only">Check icon</span>
            </div>
            <div class="ms-3 text-sm font-normal">{{ session('success') }}</div>
            <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-success" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
            </button>
        </div>
    </div>
    @endsession
    
    @session('delete')
    <div class="absolute right-5 mt-5 ">
        <div id="toast-danger" class="flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white border border-red-500 rounded-lg shadow dark:text-gray-400 dark:bg-gray-800" role="alert">
            <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-red-500 bg-red-100 rounded-lg dark:bg-red-800 dark:text-red-200">
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 11.793a1 1 0 1 1-1.414 1.414L10 11.414l-2.293 2.293a1 1 0 0 1-1.414-1.414L8.586 10 6.293 7.707a1 1 0 0 1 1.414-1.414L10 8.586l2.293-2.293a1 1 0 0 1 1.414 1.414L11.414 10l2.293 2.293Z"/>
                </svg>
                <span class="sr-only">Error icon</span>
            </div>
            <div class="ms-3 text-sm font-normal">{{ session('delete') }}</div>
            <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-danger" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
            </button>
        </div>
    </div>
    @endsession

    <main>
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            
            

            <div class="border-b border-slate-400 mb-5">
                <form class="max-w-sm mx-auto" method="POST">
                    @csrf
                    <div class="mb-5">
                    <label for="body" class="block mb-2 text-sm font-medium text-center text-gray-900 dark:text-white">New Task</label>
                    <input type="text" name="body" id="body" class="@error('body') border border-red-500 @enderror bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter todo task..." autofocus autocomplete="off" />
                    @error('body')
                    <span class="text-xs text-red-500">Please input your task</span>
                    @enderror
                    </div>
                    <div class="flex justify-center mb-5">
                        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add Task</button>
                    </div>
                </form>
            </div>
  

            @if (count($schedules) > 0)

            @foreach($schedules as $index => $schedule)   
                <div class="flex items-start gap-2.5 my-3">
                    <div class="flex align-center w-full leading-1.5 p-4 border-gray-200 bg-gray-200 rounded-xl dark:bg-gray-700">
                        <input type="checkbox" name="clear" data-id="{{ $schedule->id }}" class="mt-1 mr-3 clear-checkbox" {{ $schedule->clear == "y" ? "checked" : "" }}>
                        <span class="{{ $schedule->clear == 'y' ? 'line-through' : '' }}">{{ $schedule->body }}</span>
                    </div>

                    <button id="dropdownMenuIconButton-{{ $index }}" data-dropdown-toggle="dropdownDots-{{ $index }}" data-dropdown-placement="bottom-start" class="inline-flex self-center items-center p-2 text-sm font-medium text-center text-gray-900 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none dark:text-white focus:ring-gray-50 dark:bg-gray-900 dark:hover:bg-gray-800 dark:focus:ring-gray-600" type="button">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 4 15">
                        <path d="M3.5 1.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 6.041a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 5.959a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Z"/>
                    </svg>
                    </button>
                    <div id="dropdownDots-{{ $index }}" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-40 dark:bg-gray-700 dark:divide-gray-600">
                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownMenuIconButton-{{ $index }}">
                        <li>
                            <form action="/schedule/delete" method="post">
                            @csrf
                            @method('delete')

                            <input type="hidden" name="id" value="{{ $schedule->id }}">

                            <button type="submit" class="block w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Delete</button>
                            </form>
                        </li>
                    </ul>
                    </div>
                </div>
            @endforeach
                
            @else

            <h1 class="text-center text-3xl">No Task Available</h1>
            
            @endif

        </div>
    </main>

    <script>
        $(document).ready(function() {
            $('.clear-checkbox').on('change', function() {
                const scheduleId = $(this).data('id');
                const isChecked = $(this).is(':checked'); // Get checked state

                // Determine the new value for the clear property
                const newClearValue = isChecked ? 'y' : 'n'; 

                $.ajax({
                    url: '{{ route("schedule.update") }}', // Update with your route
                    type: 'POST',
                    data: {
                        id: scheduleId,
                        clear: newClearValue,
                        _token: '{{ csrf_token() }}' // Include CSRF token for Laravel
                    },
                    success: function(response) {
                        console.log(response.message); // Handle success response

                        // Toggle the line-through class based on checked state
                        const textElement = $(this).siblings('span'); // Select the corresponding span element
                        if (isChecked) {
                            textElement.addClass('line-through'); // Add class if checked
                        } else {
                            textElement.removeClass('line-through'); // Remove class if unchecked
                        }
                    }.bind(this), // Bind 'this' to maintain context
                    error: function(xhr) {
                        console.error(xhr.responseText); // Handle error response
                    }
                });
            });
        });
    </script>
</x-layout>