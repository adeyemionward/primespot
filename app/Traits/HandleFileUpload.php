<?php
namespace App\Traits;

use App\Models\OrderApprovedDesign;
use Illuminate\Http\Request;

trait HandleFileUpload
{
    function handleFileUploadImage($hasFile, $fileName, $dir){
        if ($hasFile) {
            if ($img = $fileName) {
                $ImageName = str_replace(' ', '', $fileName->getClientOriginalName());//$fileName->getClientOriginalName();
                $uniqueFileName = time() . '_' . $ImageName;
                $ImagePath = $dir.'/images/' . $uniqueFileName;
                $img->move(public_path($dir.'/images/'), $uniqueFileName);
                return $ImagePath;
            }
        }
    }

    function handleFileUploadPDF($hasFile, $fileName, $dir){
        if ($hasFile) {
            if ($img = $fileName) {
                $ImageName = str_replace(' ', '', $fileName->getClientOriginalName());//$fileName->getClientOriginalName();
                $uniqueFileName = time() . '_' . $ImageName;
                $ImagePath = $dir.'/pdf/' . $uniqueFileName;
                $img->move(public_path($dir.'/pdf/'), $uniqueFileName);
                return $ImagePath;
            }
        }
    }
}
