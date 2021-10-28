<?php

namespace App\Http\Controllers\Chat;

use App\Http\Controllers\Controller;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UploadUserImgController extends Controller
{
    public function upload(Request $request){
        $success = false;
        $message = "Ha ocurrido un error.";
        $imageUrl = null;

        if ($request->hasFile('image')){
            $image = $request->file('image');

            $responseValidation = $this->imageValidator($image);
            if ($responseValidation['success']){
                $urlUpload = $this->uploadImage($image);
                $this->updateUserImage($urlUpload);

                $imageUrl = $urlUpload;
                $success = true;
            }
            else{
                $message = $responseValidation['message'];
            }
        }

        return response()->json([
            'success' => $success,
            'message' => $message,
            'image' => $imageUrl
        ], Response::HTTP_CREATED);
    }

    private function updateUserImage($urlUploadImage){
        (new UserService())->updateUserImage($urlUploadImage);
    }

    private function uploadImage($image){
        $newName = rand() . '.' . $image->getClientOriginalExtension();
        $imagePath = "images/avatars/" . getUser()->id;
        $image->move(public_path($imagePath), $newName);

        return '/' . $imagePath . '/' . $newName;
    }

    private function imageValidator($image){
        $imageExtencions = ['jpg', 'jpeg', 'png'];
        $response = [
            'success' => false,
            'message' => 'Imagen no tiene formato correcto. Formatos permitidos: jpg, jpeg, png'
        ];
        if (in_array($image->getClientOriginalExtension(), $imageExtencions)) {
            $response['success'] = true;
            $response['message'] = "";
        }
        return $response;
    }
}
