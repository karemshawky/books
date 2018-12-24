<?php

namespace App\Helpers;

use Image;
use Illuminate\Http\Request;

class AllUploads
{
    
    /**
     * Upload one image
     *
     * @param Request $request
     * @param mixed string $photoName
     * @param mixed string $path
     * @param mixed int $width
     * @param mixed int $height
     * @return string
     */
    public function uploadImage(Request $request, string $photoName = null, string $path = null, int $width = null, int $height = null)
    {
        if ($request->hasFile($photoName)) 
        {
            $imagename = date('Y-m-d') . str_random(10) . '.' . $request->$photoName->getClientOriginalExtension();
            $img = Image::make($request->$photoName->getRealPath());
            if ($width || $height) 
            {
                $img->resize($width, $height);
            }
            $img->save($path . '/' . $imagename, 80);
            return $imagename;
        }
    }

    /**
     * Upload Multiple Images
     *
     * @param Request $request
     * @param mixed string $photoName
     * @param mixed string $path
     * @param mixed int $width
     * @param mixed int $height
     * @return array
     */
    public function uploadImages(Request $request, string $photoName = null, string $path = null, int $width = null, int $height = null)
    {
        if ($request->filled($photoName))
         {
            foreach ($request->file($photoName) as $key => $photo) 
            {
                $imagename = date('Y-m-d') . str_random(10) . '.' . $photo->getClientOriginalExtension();
                $img = Image::make($photo->getRealPath());
                if ($width || $height) 
                {
                    $img->resize($width, $height);
                }
                $img->save($path . '/' . $imagename, 80);
                $name[] = $imagename;
            }
            return $name;
        }
    }

    /**
     * Upload Multiple Files
     *
     * @param Request $request
     * @param mixed string $fileName
     * @param mixed string $path
     * @return array
     */
    public function uploadFiles(Request $request, string $fileName = null, string $path = null)
    {
        if ($request->hasFile($fileName)) 
        {
            foreach ($request->file($fileName) as $key => $file) 
            {
                $docName = date('Y-m-d') . str_random(10) . '.' . $file->getClientOriginalExtension();
                $file->storeAs($path, $docName);
                $name[] = $docName;
            }
            return $name;
        }
    }
}
