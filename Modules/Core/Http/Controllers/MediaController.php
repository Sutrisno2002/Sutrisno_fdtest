<?php

namespace Modules\Core\Http\Controllers;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Modules\Common\Services\ImageService;

class MediaController extends Controller
{
    public function resize(Request $request)
    {
        $service = new ImageService();
        return $service->convertWhileFetch($request->src, [
            'w' => $request->w,
            'h' => $request->h,
        ]);
    }

    public function uploadImage(Request $request)
    {
        try {
            $uploaded = $request->compress ?
            (new ImageService)->storeOriginalImage($request->file('image')) :
            (new ImageService)->storeImage($request->file('image'));

            if ($request->ref == 'editor') {
                return response()->json([
                    'status' => 200,
                    'message' => 'Image uploaded successfully.',
                    'link' => $uploaded,
                ]);
            }

            return response()->json([
                'status' => 200,
                'message' => 'Image uploaded successfully.',
                'data' => [
                    'filepath' => $uploaded,
                ],
            ], 200);
        } catch (Exception $exception) {
            Log::error($exception->getMessage());

            return response()->json([
                'status' => 500,
                'message' => $exception->getMessage(),
            ], 500);
        }
    }

    public function destroyImage(Request $request)
    {
        $service = new ImageService();

        try {
            $service->removeImage('images', $request->image);

            return response()->json([
                'status' => 200,
                'message' => 'Image removed successfully.',
                's' => $service,
            ], 200);
        } catch (Exception $exception) {
            Log::error($exception->getMessage());
            return response()->json([
                'status' => 500,
                'message' => $exception->getMessage(),
            ], 500);
        }
    }
}
