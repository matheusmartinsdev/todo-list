<x-app-layout>
    <x-slot:header>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $todo->title }}
        </h2>
    </x-slot:header>

    <div class="py-12">
        <div class="p-8 rounded-lg bg-white dark:bg-slate-800 text-slate-900 dark:text-slate-100">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 lg:grid-cols-2">
                    {{-- Title --}}
                    <p class="text-lg font-semibold">
                        {{ $todo->title }}
                    </p>

                    {{-- Description --}}
                    <p class="text-sm text-gray-500">
                        {{ $todo->description }}
                    </p>

                    {{-- Created At --}}
                    <p class="text-sm text-gray-500">
                        {{ $todo->created_at->diffForHumans() }}
                    </p>

                    {{-- Updated At --}}
                    <p class="text-sm text-gray-500">
                        {{ $todo->updated_at->diffForHumans() }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
