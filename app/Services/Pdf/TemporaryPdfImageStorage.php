<?php

namespace App\Services\Pdf;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class TemporaryPdfImageStorage
{
    private ?string $path = null;

    public function store(?UploadedFile $photo): string
    {
        if ($photo === null) {
            return '';
        }

        Storage::makeDirectory('public/temp');

        $this->path = $photo->store('public/temp');

        return Storage::url($this->path);
    }

    public function cleanup(): void
    {
        if ($this->path !== null) {
            Storage::delete($this->path);
            $this->path = null;
        }
    }
}
