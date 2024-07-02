<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Order;
use Barryvdh\DomPDF\Facade\Pdf;

class AdminController extends Controller
{
    public function category_page()
    {   
        $data = Category::all();
        return view('admin.category', compact('data'));
    }

    public function add_category(Request $request)
    {
        $category = new Category;
        $category->category_name = $request->category;
        $category->save();
        toastr()->timeOut(1000)->success('Category has been created successfully');
        return redirect()->back();
    }

    public function delete_category($id)
    {
        $data = Category::find($id);
        $data->delete();
        toastr()->timeOut(1000)->success('Category has been deleted successfully');
        return redirect()->back();
    }

    public function add_product()
    {

        $category = Category::all();
        return view('admin.add_product', compact('category'));
    }

    public function create_product(Request $request)
    {
        $data = new Product;
        $data->name = $request->name;
        $data->description = $request->description;
        $data->price = $request->price;
        $data->quantity = $request->qty;
        $data->category = $request->category;

        $image = $request->image;
        if($image)
        {
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $request->image->move('products', $imagename);
            $data->image = $imagename;
        }

        $data->save();
        toastr()->timeOut(1000)->success('Product has been created successfully');
        return redirect()->back();
    }

    public function product_list()
    {
        $product = Product::all();
        return view('admin.product_list', compact('product'));
    }

    public function delete_product($id)
    {
        $data = Product::find($id);
        $image_path = public_path('products/'.$data->image);
        if(file_exists($image_path))
        {
            unlink($image_path);
        }

        $data->delete();
        toastr()->timeOut(1000)->success('Product has been deleted successfully');
        return redirect()->back();
    }

    public function update_product($id)
    {
        $data = Product::find($id);
        $category = Category::all();
        return view('admin.update_product', compact('data', 'category'));
    }

    public function edit_product(Request $request, $id)
    {
        $data = Product::find($id);
        $data->name = $request->name;
        $data->description = $request->description;
        $data->price = $request->price;
        $data->quantity = $request->qty;
        $data->category = $request->category;

        $image = $request->image;
        if($image)
        {
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $request->image->move('products', $imagename);
            $data->image = $imagename;
        }

        $data->save();
        toastr()->timeOut(1000)->success('Product has been updated successfully');
        return redirect('/product_list');
    }

    public function orders()
    {
        $data = Order::all();
        return view('admin.order_page', compact('data'));
    }

    public function in_transit($id)
    {
        $data = Order::find($id);
        $data->status = 'In Transit';
        $data->save();
        return redirect('/orders');
    }

    public function delivered($id)
    {
        $data = Order::find($id);
        $data->status = 'Delivered';
        $data->save();
        return redirect('/orders');
    }

    public function invoice($id)
    {
        $data = Order::find($id);
        $pdf = Pdf::loadView('admin.invoice', compact('data'));
        return $pdf->download('invoice.pdf');
    }
}
