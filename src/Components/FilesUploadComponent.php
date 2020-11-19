<?php

namespace Akhaled\LivewireFiles\Components;

use Akhaled\LivewireSweetalert\Toast;
use Livewire\Component;
use Livewire\WithFileUploads;

class FilesUploadComponent extends Component
{
    use WithFileUploads, Toast;

    /** model */
    public $file;
    /** validation */
    public $image;
    public $mimes;
    public $max;
    /** placeholder */
    public $files = [];
    public $file_path;
    public $file_name;
    public $file_extension;
    public $file_mime;

    protected $rules = [
        'file' => 'required',
    ];

    public function updatedFile()
    {
        $this->save();
    }

    /**
     * Prepare validation parameters for file saving
     *
     * @return array
     */
    private function prepareValidation()
    {
        $tmp = ['required'];
        $validate = config('livewire-files');

        $tmp = $this->requestImageValidation($tmp, $validate);
        $tmp = $this->requestMimesValidation($tmp, $validate);
        $tmp = $this->requestMaxValidation($tmp, $validate);
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
        $value = ((isset($this->image) && $this->image == true) || ($validate['image'] && $validate['image'] == true))
            ? 'image'
            : 'file';

        array_push($tmp, $value);

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
            array_push($tmp, "mimes:" . $this->mimes);
        } else if ($validate['mimes']) {
            array_push($tmp, "mimes:" . $validate['mimes']);
        }

        return $tmp;
    }

    /**
     * Check max uploaded validation
     * Returns ['max:xxxx']
     *
     * @param array $tmp
     * @param array $validate
     * @return array
     */
    private function requestMaxValidation(array $tmp, array $validate)
    {
        if (isset($this->max)) {
            array_push($tmp, "max:" . $this->max);
        } else if ($validate['max']) {
            array_push($tmp, "max:" . $validate['max']);
        }

        return $tmp;
    }

    public function setFileName()
    {
        $this->file_name = pathinfo(__DIR__ . $this->file_path)['basename'];
    }

    public function setFileExtension()
    {
        $this->file_mime = mime_content_type(storage_path('app/' . $this->file_path));
        $this->file_extension = pathinfo(__DIR__ . $this->file_path)['extension'];
    }

    public function save()
    {
        $this->validateOnly('file', $this->prepareValidation());
        $this->file_path = $this->file->store(config('livewire-files.store_dir'));
        $this->setFileName();
        $this->setFileExtension();
        array_unshift($this->files, [
            'file_name' => $this->file_name,
            'file_extension' => $this->file_extension,
        ]);
        $this->reset(['file', 'file_name', 'file_extension', 'file_path']);
        $this->toast('File has been uploaded', 'success');
    }

    public function render()
    {
        return view('livewire-files::livewire.files-upload');
    }
}