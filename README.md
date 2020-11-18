# Livewire files <!-- omit in toc -->

Uploading file using [Livewire](https://laravel-livewire.com/) and [Tailwind](https://tailwindui.com/).

- [Installation](#installation)

## Installation

1. `composer require akhaled/livewire-files`

2. Add livewire component to your view

```blade
@livewire('files-upload', [
    'image' => true, // accept only image, optional
    'mimes' => 'pdf,csv', // or specify mime type, optional
    'max' => 1024 // max 1024kb by default
])
```

3. Add [sweetalert](https://github.com/akhled/livewire-sweetalert) script for toast notification

```blade
@livewireSweetalertScripts
```
