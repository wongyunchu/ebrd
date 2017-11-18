<?php

namespace App\Http\Controllers;

use App\Atcfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;
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
        //return "ddddddd";

        $ext = strtoupper($image->getClientOriginalExtension());
        $file_size = ($image->getClientSize())/1000000;

        return "aa".$ext;

        if($ext == 'JPG' || $ext == 'GIF'|| $ext == 'PNG') {
            $location = public_path('images\tb_'.$filename);
            //Image::make($image)->resize(800, 400)->save($location);
            Image::make($image)->resize(null, 200, function ($constraint) {
                $constraint->aspectRatio();
            })->save($location);
        }

        $image->move(public_path('images'),$filename);

        $atcFile = new Atcfile();
        $atcFile->name      = $filename;
        $atcFile->org_name  = $org_name;
        $atcFile->size      = $file_size;
        $atcFile->path      = '';

        try {
            $aa = $atcFile->save();
        } catch (\Exception $e) {
            return response()->json(['fail'=>$e->errorInfo]);
        }

        //return response()->json(['success'=>['file_id'=>$atcFile->id, 'file_name'=>$atcFile->org_name]]);
        return response()->json(['success'=>['file_name'=>$atcFile->org_name.'|'.$atcFile->name.'|'.$atcFile->id]]);
    }

    public function dropzoneRemove(Request $request)
    {
        $filename = Input::get('val');
        $originalFilename = $filename;
        $sFilePath = public_path('images').'\\'.$originalFilename;


        if ( File::exists($sFilePath) )
        {
            File::delete( $sFilePath );
        }
        $deleteRow = Atcfile::where('name', $filename)->delete();
        return Response::json([
            'resut'=> $deleteRow,
            'error' => false,
            'code'  => 200
        ], 200);
    } 
}
