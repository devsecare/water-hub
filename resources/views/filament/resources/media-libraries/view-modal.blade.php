<div class="space-y-4">
    @if($media->isImage())
        <div class="flex justify-center">
            <img src="{{ $media->url }}" alt="{{ $media->alt_text ?? $media->name }}" class="max-w-full h-auto rounded-lg">
        </div>
    @elseif($media->isVideo())
        <div class="flex justify-center">
            <video src="{{ $media->url }}" controls class="max-w-full rounded-lg"></video>
        </div>
    @endif

    <div class="grid grid-cols-2 gap-4 text-sm">
        <div>
            <strong>Name:</strong><br>
            {{ $media->name }}
        </div>
        <div>
            <strong>Filename:</strong><br>
            {{ $media->file_name }}
        </div>
        <div>
            <strong>Type:</strong><br>
            {{ $media->mime_type }}
        </div>
        <div>
            <strong>Size:</strong><br>
            {{ number_format($media->size / 1024, 2) }} KB
        </div>
        @if($media->width && $media->height)
        <div>
            <strong>Dimensions:</strong><br>
            {{ $media->width }} × {{ $media->height }} px
        </div>
        @endif
        <div>
            <strong>Collection:</strong><br>
            {{ $media->collection }}
        </div>
        <div>
            <strong>Uploaded:</strong><br>
            {{ $media->created_at->format('M d, Y H:i') }}
        </div>
    </div>

    @if($media->alt_text)
    <div>
        <strong>Alt Text:</strong><br>
        {{ $media->alt_text }}
    </div>
    @endif

    @if($media->description)
    <div>
        <strong>Description:</strong><br>
        {{ $media->description }}
    </div>
    @endif

    <div class="pt-4 border-t">
        <a href="{{ $media->url }}" target="_blank" class="inline-flex items-center px-4 py-2 bg-primary-600 text-white rounded-lg hover:bg-primary-700">
            View Full Size
        </a>
    </div>
</div>

