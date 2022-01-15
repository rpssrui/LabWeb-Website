<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\File;
use Barryvdh\DomPDF\Facade as PDF;
use App\Models\Candidatura;
use Illuminate\Support\Facades\Storage;

class PDFController extends Controller
{
     public function generatePDF($id)
    {

        $candidatura=Candidatura::find($id);
        $filePath=$candidatura->file_path;


       // error_log ($filePath);
        return Storage::download($filePath);
      // return redirect()->back();
}

  /*  public function fileUpload()
    {
        return view('fileUpload');
    }

    public function fileUploadPost(Request $request,$id)
    {

        $user=User::find($id);

        if ($request->hasFile('file')) {
            $filename = $request->file->getClientOriginalName();
            $request->file->storeAs('uploads', $filename, 'public');
            $user->update(['file_name' => $filename]);
        }
        return redirect()->back();


}*/
}
