<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

trait ImageTrait
{
    /**
     * upload image
     *
     * @author Krishna Priya
     */
    public function uploadImage($file, $directory)
    {
        // $imageName  = Str::uuid() . '.' . $file->getClientOriginalExtension();
        // $file->storeAs('public/uploads/' . $directory, $imageName);
        // return $imageName;
        $imageName = Str::uuid() . '.' . $file->getClientOriginalExtension();

    // ✅ Store in 'uploads/config' on the 'public' disk
    $file->storeAs('uploads/' . $directory, $imageName, 'public');

    return $imageName;
    }

    /**
     * Delete the image file associated with the model.
     *
     * @return void
     */
    public function deleteImage($fieldName)
    {
        if ($this->$fieldName){
            if (Storage::disk('public')->exists($this->$fieldName)) {
                Storage::disk('public')->delete($this->$fieldName);
                return true;
            } else {
                return false;
            }
    } else {
            return false;
        }
    }
}
