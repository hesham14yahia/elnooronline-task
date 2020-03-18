<?php

namespace App\Traits;

use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

trait ImageTrait
{

    // image uploader
    public function upload_image($image, $folder, $old_image = null, $width = null, $height = null)
    {
        // check new images exists
        if ($image) {

            // Get Just Image Extension
            $extension = $image->getClientOriginalExtension();

            // Image name for store
            $uploaded_image_name = Str::random(5) . time() . '.' . $extension;

            // Fetch Image
            $img = Image::make($image);

            // check if resize requested
            if ($width !== null or $height !== null)
                // Image resize
                if ($img->width() > $width) {
                    $img->resize($width, $height, function ($constraint) {
                        $constraint->aspectRatio();
                    });
                }

            // check if there is an old image
            if ($old_image !== null && !Str::contains($old_image, $folder)) {

                // remove old image
                unlink(public_path() . '/uploads/' . $folder . '/' . $old_image);
            }

            // Store Image
            $img->save(public_path() . '/uploads/' . $folder . '/' . $uploaded_image_name, 75);

            // return new image name
            return $uploaded_image_name;
        }

        return ($old_image !== null) ? $old_image : null;
    }
}
