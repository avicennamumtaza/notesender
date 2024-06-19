<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Notes') }}
        </h2>
    </x-slot>

    <div class="py-3">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <x-wui-button class="border-none my-5 hover:bg-gray-300" icon="arrow-left" href="{{ route('notes.index') }}">All Notes</x-wui-button>
            <livewire:notes.create></livewire:notes.create>
        </div>
    </div>
</x-app-layout>
