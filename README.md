# Livewire files <!-- omit in toc -->

Uploading file using [Livewire](https://laravel-livewire.com/) and [Tailwind](https://tailwindui.com/).

- [Installation](#installation)
- [Requirements](#requirements)
- [How to use](#how-to-use)
- [Configuration](#configuration)
- [Plan](#plan)

## Installation

`composer require akhaled/livewire-files`

## Requirements

Frontend packages are required:

- [AlpineJS](https://github.com/alpinejs/alpine)
- [Tailwind Components](https://tailwindui.com/components)
- [Sweetalert2](https://sweetalert2.github.io/)

## How to use

### 1. Add livewire component to your view <!-- omit in toc -->

This component only displays a button within your content. This button is linked to [tailwind modal](https://tailwindui.com/components/application-ui/overlays/modals).

```blade
@livewire('files-upload', [
    'image' => true, // accept only image, optional
    'mimes' => 'pdf,csv', // or specify mime type, optional
    'max' => 1024 // max 1024kb by default
])
```

### 2. Add scripts <!-- omit in toc -->

```blade
...
@livewireScript
<script src="{{ mix('js/app.js') }}"></script>
@livewireSweetalertScripts
...
```

## Configuration

`php artisan vendor:publish --tag=livewire-files`

Will generate global config file.

### `store_dir` <!-- omit in toc -->

Default is public (`storage/public`). You need to add the following line in config/filesystems.php under links property:
> `public_path('storage') => storage_path('app/public')`


### `validation` <!-- omit in toc -->

- `image`: only accept images, default = `false`
- `mimes`: accepted mimes, default = `null` (accepting everything)
- `max`: maximum uploaded size, default = `102400` (in kilobytes)

## Plan

- [x] Show toast on uploaded!
- [x] Hide input file and show javascript link
- [x] Move content to modal
- [ ] Show sweetalert popups instead of static alert
- [ ] Add button text and button color for upload button
- [ ] Specify upload files names
- [ ] Move uploads to directory year/month/day
