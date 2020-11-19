<div class="flex w-full mb-10">
    <div
        class="border border-gray-100 px-2 shadow mr-5 flex items-center rounded text-sm text-gray-400 bg-cool-gray-50 uppercase relative h-13">
        {{ $file_extension ?? '...' }}
        <hr class="border-4 border-green-400 absolute bottom-0 left-0 right-0 rounded">
    </div>
    <div class="flex-1">
        <div class="flex content-between">
            <div class="flex-1">
                <p class="truncate ... w-40">{{ $file_name ?? 'Uploading' }}</p>
                <span class="text-gray-400 text-xs uppercase" x-text="isUploading ? `...` : `completed`"></span>
            </div>
            <div>
                @if ($completed)
                    <span class="inline-block text-gray-400 text-sm">100%</span>
                    <x-eva-checkmark-circle class="text-green-300 inline-block w-5" />
                @else
                    <span class="inline-block text-gray-400 text-sm" x-text="`${progress}%`"></span>
                    {{-- <x-eva-close-circle class="text-red-300 inline-block w-5" /> --}}
                @endif
            </div>
        </div>
        <div class="relative pt-1">
            <div class="h-1 w-full rounded bg-pink-100">
                @if ($completed)
                    <div class="bg-pink-400 w-full h-1 rounded"></div>
                @else
                    <div :style="`width: ${progress}%`" class="bg-pink-400 h-1 rounded"></div>
                @endif
            </div>
        </div>
    </div>
</div>
