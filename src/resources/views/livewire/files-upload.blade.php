<div class="shadow px-20 pt-10 pb-15 bg-white rounded-3xl">
    <h1>Upload the files</h1>
    <hr class="mt-2 mb-10 border-gray-100 border-opacity-50">

    <div class="grid grid-cols-2">
        {{-- @if ($file)
            Temporary URL <a href="{{ asset($file->temporaryUrl()) }}" target="_blank"
                rel="noopener noreferrer">{{ asset($file->temporaryUrl()) }}</a>
        @endif --}}

        <form wire:submit.prevent="save">
            <div
                class="flex justify-center px-6 pt-5 pb-6 border-2 border-cool-gray-200 border-dashed rounded-md bg-cool-gray-50">
                <div class="text-center">
                    <x-eva-cloud-upload-outline class="w-15 my-10 m-auto text-cool-gray-900" />
                    <p class="mt-1 text-sm text-gray-600">
                        Drag and drop
                    </p>
                    <p class="mt-1 text-xs text-gray-500">
                        PNG, JPG, GIF up to 10MB
                    </p>
                </div>
            </div>

            <p class="text-center my-5 text-gray-500">or</p>

            <div class="text-center">
                <input type="file" class="m-auto appearance-none" wire:model="file"
                    class="font-medium text-indigo-600 hover:text-indigo-500 focus:outline-none focus:underline transition duration-150 ease-in-out"
                    value="Upload a file" />
            </div>

            {{-- Error message --}}
            @error('file')
                <div class="px-4 py-3 bg-gray-50 sm:px-6">
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                        <span class="error">{{ $message }}</span>
                    </div>
                </div>
            @enderror

            {{-- Submit button --}}
            @if (!$errors->any() && $file)
                <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                    <span class="inline-flex rounded-md shadow-sm">
                        <button type="submit"
                            class="inline-flex justify-center py-2 px-4 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition duration-150 ease-in-out">
                            Save
                        </button>
                    </span>
                </div>
            @endif
        </form>

        <div class="ml-10 mr-0">



            <div class="flex w-full">
                <div
                    class="border border-gray-100 px-2 shadow mr-5 flex items-center rounded text-sm text-gray-400 bg-cool-gray-50 uppercase relative">
                    jpg
                    <hr class="border-4 border-green-400 absolute bottom-0 left-0 right-0 rounded">
                </div>
                <div class="flex-1">
                    <div class="flex content-between">
                        <div class="flex-1">
                            <p>example.file.jpg</p>
                            <span class="text-gray-400 text-xs uppercase">completed</span>
                        </div>
                        <div>
                            <span class="inline-block text-gray-400 text-sm">100%</span>
                            <x-eva-checkmark-circle-outline class="text-green-300 inline-block w-5" />
                        </div>
                    </div>
                    <hr class="border-pink-400 border-2 rounded">
                </div>
            </div>
        </div>
    </div>
</div>
