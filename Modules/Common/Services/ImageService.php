<?php

namespace Modules\Common\Services;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class ImageService
{
    /**
     * Converting image by get request
     * Return new converted image
     *
     * @param  url $resource (url without origin)
     * @param  \Illuminate\Http\Request $data ($request->w || $request->h in array)
     * @return void
     */
    public function convertWhileFetch($resource, $data = [])
    {
        $h = 600;
        $w = 600;

        $image = Image::make($resource);

        if ($data['h'] && $data['w']) {
            $image->resize($data['w'], $data['h']);
        } elseif ($data['w'] && !$data['h']) {
            $image->resize($data['w'], null, function ($constraint) {
                $constraint->aspectRatio();
            });
        } elseif ($data['h'] && !$data['w']) {
            $image->resize(null, $data['h'], function ($constraint) {
                $constraint->aspectRatio();
            });
        } elseif (array_key_exists('h', $data) && array_key_exists('w', $data)) {
            $image->height() > $image->width() ? $w = null : $h = null;
            $image->resize($w, $h, function ($constraint) {
                $constraint->aspectRatio();
            });
        }

        if (isset($data['format'])) {
            return $image->response($data['format']);
        }

        return $image->response('jpg');
    }

    /**
     * Upload original image to storage
     *
     * @param  Illuminate\Http\Request $fileInput ($request->file('input_name'))
     * @return string Image Url
     */
    public function storeOriginalImage($fileInput): string
    {
        $file = [
            'path' => 'app/public/images/' . now()->toDateString(),
            'name' => Str::random(12) . '.' . $fileInput->extension(),
        ];
        $path = storage_path($file['path'] . '/' . $file['name']);
        if (!Storage::exists('public/images/' . now()->toDateString())) {
            Storage::disk('images')->makeDirectory(now()->toDateString());
        }
        $image = Image::make($fileInput->getRealPath());
        $image->save($path);
        return '/storage/images/' . now()->toDateString() . '/' . $file['name'];
    }

    /**
     * Upload base64 image to storage without resizing or compressing
     *
     * @param  string $fileInput (base64 encoded)
     * @return string
     */
    public function storeImageFromBase64Original($fileInput): string
    {
        preg_match("/data:image\/(.*?);/", $fileInput, $imageExtension); // Extract the image extension
        $image = preg_replace('/data:image\/(.*?);base64,/', '', $fileInput); // Remove the type part
        $image = str_replace(' ', '+', $image); // Replace spaces with +

        $file = [
            'path' => 'app/public/images/' . now()->toDateString(),
            'name' => Str::uuid() . '.' . $imageExtension[1], // Unique filename with extension
        ];

        if (!Storage::exists('public/images/' . now()->toDateString())) {
            Storage::disk('images')->makeDirectory(now()->toDateString());
        }

        $path = storage_path($file['path'] . '/' . $file['name']);

        // Decode base64 image and save directly to storage
        file_put_contents($path, base64_decode($image));

        return '/storage/images/' . now()->toDateString() . '/' . $file['name'];
    }


    /**
     * Upload base 64 image to storage
     *
     * @param  string $fileInput (base64 encoded)
     * @param  int $width
     * @param  int $quality <= 100
     * @return string
     */
    public function storeImageFromBase64($fileInput, $width = 600, $quality = 90): string
    {
        preg_match("/data:image\/(.*?);/", $fileInput, $image_extension); // extract the image extension
        $image = preg_replace('/data:image\/(.*?);base64,/', '', $fileInput); // remove the type part
        $image = str_replace(' ', '+', $image);

        $file = [
            'path' => 'app/public/images/' . now()->toDateString(),
            'name' => Str::uuid() . '.' . $image_extension[1],
        ];

        if (!Storage::exists('public/images/' . now()->toDateString())) {
            Storage::disk('images')->makeDirectory(now()->toDateString());
        }

        $path = storage_path($file['path'] . '/' . $file['name']);

        $image = Image::make(file_get_contents($fileInput));
        $image->resize($width, null, function ($constraint) {
            $constraint->aspectRatio();
        });

        $image->save($path, $quality);

        return '/storage/images/' . now()->toDateString() . '/' . $file['name'];
    }

    /**
     * Upload image to storage
     *
     * @param  Illuminate\Http\Request $fileInput ($request->file('input_name'))
     * @param  int $width
     * @param  int $quality
     * @return string
     */
    public function storeImage($fileInput, $width = 600, $quality = 90): string
    {
        $file = [
            'path' => 'app/public/images/' . now()->toDateString(),
            'name' => Str::uuid() . '.' . optional($fileInput)->extension() ?? 'jpg',
        ];

        $path = storage_path($file['path'] . '/' . $file['name']);

        if (!Storage::exists('public/images/' . now()->toDateString())) {
            Storage::disk('images')->makeDirectory(now()->toDateString());
        }

        $image = Image::make(optional($fileInput)->getRealPath());
        $image->resize($width, null, function ($constraint) {
            $constraint->aspectRatio();
        });

        $image->save($path, $quality);
        return '/storage/images/' . now()->toDateString() . '/' . $file['name'];
    }

    /**
     * Update image to public storage
     *
     * @param  Illuminate\Http\Request $fileInput ($request->file('input_name'))
     * @param  string $oldImagePath
     * @param  boolean $compress
     * @param  string $disk
     * @param  int $width
     * @param  int $quality (0-100)
     * @return string
     */
    public static function updateImage($fileInput, $oldImagePath, $compress = true, $disk = 'images', $width = 600, $quality = 90): string
    {
        switch ($compress) {
            case false:
                $path = self::storeOriginalImage($fileInput);
                self::removeImage($disk, $oldImagePath);
                return $path;
                break;
            case true:
                $path = self::storeImage($fileInput, $width, $quality);
                self::removeImage($disk, $oldImagePath);
                return $path;
                break;

            default:
                $path = self::storeImage($fileInput, $width, $quality);
                self::removeImage($disk, $oldImagePath);
                return $path;
                break;
        }
    }

    /**
     * Find exsisting image at storage
     *
     * @param  string $disk
     * @param  string $shortPath
     * @return void
     */
    public function findImage($disk, $shortPath)
    {
        $path = storage_path('app/public/' . $disk . '/' . $shortPath);

        if (!File::exists($path)) {
            return false;
        }

        return File::get($path);
    }

    /**
     * Remove image from storage
     *
     * @param  string $disk
     * @param  string $shortPath (date/filename.jpg)
     * @return void
     */
    public function removeImage($disk, $shortPath)
    {
        $path = explode('/', $shortPath);
        $processed = implode('/', array_slice($path, -2, 2));
        $path = storage_path('app/public/' . $disk . '/' . $processed);

        if (!File::exists($path)) {
            return false;
        }

        return File::delete($path);
    }
}
