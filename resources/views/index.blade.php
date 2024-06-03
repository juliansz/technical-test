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
            <img id="background" class="absolute -left-20 top-0 max-w-[877px]" src="https://laravel.com/assets/img/welcome/background.svg" />
            <div class="relative min-h-screen flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white">
                <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
                    <header class="grid grid-cols-2 items-center gap-2 py-10 lg:grid-cols-3">
                        <div class="flex lg:justify-center lg:col-start-2">
                            <h1>Tasks</h1>
                        </div>
                    </header>

                    <main class="mt-12">
                        <div class="grid gap-12">
                            <select 
                                name="project_id" 
                                id="project_id"
                                class="">
                                @foreach($projects as $project)
                                    <option value="{{ $project->id }}">{{ $project->name }}</option>
                                @endforeach
                            </select>
                            <ul id="list" data-update-url={{ route('UpdateTasksPriority') }}>
                                @foreach($tasks as $task)
                                    <li 
                                        data-id="{{ $task->id }}" 
                                        data-project-id="{{ $task->project_id }}"
                                    >{{ $task->name }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </main>

                    <footer class="py-16 text-center text-sm text-black dark:text-white/70">
                        Made by Julian Sznaider for Coalition Technologies
                    </footer>
                </div>
            </div>
        </div>
    </body>
    @vite(['resources/js/app.js'])
</html>
