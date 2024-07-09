

<div>
    <div class="py-5 px-3 text-gray-900 dark:text-white text-center">
        <h1 class="text-5xl">ZTasks App</h1>
    </div>
    <div class="max-w-full ">
        <form class="flex gap-2 justify-center" action="" wire:submit="add">
            <input class="dark:bg-gray-800 dark:text-gray-300 rounded w-6/12" wire:model="text" placeholder="What do you have to do?" type="text">
            <div class="text-red-300 absolute translate-y-16">@error('text') {{ $message }} @enderror
            </div>
            <button type="submit" class="py-3 px-5 bg-green-600 border border-0 rounded text-white">Add</button>
        </form>

    </div>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex flex-col md:flex-row justify-between">
            <div class="w-full md:w-3/12">
                <h2 class="text-center text-4xl text-gray-800 dark:text-white my-2">
                Your tasks ({{sizeof($tasks)}})
                </h2>

                @if(!sizeof($tasks)) 
                <h3 class="text-center dark:text-gray-300 text-1xl">
                {{ __("You don't have tasks") }}
                </h3> 
                @endif
                @foreach ($tasks as $task)
                @if($task->task_done) @continue
                @endif
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg my-3">

                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <h3>Author: {{ $task->author }}</h3>
                        
                        <p>{{ $task->task_description }}</p>                    

                    </div>
                    <div class="m-2 flex justify-between gap-2">
                        <button wire:click="done({{$task->id}},{{__($task->task_done?false:true)}})" class="py-3 px-5 bg-green-600 border border-0 rounded text-white">Done ✔</button>
                        <button wire:confirm="Are you sure you want to delete this task?" wire:click="delete({{$task->id}})" class="py-3 px-5 bg-red-600 border border-0 rounded text-white">Delete ❌</button>
                    </div>
                </div>
                @endforeach                
            </div>
            <div class="md:w-3/12">
            <h2 class="text-4xl text-gray-800 dark:text-white my-2 text-center">Done tasks ({{sizeof($tasks_done)}})</h2>
            @if(!sizeof($tasks_done)) 
            <h3 class="text-center dark:text-gray-300 text-1xl">
            {{ __("You don't have done tasks") }}
            </h3> 
            @endif
            @foreach ($tasks_done as $task)
            @if(!$task->task_done) @continue
            @endif
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg my-3">

                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3>Author: {{ $task->author }}</h3>
                    @if ($task->task_done) <del>{{ $task->task_description }}</del> ✅
                    @endif
                    

                </div>
                <div class="m-2 flex justify-between gap-2">
                    <button wire:click="done({{$task->id}},{{__($task->task_done?false:true)}})" class="py-3 px-5 bg-orange-600 border border-0 rounded text-white">Undo 🔙 </button>
                    <button wire:click="delete({{$task->id}})" class="py-3 px-5 bg-red-600 border border-0 rounded text-white">Delete ❌</button>
                </div>
            </div>
            @endforeach
            </div>
        </div>
    </div>

</div>