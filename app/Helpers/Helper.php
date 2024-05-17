<?php

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\File;

if(!function_exists('success'))
{
    function success(string $message = 'Success', $data = [], int $statusCode = 200, bool $success = true): JsonResponse
    {
        return response()->json([
            'success' => $success,
            'message' => $message,
            'data' => $data,
        ], $statusCode);
    }
}

if(!function_exists('error'))
{
    function error($message = 'Error', $data = [], $statusCode = 404, $error = true): JsonResponse
    {
        return response()->json([
            'error' => $error,
            'message' => $message,
            'data' => $data,
        ], $statusCode);
    }
}

if (!function_exists('makeDirectory')) {
    function makeDirectory($location): void
    {
        if (!File::isDirectory(public_path() . $location)) {
            File::makeDirectory(public_path() . $location, 0777, true, true);
        }
    }
}

if (!function_exists('deleteDirectory')) {
    function saveImage($image, $location): string
    {
        makeDirectory($location);
        $imageName = random_int(10000000, 99999999) . '.' . $image->getClientOriginalExtension();
        $image->move(public_path() . $location, $imageName);

        return $location . $imageName;
    }
}

// Delete Image
if (!function_exists('deleteImage')) {
    function deleteImage($image): void
    {
        if (File::exists(public_path() . $image)) {
            File::delete(public_path() . $image);
        }
    }
}


if (!function_exists('test')) {
    function test()
    {
        return "sdfjsdbf";
    }
}
