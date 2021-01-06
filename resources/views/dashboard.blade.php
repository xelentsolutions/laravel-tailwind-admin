<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-2">
        <div class="max-w-full mx-auto">
            <div class="overflow-hidden">
                <x-jet-welcome />
            </div>
        </div>
    </div>
</x-app-layout>
