<div class="image-preview" style="max-width: 150px">
    <div class="image__wrapper">
        @if ($image)
            <img src="{{ $image->temporaryUrl() }}" alt="プレビュー" style="max-width: 150px;">
        @elseif ($existingImage)
            <img src="{{ asset('storage/'.$existingImage) }}" alt="現在の画像" style="max-width: 150px;">
        @endif
    </div>
    <div class="file-upload__wrapper">
        <label class="file-upload__btn">
            画像を選択する
            <input wire:model="image" type="file" name="user_image" style="display:none;">
        </label>
        @if($fileName)
            <span class="file__name">{{ $fileName }}</span>
        @endif
    </div>
</div>
