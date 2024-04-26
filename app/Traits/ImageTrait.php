<?php

namespace App\Traits;

use Exception;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;

trait ImageTrait
{

    /**
     * @throws Exception
     */
    public function __construct()
    {
        if (!Schema::hasColumn($this->getTable(), $this->getImageAttribute())) {
            throw new Exception('Property ' . $this->getImageAttribute() . ' does not exist in ' . get_class($this));
        }

        if (!method_exists($this, 'save')) {
            throw new Exception('Method save() does not exist in ' . get_class($this));
        }
    }

    public function addImage(FormRequest $request): bool
    {
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store($this->getImageStorePath(), 'public');
            $this->{$this->getImageAttribute()} = $path;

            return $this->save();
        }

        return false;
    }

    public function deleteImage(): bool
    {
        Storage::disk('public')->delete($this->{$this->getImageAttribute()});
        $this->{$this->getImageAttribute()} = null;
        return $this->save();
    }

    public function getImageAttribute(): string
    {
        return "image";
    }

    abstract public function getImageStorePath(): string;
}
