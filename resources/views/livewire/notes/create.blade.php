<?php

use Livewire\Volt\Component;

new class extends Component {
    public $noteTitle;
    public $noteBody;
    public $noteRecipient;
    public $noteSendDate;

    public function submit()
    {
        $validated = $this->validate([
            'noteTitle' => ['required', 'string'],
            'noteBody' => ['required', 'string'],
            'noteRecipient' => ['required', 'email'],
            'noteSendDate' => ['required', 'date'],
        ]);
        auth()
            ->user()
            ->notes()
            ->create([
                'title' => $this->noteTitle,
                'body' => $this->noteBody,
                'recipient' => $this->noteRecipient,
                'send_date' => $this->noteSendDate,
                'is_published' => false,
            ]);
        return redirect(route('notes.index'));
        // dd($this->noteTitle, $this->noteBody, $this->noteRecipient, $this->noteSendDate);
    }
}; ?>

<div>
    <form wire:submit class="space-y-5">
        <x-wui-input wire:model='noteTitle' label='Note Title'></x-wui-input>
        <x-wui-textarea wire:model='noteBody' label='Note Body'></x-wui-textarea>
        <x-wui-input wire:model='noteRecipient' label='Note Recipient' type='email' icon='user'></x-wui-input>
        <x-wui-input wire:model='noteSendDate' label='Note Send Date' type='date' icon='calendar'></x-wui-input>
        <x-wui-button primary spinner right-icon="mail" class="font-semibold hover:text-gray-100"
            wire:click='submit'>Schedule Note</x-wui-button>
        <x-wui-errors></x-wui-errors>
    </form>
</div>
