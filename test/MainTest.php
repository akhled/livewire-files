<?php

use Livewire\Livewire;
use Illuminate\Http\UploadedFile;

it('opens dialog', function () {
    // not ready yet
    Livewire::test('files-upload')->call('open');
});

it('uploads file', function() {
    $file = UploadedFile::fake()->image('test.png');
    Livewire::test('files-upload')
        ->set('file', $file)
        ->call('save')
        ->assertSet('file', null)
        ->assertEmitted('swal:toast');
});