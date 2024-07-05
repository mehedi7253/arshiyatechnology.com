<?php

use App\Models\Product;
use App\Models\SiteSetting;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

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

if (!function_exists('siteSetting')) {
    function siteSetting()
    {
        $siteSetting = SiteSetting::first();
        return $siteSetting;
    }
}

//item quantity
if (!function_exists('cartData')) {
    function cartData()
    {
        $cartData = session()->get('cart');
        //get how many cart items in the cart
        $cartCount = 0;
        if ($cartData) {
            foreach ($cartData as $key => $value) {
                // $cartCount += $value['quantity'];
                $cartCount = count($cartData);
            }
        }
        return $cartCount;
    }
}

//total price
if (!function_exists('totalPrice')) {
    function totalPrice()
    {
        $cartData = session()->get('cart');
        $totalPrice = 0;
        if ($cartData) {
            foreach ($cartData as $key => $value) {
                $product = Product::find($key);
                if ($product) {
                    $totalPrice += $product->price * $value;
                }
            }
        }
        return $totalPrice;
    }
}
