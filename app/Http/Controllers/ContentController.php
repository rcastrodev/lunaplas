<?php

namespace App\Http\Controllers;

use App\Content;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;

class ContentController extends Controller
{
    public function content()
    {
        return null;
    }

    public function findContent($id)
    {
        $content = Content::find($id);
        return response()->json(['content' => $content]);
    }

    public function destroyArchive($column, $id)
    {
        $element = content::find($id);
        if (Storage::disk('custom')->exists($element->$column)) 
            Storage::disk('custom')->delete($element->$column);

        
        $element->$column = NULL;
        $element->save();
        return response()->json([], 200);
    }

    public function downloadArchive($column, $id)
    {
        $element = Content::findOrFail($id);  
        if (Storage::disk('custom')->exists($element->$column)) 
            return Response::download($element->$column);  
        else
            return back(); 
    }
}
