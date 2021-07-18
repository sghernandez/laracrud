<?php

namespace App\Http\Controllers;

# use Illuminate\Support\Facades\Validator;
# use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {   
        return view('products.index', ['products' => Product::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'price' => 'required',
        ]);

        Product::create($validatedData);
   
        return redirect('products')->with('success', 'Product successfully saved.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        return view('products.edit', ['product' => Product::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       /*
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:5|max:255',
            'price' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect(route('products.edit', $id))->withErrors($validator)->withInput();
        }     */   

        $validatedData = $request->validate([
            'name' => 'required|min:5|max:255',
            'price' => 'required',
        ]);

        Product::whereId($id)->update($validatedData);

        return redirect('products')->with('success', 'Product successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $game = Product::findOrFail($id);
        $game->delete();

        return redirect('products')->with('success', 'Product successfully deleted.');
    }
}
