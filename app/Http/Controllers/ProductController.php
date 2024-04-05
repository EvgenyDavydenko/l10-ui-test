<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::available()->orderBy('updated_at', 'desc')->get();
        return view('products.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        $product = new Product([
            'article' => $request->article,
            'name' => $request->name,
            'status' => $request->status,
            'properties' => ['color' => $request->color, 'size' => $request->size],
        ]);
        $product->save();
        return redirect()->route('products.index')->with('status', 'Ваш продукт успешно создан!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::available()->find($id);
        return view('products.show', ['product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $admin = User::isAdmin();
        $product = Product::find($id);
        return view('products.edit', ['product' => $product, 'admin' => $admin]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, string $id)
    {
        $product = Product::find($request->id);

        $product->article = $request->article;
        if ($product->isDirty('article') && !User::isAdmin()) {
            return redirect()->route('products.index')->withErrors('Для редактирования артикула пользователь должен быть админом!');
        }

        $product->update([
            'article' => $request->article,
            'name' => $request->name,
            'status' => $request->status,
            'properties' => ['color' => $request->color, 'size' => $request->size],
        ]);
        
        return redirect()->route('products.index')->with('status', 'Ваш продукт успешно отредактирован!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()->route('products.index')->with('status', 'Продукт успешно удален!');
    }
}
