<?php

namespace App\Http\Controllers;

use App\Page;
use App\Content;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\CompanyInfoRequest;
use App\Http\Requests\CompanySliderRequest;

class QualityController extends Controller
{
    protected $page;

    public function __construct(){
        $this->page = Page::where('name', 'calidad')->first();
    }


    public function content()
    {
        $sections   = $this->page->sections;
        $section1   = $sections->where('name', 'section_1')->first()->contents()->first();
        return view('administrator.quality.content', compact('section1'));
    }

    public function updateInfo(Request $request)
    {
        $element = Content::find($request->input('id'));
        $data = $request->all();    
        if($request->hasFile('image')){
            if(Storage::disk('custom')->exists($element->image))
                Storage::disk('custom')->delete($element->image);
            
            $data['image'] = $request->file('image')->store('images/quality','custom');
        }  
        if($request->hasFile('content_2')){
            if(Storage::disk('custom')->exists($element->content_2))
                Storage::disk('custom')->delete($element->content_2);
            
            $data['content_2'] = $request->file('content_2')->store('images/quality','custom');
        }  
        $element->update($data);
        return back();
    }


    public function destroy($id)
    {
        $element = Content::find($id);
        if(Storage::disk('custom')->exists($element->image))
            Storage::disk('custom')->delete($element->image);

        $element->delete();
        return response()->json([], 200);
    }
}
