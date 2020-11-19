# Livewire files <!-- omit in toc -->

Uploading file using [Livewire](https://laravel-livewire.com/) and [Tailwind](https://tailwindui.com/).

- [Installation](#installation)
- [How to use](#how-to-use)

## Installation

`composer require akhaled/livewire-files`

## How to use

### 1. Add livewire component to your view <!-- omit in toc -->

```blade
@livewire('files-upload', [
    'image' => true, // accept only image, optional
    'mimes' => 'pdf,csv', // or specify mime type, optional
    'max' => 1024 // max 1024kb by default
])
```

### 2. Add [sweetalert](https://github.com/akhled/livewire-sweetalert) script for toast notification <!-- omit in toc -->

```blade
@livewireSweetalertScripts
```
