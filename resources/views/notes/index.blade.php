<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Notes') }}
        </h2>
    </x-slot>

    {{-- @php
        $notes = App\Models\Note::all()->where('user_id', auth()->user()->id);
        // dd($notes);
    @endphp --}}

    <div class="py-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <livewire:notes.show></livewire:notes.show>
        </div>
    </div>
</x-app-layout>
