<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
class ProductController extends Controller
{
    public function index() {
        $product=Product::all();
        return view('backend.product.all',compact('product'));
    }
    public function create()
    {
        return view('backend.product.create');
    }
    public function store(Request $request)
    {
   
        $request->validate([
            'product_name' => 'required|unique:product|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $allowedMimeTypes = ['image/jpeg', 'image/png', 'image/gif'];
            if (!in_array($image->getMimeType(), $allowedMimeTypes)) {
                return redirect()->back()->with('error', 'Lütfen sadece jpeg, png veya gif formatındaki resim dosyalarını yükleyin.');
            }

            if ($image->getSize() > 4096) {
                return redirect()->back()->with('error', 'Dosya boyutu 2MB\'dan küçük olmalıdır.');
            }
            $image->storeAs('public/product', $imageName);
        }
        $product =new  Product();
        $product->image = $imageName;
        $product->product_name = $request->product_name;
        $product->save();
        return redirect()->route('product.all')->with('success', 'Ürün başarıyla oluşturuldu.');
    }
}
