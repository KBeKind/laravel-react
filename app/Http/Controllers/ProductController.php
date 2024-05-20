<?php
namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
   /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('products.index')->with("products",$products);
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'count' => 'required|integer',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
        ]);

        Product::create($request->all());
        
        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
     public function edit(string $id)
    {
        $product = Product::find($id);

        if (!$product) {
            return redirect()->route('products.index')->with('error', 'Product not found.');
        }

        return view('products.edit', compact('product'));
    }

    public function editSave(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'count' => 'required|integer',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
        ]);
    
        // Find the product by ID
        $product = Product::find($id);
    
        if (!$product) {
            return redirect()->route('products.index')->with('error', 'Product not found.');
        }
    
        // Update the product's properties
        $product->name = $request->input('name');
        $product->count = $request->input('count');
        $product->price = $request->input('price');
        $product->description = $request->input('description');
    
        // Save the changes to the database
        $product->save();
    
        return redirect()->route('products.index')->with('success', 'Product edited successfully.');
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
