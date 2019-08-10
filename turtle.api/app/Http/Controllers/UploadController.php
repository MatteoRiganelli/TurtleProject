<?php

namespace App\Http\Controllers;

use App\Model\Avatar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

class UploadController extends Controller
{
    //
    /**
     * Handling the forgot password email request
     **/
    public function uploadAvatarImage(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'image' => 'required|image64:jpeg,jpg,png',
            'idUser' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(
                [   'data' => 'problem with the data passed',
                    'errors' => $validator->errors()]);
        } else {
            $idUser = $request->input('idUser');
            $imageData = $request->get('image');

            // $fileName = Carbon::now()->timestamp . '_' . uniqid() . '.' . explode('/', explode(':', substr($imageData, 0, strpos($imageData, ';')))[1])[1];
            $fileName = 'AvatarId' . '_' . $idUser . '.' . explode('/', explode(':', substr($imageData, 0, strpos($imageData, ';')))[1])[1];

            $path = public_path() .'/images/' . $idUser . '/';

            $avatar = new Avatar([
                'user_id' => $idUser,
                'image_path' => $path . $fileName
            ]);

            $avatar->save();

            File::makeDirectory($path, $mode = 0777, true, true);
            Image::make($request->get('image'))->save($path . $fileName);
            return response()->json(
                [   'data' => 'image saved!',
                    'error' => false]);
        }
    }
}
