<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index(){
        $products = Product::all();
        return view('product.index', ['products' => $products]);
    }

    public function create(){
        return view('product.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'category' => 'required',
            'color' => 'required',
            'size' => 'required',
            'quantity' => 'required|numeric',
            'initial_price' => 'required|numeric',
            'last_rented_price' => 'required|numeric',
            'description' => 'nullable',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $path = 'uploads/category/';
            $file->move(public_path($path), $filename);
            $data['image'] = $path . $filename;
        }

        $newProduct = new Product();
        $newProduct->name = $data['name'];
        $newProduct->category = $data['category'];
        $newProduct->color = $data['color'];
        $newProduct->size = $data['size'];
        $newProduct->quantity = $data['quantity'];
        $newProduct->initial_price = $data['initial_price'];
        $newProduct->last_rented_price = $data['last_rented_price'];
        $newProduct->description = $data['description'];
        $newProduct->image = $data['image'] ?? null;
        $newProduct->save();

        return redirect()->route('product.index')->with('success', 'Product created successfully.');
    }

    public function edit(Product $product){
        return view('product.edit', ['product' => $product]);
    }

    public function update(Product $product, Request $request){
        $data = $request->validate([
            'name' => 'required',
            'category' => 'required',
            'color' => 'required',
            'size' => 'required',
            'quantity' => 'required|numeric',
            'initial_price' => 'required|numeric',
            'last_rented_price' => 'required|numeric',
            'description' => 'nullable',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        if ($request->hasFile('image')) {
            if ($product->image) {
                Storage::delete('public/' . $product->image);
            }
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $path = 'uploads/category/';
            $file->move(public_path($path), $filename);
            $data['image'] = $path . $filename;
        }

        $product->name = $data['name'];
        $product->category = $data['category'];
        $product->color = $data['color'];
        $product->size = $data['size'];
        $product->quantity = $data['quantity'];
        $product->initial_price = $data['initial_price'];
        $product->last_rented_price = $data['last_rented_price'];
        $product->description = $data['description'];
        $product->image = $data['image'] ?? $product->image;
        $product->save();

        return redirect()->route('product.index')->with('success', 'Product updated successfully.');
    }

    public function delete(Product $product){
        if ($product->image) {
            Storage::delete('public/' . $product->image);
        }
        $product->delete();

        return redirect()->route('product.index')->with('success', 'Product deleted successfully.');
    }

    //routes for product in customer dashboard
    public function index2()
    {
        $products = Product::all();
        return view('product.products', compact('products'));
    }

    public function productCollection()
    {
        return view('product.collection');
    }

    public function addProductToCollection(Request $request)
    {
        $productId = $request->input('product_id');
        $quantity = $request->input('quantity');
        $collectiontItemId = $request->input('collection_item_id');

        $product = Product::find($productId);

        if (!$product) {
            return response()->json(['error' => 'Product not found'], 404);
        }

        $collection = session()->get('collection', []);

        if (isset($collection[$productId])) {
            // Display a message if the product is already in the collection
            session()->flash('message', 'Selected item is already in the collection');
        } else {
            // Add new item to the collection
            $collection[$productId] = [
                'id' => $product->id,
                'name' => $product->name,
                'initial_price' => $product->initial_price,
                'description' => $product->description,
                'quantity' => 1,
                'image' => $product->image
            ];

        }

        session()->put('collection', $collection);

        // Calculate the total quantity
        $totalQuantity = 0;
        foreach ($collection as $item) {
            $totalQuantity += $item['quantity'];
        }
        return response()->json(['message' => 'Collection updated', 'collectionCount' => $totalQuantity], 200);
    }

    public function removeItem(Request $request)
    {
        if($request->id) {
            $collection = session()->get('collection');
            if(isset($collection[$request->id])) {
                unset($collection[$request->id]);
                session()->put('collection', $collection);
            }
            session()->flash('success', 'Product successfully removed.');
        }
    }

    
}

