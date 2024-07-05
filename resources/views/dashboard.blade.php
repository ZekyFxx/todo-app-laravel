

<div>
    <div class="m-3 max-w-7xl text-center">
        <form action="" wire:submit="add">
            <input class="d-block w-full" wire:model="text" placeholder="Escribe tu tarea" type="text">
        </form>
    </div>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h2 class="text-4xl text-white my-2">Your tasks</h2>
            @foreach ($tasks as $task)
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg my-3">

                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3>Author: {{ $task->author }}</h3>
                    <h4>Task ID: {{ $task->id }} </h4>
                    {{ $task->task_description }}

                </div>
                <div class="m-2 flex justify-end gap-2">
                    <button class="py-3 px-5 bg-green-600 border border-0 rounded text-white">Done</button>
                    <button wire:click="delete({{$task->id}})" class="py-3 px-5 bg-red-600 border border-0 rounded text-white">Delete</button>
                </div>
            </div>
            @endforeach
        </div>
    </div>

</div>