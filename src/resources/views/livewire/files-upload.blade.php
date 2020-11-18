<div class="md:col-span-2">
    {{-- @if ($file)
        Temporary URL <a href="{{ asset($file->temporaryUrl()) }}" target="_blank"
            rel="noopener noreferrer">{{ asset($file->temporaryUrl()) }}</a>
    @endif --}}

    <form wire:submit.prevent="save">
        <div class="shadow sm:rounded-md sm:overflow-hidden">
            <div class="px-4 py-5 bg-white sm:p-6">
                <div class="flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                    <div class="text-center">
                        <svg viewBox="0 0 74 74" class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none"><text font-family="ArialMT, Arial" font-size="18" transform="translate(31.995 -17.877)">2<tspan x="-5.005" y="124">12</tspan><tspan x="-5.005" y="248">22</tspan><tspan x="-5.005" y="372">32</tspan><tspan x="-5.005" y="496">42</tspan><tspan x="-5.005" y="620">52</tspan><tspan x="-5.005" y="744">62</tspan><tspan x="-5.005" y="868">72</tspan><tspan x="-5.005" y="992">82</tspan><tspan x="-5.005" y="1116">92</tspan><tspan x="-10.011" y="1240">102</tspan><tspan letter-spacing="-.074em" x="-9.343" y="1364">1</tspan><tspan x="-.668" y="1364">12</tspan><tspan x="-10.011" y="1488">122</tspan><tspan x="-10.011" y="1612">132</tspan><tspan x="-10.011" y="1736">142</tspan><tspan x="-10.011" y="1860">152</tspan><tspan x="-10.011" y="1984">162</tspan><tspan x="-10.011" y="2108">172</tspan><tspan x="-10.011" y="2232">182</tspan><tspan x="-10.011" y="2356">192</tspan><tspan x="-10.011" y="2480">202</tspan><tspan x="-10.011" y="2604">212</tspan><tspan x="-10.011" y="2728">222</tspan><tspan x="-10.011" y="2852">232</tspan><tspan x="-10.011" y="2976">242</tspan><tspan x="-10.011" y="3100">252</tspan><tspan x="-10.011" y="3224">262</tspan><tspan x="-10.011" y="3348">272</tspan><tspan x="-10.011" y="3472">282</tspan><tspan x="-10.011" y="3596">292</tspan></text><path d="M60.12 51.46h-8.43a1 1 0 010-2h8.43a9.883 9.883 0 009.807-11.12A10.127 10.127 0 0059.7 29.69h-.78a1 1 0 01-.981-1.2A15.936 15.936 0 0058 22.555a15.312 15.312 0 00-.761-2.712 1 1 0 111.872-.7 17.286 17.286 0 01.858 3.065A18 18 0 0160.1 27.7a12.11 12.11 0 0111.813 10.4A11.883 11.883 0 0160.12 51.46zM40.579 9.98a1 1 0 01-.128-1.992 17.732 17.732 0 013.257-.116 1 1 0 01-.116 2 15.449 15.449 0 00-2.883.1.955.955 0 01-.13.008zM22.31 51.47h-8.43A11.893 11.893 0 012.087 38.11a12.11 12.11 0 0111.881-10.4 13.753 13.753 0 0112.957-9.983 17.888 17.888 0 014.595-5.86A1 1 0 1132.8 13.4a15.865 15.865 0 00-4.335 5.756.988.988 0 01-.98.594l-.183-.016c-.06 0-.118-.012-.182-.012a11.733 11.733 0 00-11.393 9.193 1 1 0 01-.977.787h-.45a10.125 10.125 0 00-10.227 8.65A9.892 9.892 0 0013.88 49.47h8.43a1 1 0 110 2zM52.979 13.44a1 1 0 01-.63-.224 14.743 14.743 0 00-2.415-1.581 1 1 0 11.932-1.77 16.81 16.81 0 012.745 1.8 1 1 0 01-.632 1.776z"/><path d="M37 66.159a15.69 15.69 0 1115.69-15.69A15.708 15.708 0 0137 66.159zm0-29.38a13.69 13.69 0 1013.69 13.69A13.705 13.705 0 0037 36.779z"/><path d="M37 58.194a1 1 0 01-1-1V43.745a1 1 0 012 0v13.449a1 1 0 01-1 1z"/><path d="M41.235 48.98a1 1 0 01-.707-.293L37 45.159l-3.528 3.528a1 1 0 11-1.414-1.414l4.235-4.235a1 1 0 011.414 0l4.235 4.235a1 1 0 01-.707 1.707z"/></svg>
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
        </div>
    </form>
</div>
