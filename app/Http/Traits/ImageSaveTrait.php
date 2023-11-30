<?php 

namespace App\Http\Traits;


use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;

trait ImageSaveTrait {
    private function saveImage($destination, $attribute , $width = NULL, $height = NULL): string {

        if (!File::isDirectory(base_path().'/public/uploads/'.$destination)){
            File::makeDirectory(base_path().'/public/uploads/'.$destination, 0777, true, true);
        }

        if ($attribute->extension() == 'svg'){
            $file_name = time().Str::random(10).'.'.$attribute->extension();
            $path = 'uploads/'. $destination .'/' .$file_name;
            $attribute->move(public_path('uploads/' . $destination .'/'), $file_name);
            return $path;
        }

        $img = Image::make($attribute);
        if ($width != null && $height != null && is_int($width) && is_int($height)) {
            $img->resize($width, $height, 
            // if son't need to resize comment 'em
            function ($constraint) {
                $constraint->aspectRatio();
            }
        );
        }

        $returnPath = 'uploads/'. $destination .'/' . time().'-'. Str::random(10) . '.' . $attribute->extension();
        $savePath = base_path().'/public/'.$returnPath;
        $img->save($savePath , 85);
        return $returnPath;
    }

    private function updateImage($destination, $new_attribute, $old_attribute , $width = NULL, $height = NULL): string {
        if (!File::isDirectory(base_path().'/public/uploads/'.$destination)){
            File::makeDirectory(base_path().'/public/uploads/'.$destination, 0777, true, true);
        }

        if ($new_attribute->extension() == 'svg'){
            $file_name = time().Str::random(10).'.'.$new_attribute->extension();
            $path = 'uploads/'. $destination .'/' .$file_name;
            $new_attribute->move(public_path('uploads/' . $destination .'/'), $file_name);
            File::delete($old_attribute);
            return $path;
        }

        $img = Image::make($new_attribute);
        if ($width != null && $height != null && is_int($width) && is_int($height)) {
            $img->resize($width, $height, function ($constraint) {
                $constraint->aspectRatio();
            });
        }

        $returnPath = 'uploads/'. $destination .'/' . time().'-'. Str::random(10) . '.' . $new_attribute->extension();
        $savePath = base_path().'/public/'.$returnPath;
        $img->save($savePath, 85);
        File::delete($old_attribute);
        return $returnPath;
    }

    private function deleteFile($path) {
        if ($path == null || $path == '') {
            return null;
        }

        try {
            File::delete($path);
        } catch (\Exception $e) {
            //
        }

        File::delete($path);
    }
}
