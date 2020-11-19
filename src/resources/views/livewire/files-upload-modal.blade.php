<div>
    <h1>Upload the files</h1>
    <hr class="mt-2 mb-10 border-gray-100">

    <div class="grid grid-cols-2">
        <div>
            <div
                class="flex justify-center px-6 pt-5 pb-6 border-2 border-cool-gray-200 border-dashed rounded-md bg-cool-gray-50">
                <div class="text-center">
                    <x-eva-cloud-upload-outline class="w-15 my-10 m-auto text-cool-gray-900" />
                    <p class="mt-1 text-sm text-gray-600">
                        Drag and drop
                    </p>
                    <p class="mt-1 text-xs text-gray-500">
                        <span
                            class="uppercase">{{ config('livewire-files.mimes') ?? (config('livewire-files.image') ? 'images' : 'any file') }}</span>
                        up
                        to <span class="uppercase">{{ config('livewire-files.max') }}</span>kb
                    </p>
                </div>
            </div>

            <p class="text-center my-5 text-gray-500">or</p>

            <div class="text-center">
                <button x-on:click="document.getElementById('livewireFileUploadInput').click()"
                    class="font-medium text-indigo-600 hover:text-indigo-500 hover:underline focus:outline-none transition duration-150 ease-in-out">Upload
                    a file</button>
                <input id="livewireFileUploadInput" type="file" class="hidden" wire:model.defer="file"
                    value="Upload a file" />
            </div>

            {{-- Error message --}}
            @error('file')
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    <span class="error">{{ $message }}</span>
                </div>
            @enderror
        </div>

        <div class="ml-10 mr-0">
            <div x-show="isUploading">
                @include('livewire-files::livewire.file-progress', [
                'file_name' => $file_name,
                'file_extension' => $file_extension,
                'completed' => false
                ])
            </div>

            @foreach ($files as $f)
                @include('livewire-files::livewire.file-progress', [
                'file_name' => $f['file_name'],
                'file_extension' => $f['file_extension'],
                'completed' => true
                ])
            @endforeach
        </div>
    </div>
</div>
