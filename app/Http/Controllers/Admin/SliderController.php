<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Slider;
Use Carbon\Carbon;
use Illuminate\Support\Str;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::all();
        return view('admin.slider.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('admin.slider.create');
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
            'title' => 'required',
            'sub_title' => 'required',
            'image' => 'required|mimes:png,jpg,jpeg'
        ]);

        $slug= str::slug($request->input('title'));
        $currentDate= Carbon::now()->toDateString();

        $imageName = $slug.'-'.$currentDate.'-'.uniqid().'.'.$request->file('image')->getClientOriginalExtension();

        $request->file('image')->storeAs('/public/slider', $imageName);

        Slider::create([
            'title' =>$request->input('title'),
            'sub_title' =>$request->input('sub_title'),
            'Image' => $imageName
        ]);

        return redirect()->route('slider.index')->with('success','new slider is added');
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
        $slider = Slider::find($id);
        return view('admin.slider.edit',compact('slider'));
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
        $slider = Slider::find($id);

        $request->validate([
            'title' => 'required',
            'sub_title' => 'required',
            'image' => 'mimes:png,jpg,jpeg'
        ]);
            if($request->file('image')){
                $slug= str::slug($request->input('title'));
                $currentDate= Carbon::now()->toDateString();

                $imageName = $slug.'-'.$currentDate.'-'.uniqid().'.'.$request->file('image')->getClientOriginalExtension();

                $request->file('image')->storeAs('/public/slider', $imageName);

                $slider->update([
                    'title' =>$request->input('title'),
                    'sub_title' =>$request->input('sub_title'),
                    'Image' => $imageName
                ]);
            }else {
                $slider->update([
                    'title' =>$request->input('title'),
                    'sub_title' =>$request->input('sub_title'),
                    'Image' => $slider->image
                ]);
            }
        

        return redirect()->route('slider.index')->with('success','slider is Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slider = Slider::destroy($id);

        

        return redirect()->route('slider.index')->with('success','slider is deleted');
    }
}
