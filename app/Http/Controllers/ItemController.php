<?php

namespace App\Http\Controllers;

use App\Activity;
use App\Category;
use App\Feature;
use App\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $item = Item::all();
        $category = Category::all();
        $action = 'view';
        return view('admin.item.index', compact('item', 'category', 'action'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'price' => 'required',
            'city' => 'required',
            'category_id' => 'required',
            'description' => 'required'
        ]);

        if ($request->has('image')) {
            $image = $request->image;
            $namaImage = $image->getClientOriginalName();
            $foto = explode('.', $namaImage);
            $foto = end($foto);
            $newImage = date('siHdmY') . '.' . $foto;
            $image->move('images/item/', $newImage);
            $saveImage = 'images/item/' . $newImage;
        } else {
            $saveImage = Item::find($request->id)->image;
        }

        Item::UpdateOrCreate(
            [
                'id' => $request->id
            ],
            [
                'title' => $request->title,
                'price' => $request->price,
                'city' => $request->city,
                'category_id' => $request->category_id,
                'description' => $request->description,
                'image' => $saveImage
            ]
        );

        if ($request->id) {
            $message = "Success Update Item!";
        } else {
            $message = "Success Add Item!";
        }

        return redirect()->route('item.index')->with('success', $message);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Item::find($id);
        return view('admin.item.show', compact('item'));
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
        $category = Category::all();
        $action = 'edit';
        return view('admin.item.index', compact('item', 'category', 'action'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Item::find($id)->delete();
        return redirect()->back()->with('success', 'Success Delete Item!');
    }

    public function feature(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'qty' => 'required',
            'item_id' => 'required',
        ]);

        if ($request->has('image')) {
            $image = $request->image;
            $namaImage = $image->getClientOriginalName();
            $foto = explode('.', $namaImage);
            $foto = end($foto);
            $newImage = date('siHdmY') . '.' . $foto;
            $image->move('images/feature/', $newImage);
            $saveImage = 'images/feature/' . $newImage;
        } else {
            $saveImage = Feature::find($request->id)->image;
        }

        Feature::UpdateOrCreate(
            [
                'id' => $request->id
            ],
            [
                'name' => $request->name,
                'qty' => $request->qty,
                'item_id' => $request->item_id,
                'image' => $saveImage
            ]
        );

        if ($request->id) {
            $message = "Success Update Feature!";
        } else {
            $message = "Success Add Feature!";
        }

        return redirect()->route('item.show', $request->item_id)->with('success', $message);
    }

    public function featureDestroy($id)
    {
        Feature::find($id)->delete();
        return redirect()->back()->with('success', 'Success Delete Feature!');
    }

    public function activity(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'type' => 'required',
            'item_id' => 'required',
        ]);

        if ($request->has('image')) {
            $image = $request->image;
            $namaImage = $image->getClientOriginalName();
            $foto = explode('.', $namaImage);
            $foto = end($foto);
            $newImage = date('siHdmY') . '.' . $foto;
            $image->move('images/activity/', $newImage);
            $saveImage = 'images/activity/' . $newImage;
        } else {
            $saveImage = Activity::find($request->id)->image;
        }

        Activity::UpdateOrCreate(
            [
                'id' => $request->id
            ],
            [
                'name' => $request->name,
                'type' => $request->type,
                'item_id' => $request->item_id,
                'image' => $saveImage
            ]
        );

        if ($request->id) {
            $message = "Success Update Activity!";
        } else {
            $message = "Success Add Activity!";
        }

        return redirect()->route('item.show', $request->item_id)->with('success', $message);
    }

    public function activityDestroy($id)
    {
        Activity::find($id)->delete();
        return redirect()->back()->with('success', 'Success Delete Activity!');
    }
}
