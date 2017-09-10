<?php

namespace App\Http\Controllers;

use App\Atcfile;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class FileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Image Upload Code
     *
     * @return void
     */
    public function dropzoneStore(Request $request)
    {
        $image = $request->file('file');
        $org_name = $image->getClientOriginalName();
        $filename = time()."_".uniqid('file_').".".$image->getClientOriginalExtension();

        $ext = strtoupper($image->getClientOriginalExtension());
        if($ext == 'JPG' || $ext == 'GIF'|| $ext == 'PNG') {
            $location = public_path('images\tb_'.$filename);
            //Image::make($image)->resize(800, 400)->save($location);
            Image::make($image)->resize(null, 200, function ($constraint) {
                $constraint->aspectRatio();
            })->save($location);;
        }
        $image->move(public_path('images'),$filename);

        $atcFile = new Atcfile();
        $atcFile->name      = $filename;
        $atcFile->org_name  = $org_name;
        try {
            $aa = $atcFile->save();
        } catch (\Exception $e) {
            return response()->json(['fail'=>$e->errorInfo]);
        }





        //return response()->json(['success'=>['file_id'=>$atcFile->id, 'file_name'=>$atcFile->org_name]]);
        return response()->json(['success'=>['file_name'=>$atcFile->org_name.'|'.$atcFile->name.'|'.$atcFile->id]]);
    }
}
