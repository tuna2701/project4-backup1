<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
class UploadFileController extends Controller
{
   // public function index() {
   //    return view('uploadfile');
   // }
   public function showUploadFile(Request $request) {
      $file = $request->file('image'); 
      if($file == null){
         return view('uploadfile');
      } else {
         $destinationPath = 'upload/book/';
         $file->move($destinationPath,$file->getClientOriginalName());
         return back();
      }
      //Display File Name
      // echo 'File Name: ' . $file->getClientOriginalName() . '<br>'; 
      
      // //Display File Extension
      // echo 'File Extension: ' . $file->getClientOriginalExtension() . '<br>'; 
      
      // //Display File Real Path
      // echo 'File Real Path: ' . $file->getRealPath() . '<br>'; 
      
      // //Display File Size
      // echo 'File Size: '. $file->getSize() . '<br>'; 
      
      // //Display File Mime Type
      // echo 'File Mime Type: '.$file->getMimeType(); 
      
      //Move Uploaded File
      
   }
}
?>