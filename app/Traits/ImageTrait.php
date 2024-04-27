<?php

namespace App\Traits;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Storage;

trait ImageTrait
{
    public function addImage(FormRequest $request): bool
    {
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store($this->getImageStorePath(), 'public');
            $this->{$this->getImageAttributeName()} = $path;

            return $this->save();
        }

        return false;
    }

    public function deleteImage(): bool
    {
        Storage::disk('public')->delete($this->{$this->getImageAttributeName()});
        $this->{$this->getImageAttributeName()} = null;
        return $this->save();
    }

    public function getImageAttributeName(): string
    {
        return "image";
    }

    abstract public function getImageStorePath(): string;
}
