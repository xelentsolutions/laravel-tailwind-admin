<?php

namespace App\Traits;
use File;
use Image;
/**
 * Trait UploadAble
 * @package App\Traits
 */
trait ImageUpload
{

    public function UploadImage($path,$filename,$imageWidth,$imageHeight,$destination,$image)
    {

        //Fullsize
        $image->move($path,$filename);

        $image_resize = Image::make($path.''.$filename);
        $image_resize->fit($imageWidth, $imageHeight);
        $image_resize->save($destination.'' .$filename);
    }

    public function deleteOne($path = null)
    {
        if (File::exists($path)) {
            File::delete($path);
        }
    }

}