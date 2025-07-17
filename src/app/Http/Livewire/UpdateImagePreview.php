<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class UpdateImagePreview extends Component
{
    use WithFileUploads;

    public $image; // 新しく選んだ画像
    public $existingImage; // DBに保存された画像

    public function mount($existingImagePath)
    {
        $this->existingImage = $existingImagePath;
    }

    public function updatedImage()
    {
        // 既存画像の表示は非表示に（オプション）
        $this->existingImage = null;
    }

    public function render()
    {
        return view('livewire.update-image-preview');
    }
}
