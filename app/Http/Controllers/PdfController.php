<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;

// use Intervention\Image\Facades\Image;
// use Imagick;

class PdfController extends Controller
{
    // Show upload form
    public function showUploadForm()
    {
        return view('pdf.upload');
    }

    // private function generatePdfThumbnail($pdfPath, $thumbnailPath)
    // {
    //     $imagick = new Imagick();
    //     $imagick->setResolution(150, 150);
    //     $imagick->readImage("{$pdfPath}[0]"); // First page
    //     $imagick->setImageFormat('jpg');
    //     $imagick->writeImage($thumbnailPath);
    //     $imagick->clear();
    //     $imagick->destroy();
    // }

    // Handle PDF upload
    public function upload(Request $request)
    {
        $request->validate([
            'pdf' => 'required|mimes:pdf|max:2048', // Validate PDF file
        ]);

        $pdfFile = $request->file('pdf');
        $pdfPath = $pdfFile->store('pdfs', 'public');
        
        // $thumbnailPath = 'thumbnails/' . pathinfo($pdfFile->hashName(), PATHINFO_FILENAME) . '.jpg';
        // $this->generatePdfThumbnail(storage_path("app/public/{$pdfPath}"), storage_path("app/public/{$thumbnailPath}"));

        // return redirect()->route('pdf.list');
        return redirect()->route('pdf.view', ['filename' => basename($pdfPath)]);
    }

    // List all uploaded PDFs
    public function list()
    {
        $files = Storage::disk('public')->files('pdfs');
        return view('pdf.list', compact('files'));
    }

    // Display PDF
    public function view($filename)
    {
        $path = storage_path("app/public/pdfs/{$filename}");

        if (!file_exists($path)) {
            abort(404);
        }

        return response()->file($path);
    }

    


    // 
}
