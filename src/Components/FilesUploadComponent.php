<?php

namespace Akhaled\LivewireFiles\Components;

use Livewire\Component;
use Livewire\WithFileUploads;

class FilesUploadComponent extends Component
{
    use WithFileUploads;

    public $file;

    protected $rules = [
        'file' => 'max:1',
    ];

    public function open()
    {
    }

    public function updated($prop)
    {
        $this->validateOnly($prop);
    }

    public function save()
    {
        $this->file->store('public');
    }

    public function render()
    {
        return view('livewire-files::livewire.files-upload');
    }
}