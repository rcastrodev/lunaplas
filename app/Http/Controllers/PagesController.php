<?php

namespace App\Http\Controllers;

use SEO;
use App\Data;
use App\Page;
use App\Color;
use App\Product;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class PagesController extends Controller
{
    private $data;

    public function __construct()
    {
        $this->data = Data::first();
    }

    public function home()
    {
        $page = Page::where('name', 'inicio')->first();
        SEO::setTitle('home');
        SEO::setDescription($page->keywords);

        /** Secciones de página */
        $sections = $page->sections;
        $section1 = $sections->where('name', 'section_1')->first(); // section1 == sección de slider
        $section2 = $sections->where('name', 'section_2')->first()->contents()->first();
        $section1s  = $section1->contents()->orderBy('order', 'ASC')->get();
        $categories = Category::orderBy('order', 'ASC')->get();
        $products = Product::where('outstanding', 1)->orderBy('order', 'ASC')->take(4)->get();
        return view('paginas.index', compact('section1s', 'section2', 'categories', 'products'));
    }

    public function productos(Request $request)
    {
        if(! $request->get('b')){
            $categories = Category::orderBy('order', 'ASC')->get();
            $products = null;
        }else{
            $products = Product::where('name', 'like', "%{$request->get('b')}%")->orderBy('order', 'ASC')->get(); 
            $categories = null;
        }
            
        if ($categories or $products) {
            $page = Page::where('name', 'productos')->first();
            SEO::setTitle("Productos");   
        }
        
        return view('paginas.productos', compact('categories', 'products'));
    }
    
    public function categoria($id)
    {
        $category = Category::findOrFail($id);
        SEO::setTitle($category->name);
        $products = $category->products;
        $categories = Category::all();
        
        return view('paginas.productos-por-categoria', compact('category', 'categories', 'products'));
    }

    public function producto(Request $request, Product $product)
    {
        $categories = Category::all();
        if ($product) {
            SEO::setTitle($product->name);
            SEO::setDescription($product->description);
        }
        $relatedProducts = $product->category->products()->where('id', '<>', $product->id)->inRandomOrder()->get();
        if(count($relatedProducts) > 2)
            $relatedProducts = $relatedProducts->take(3);
        
        $vps = session('vps');
        
        return view('paginas.producto', compact('product', 'categories', 'relatedProducts', 'vps'));
    }

    public function calidad()
    {
        $page = Page::where('name', 'calidad')->first();
        $section1 = $page->sections()->first()->contents()->first();
        SEO::setTitle("calidad");
        return view('paginas.calidad', compact('section1'));
    }

    public function empresa()
    {
        $page = Page::where('name', 'quienes somos')->first();
        SEO::setTitle('quienes somos');
        /** Secciones de página */
        $sections = $page->sections;
        $section1 = $sections->where('name', 'section_1')->first(); // section1 == sección de slider
        $section2 = $sections->where('name', 'section_2')->first(); // section2 == sección de ribbon
        $sliders    =  $section1->contents()->orderBy('order', 'ASC')->get();
        $company    =  $section2->contents()->first();
        $section3   =  $sections->where('name', 'section_3')->first()->contents()->first();
        return view('paginas.empresa', compact('sliders', 'company', 'section3'));
    }

    public function contacto()
    {
        $page = Page::where('name', 'contacto')->first();
        SEO::setTitle("Contacto");    
        return view('paginas.contacto');
    }

    public function fichaTecnica($id)
    {
        $producto = Product::findOrFail($id);  
        return Response::download($producto->extra);  
    }

}
