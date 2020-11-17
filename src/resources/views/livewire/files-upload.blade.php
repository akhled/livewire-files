<div>
    <div class="md:grid md:grid-cols-3 md:gap-6">
        <div class="md:col-span-1">
            <div class="px-4 sm:px-0">
                <h3 class="text-lg font-medium leading-6 text-gray-900">Profile</h3>
                <p class="mt-1 text-sm leading-5 text-gray-600">
                    @if ($file)
                        Temporary URL <a href="{{ asset($file->temporaryUrl()) }}" target="_blank"
                            rel="noopener noreferrer">{{ asset($file->temporaryUrl()) }}</a>
                    @endif
                </p>
            </div>
        </div>
        <div class="mt-5 md:mt-0 md:col-span-2" wire:submit.prevent="save">
            <form action="#" method="POST">
                <div class="shadow sm:rounded-md sm:overflow-hidden">
                    <div class="px-4 py-5 bg-white sm:p-6">
                        <div class="mt-6">
                            <div
                                class="mt-2 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                                <div class="text-center">
                                    <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none"
                                        viewBox="0 0 48 48">
                                        <path
                                            d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                    <p class="mt-1 text-sm text-gray-600">
                                        <input type="file" wire:model="file"
                                            class="font-medium text-indigo-600 hover:text-indigo-500 focus:outline-none focus:underline transition duration-150 ease-in-out"
                                            value="Upload a file" />
                                        or drag and drop
                                    </p>
                                    <p class="mt-1 text-xs text-gray-500">
                                        PNG, JPG, GIF up to 10MB
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Error message --}}
                    @error('file')
                        <div class="px-4 py-3 bg-gray-50 sm:px-6">
                            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative"
                                role="alert">
                                <span class="error">{{ $message }}</span>
                            </div>
                        </div>
                    @enderror

                    {{-- Submit button --}}
                    @unless($errors->any())
                        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                            <span class="inline-flex rounded-md shadow-sm">
                                <button type="submit"
                                    class="inline-flex justify-center py-2 px-4 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition duration-150 ease-in-out">
                                    Save
                                </button>
                            </span>
                        </div>
                    @endunless
                </div>
            </form>
        </div>
    </div>
</div>
