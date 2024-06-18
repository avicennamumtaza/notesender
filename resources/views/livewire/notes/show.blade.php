<?php

use Livewire\Volt\Component;

new class extends Component {
    public function with(): array
    {
        return [
            'notes' => Auth::user()->notes()->orderBy('send_date', 'asc')->get(),
        ];
    }
}; ?>

@if ($notes->isEmpty())
    <div class="mt-10 text-center">
        <p class="text-xl font-bold">No notes yet.</p>
        <p class="text-sm">Let's create your first note!</p>
        <x-wui-button primary icon="plus" class="mt-5 font-semibold" wire:navigate>Create Note</x-wui-button>
    </div>
@else
    <div class="grid grid-cols-2 gap-4 mt-10">
        @foreach ($notes as $note)
            <x-wui-card wire:key='{{ $note->id }}'>
                <div class="flex justify-between">
                    <a href="#"
                        class="text-xl text-gray-700 font-bold hover:underline hover:text-primary-600">{{ $note->title }}</a>
                    <div class="text-xs text-gray-600">{{ $note->send_date }}</div>
                </div>
                <div class="flex justify-between items-end mt-4">
                    <p class="text-xs text-gray-700">Recipient: <span
                            class="font-semibold">{{ $note->recipient }}</span></p>
                    <div class="space-x-1">
                        <x-wui-button circle icon="eye"></x-wui-button>
                        <x-wui-button circle icon="trash"></x-wui-button>
                    </div>
                </div>
            </x-wui-card>
        @endforeach
    </div>
@endif
