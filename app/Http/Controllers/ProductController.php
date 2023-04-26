<?php
namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        return view ('products.products',[
            'heading'=> 'Product Catalog',
         'products' => Product::paginate(5)
    ]);    
    }
    public function show(Product $product){
  return view ('products.product',[
    'product'=> $product

  ]);
    }
    public function create(){
return view ('products.create');

    }
    public function store(Request $request){
        $formFields=$request->validate([
       'unit' => 'required',
       'unitPrice'=>'required|decimal:0,2',
       'category'=>'required',
       'name'=>  'required|unique:products'
        ]);
        Product::create($formFields);
        return redirect('/')->with('success!','A New Product Has been Save');    
        }
}