<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Task Manager</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        @vite('resources/css/app.css')
        
    </head>
    <body class="font-sans antialiased dark:bg-black dark:text-white/50">
        <div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50">
            <div class="relative min-h-screen flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white">
                <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
                    <header class="grid grid-cols-2 items-center gap-2 pt-5 lg:grid-cols-3">
                        <div class="flex lg:justify-center lg:col-start-2">
                            <h1 class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl dark:text-white">Task Manager</h1>
                        </div>
                    </header>

                    <main class="mt-12">
                        <div class="grid gap-12">
                            <div>
                                <label for="project_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Filter tasks by project</label>
                                <select 
                                    name="project_id" 
                                    id="project_id"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    @foreach($projects as $project)
                                        <option value="{{ $project->id }}">{{ $project->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <ul id="list" data-update-url={{ route('UpdateTasksPriority') }} class="max-w-md divide-y divide-gray-200 dark:divide-gray-70">
                                @foreach($tasks as $task)
                                    <li 
                                        data-id="{{ $task->id }}" 
                                        data-project-id="{{ $task->project_id }}"
                                        class="pl-3 pb-3 pt-3 cursor-pointer"
                                    >{{ $task->name }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </main>

                    <footer class="py-16 text-center text-sm text-black dark:text-white/70">
                        Made by <a href="https://juliandev.vercel.app/" target="_blank" class="underline text-blue-600 hover:text-blue-800 visited:text-blue-600">Julian Sznaider</a> for Coalition Technologies
                    </footer>
                </div>
            </div>
        </div>
    </body>
    @vite(['resources/js/app.js'])
</html>
