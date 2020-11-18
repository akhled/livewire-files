<?php

namespace Akhaled\LivewireFiles\Components;

use Akhaled\LivewireSweetalert\Toast;
use Livewire\Component;
use Livewire\WithFileUploads;

class FilesUploadComponent extends Component
{
    use WithFileUploads;
    use Toast;

    public $file;
    public $image;
    public $mimes;

    protected $rules = [
        'file' => 'required',
    ];

    public function open()
    {
    }

    public function updatedFile()
    {
        $this->validateOnly('file', $this->prepareValidation());
    }

    /**
     * Prepare validation parameters for file saving
     *
     * @return array
     */
    private function prepareValidation()
    {
        $tmp = ['required'];
        $validate = config('livewire-files.validation');

        $tmp = $this->requestImageValidation($tmp, $validate);
        $tmp = $this->requestMimesValidation($tmp, $validate);
        if ($validate['max']) array_push($tmp, "max:" . $validate['max']);

        return ['file' => implode('|', $tmp)];
    }

    /**
     * Check if only accept images
     * Returns ['image'] for true, [] for false
     *
     * @param array $tmp
     * @param array $validate
     * @return array
     */
    private function requestImageValidation(array $tmp, array $validate)
    {
        if (isset($this->image)) {
            if ($this->image == true) {
                array_push($tmp, 'image');
            }
        } else if ($validate['image'] && $validate['image'] == true) {
            array_push($tmp, 'image');
        }

        return $tmp;
    }

    /**
     * Check mimes validation
     * Returns ['mimes:ext'] for true, [] for false
     *
     * @param array $tmp
     * @param array $validate
     * @return array
     */
    private function requestMimesValidation(array $tmp, array $validate)
    {
        if (isset($this->mimes)) {
            if ($this->mimes == true) {
                array_push($tmp, "mimes:" . $this->mimes);
            }
        } else if ($validate['mimes'] && $validate['mimes'] == true) {
            array_push($tmp, "mimes:" . $validate['mimes']);
        }

        return $tmp;
    }

    public function save()
    {
        $this->updatedFile();
        $this->file->store(config('livewire-files.store_dir'));
        $this->reset('file');
        $this->toast('File has been uploaded', 'success');
    }

    public function render()
    {
        return view('livewire-files::livewire.files-upload');
    }
}