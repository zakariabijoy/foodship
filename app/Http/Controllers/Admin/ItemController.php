<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Item;
use App\Category;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;


class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::all();
        return view('admin.item.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.item.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'category' => 'required',
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'image' => 'required|mimes:png,jpg,jpeg'
        ]);

        $slug= str::slug($request->input('name'));
        $currentDate= Carbon::now()->toDateString();

        $imageName = $slug.'-'.$currentDate.'-'.uniqid().'.'.$request->file('image')->getClientOriginalExtension();

        $request->file('image')->storeAs('/public/item', $imageName);

        Item::create([
            'category_id' =>$request->input('category'),
            'name' =>$request->input('name'),
            'description'=>$request->input('description'),
            'price'=>$request->input('price'),
            'image' => $imageName
        ]);

        return redirect()->route('item.index')->with('success','new item is added');
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
    public function edit($id)
    {
        $item = Item::find($id);

        $categories = Category::all();

        return view('admin.item.edit', compact(['item','categories']));
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

        $item = Item::find($id);

        $request->validate([
            'category' => 'required',
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'image' => 'mimes:png,jpg,jpeg'
        ]);
            if($request->file('image')){
                $slug= str::slug($request->input('name'));
                $currentDate= Carbon::now()->toDateString();

                $imageName = $slug.'-'.$currentDate.'-'.uniqid().'.'.$request->file('image')->getClientOriginalExtension();

                $request->file('image')->storeAs('/public/slider', $imageName);

                $item->update([
                    'category_id' =>$request->input('category'),
                    'name' =>$request->input('name'),
                    'description' =>$request->input('description'),
                    'price' =>$request->input('price'),
                    'image' => $imageName
                ]);
            }else {
                $item->update([
                    'category_id' =>$request->input('category'),
                    'name' =>$request->input('name'),
                    'description' =>$request->input('description'),
                    'price' =>$request->input('price'),
                    'image' => $item->image
                ]);
            }
        

        return redirect()->route('item.index')->with('success','item is Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Item::find($id);
        


        if(Storage::exists('/public/item/'.$item->image)){

            Storage::delete('/public/item/'.$item->image);

         }

         $item->delete();
        

        return redirect()->route('item.index')->with('success','item is deleted');
    }
}
