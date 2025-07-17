<div>
    <div class="image-preview" style="max-width: 300px">
        {{-- 新しい画像があれば表示 --}}
        @if ($image)
            <img src="{{ $image->temporaryUrl() }}" alt="プレビュー" style="max-width: 300px; margin-bottom: 10px;">
        {{-- 新しい画像が未選択なら既存画像 --}}
        @elseif ($existingImage)
            <img src="{{ asset('storage/' . $existingImage) }}" alt="現在の画像" style="max-width: 300px; margin-bottom: 10px;">
        @endif
    </div>
</div>
