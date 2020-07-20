<?php

namespace App\Http\Controllers;

use App\Bank;
use Illuminate\Http\Request;

class BankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bank = Bank::all();
        return view('admin.bank.index', compact('bank'));
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
            'name_bank' => 'required',
            'nomor_rekening' => 'required',
            'name' => 'required'
        ]);

        if ($request->has('image')) {
            $image = $request->image;
            $namaImage = $image->getClientOriginalName();
            $foto = explode('.', $namaImage);
            $foto = end($foto);
            $newImage = date('siHdmY') . '.' . $foto;
            $image->move('images/bank/', $newImage);
            $saveImage = 'images/bank/' . $newImage;
        } else {
            $saveImage = Bank::find($request->id)->image;
        }

        Bank::UpdateOrCreate(
            [
                'id' => $request->id
            ],
            [
                'name_bank' => $request->name_bank,
                'nomor_rekening' => $request->nomor_rekening,
                'name' => $request->name,
                'image' => $saveImage
            ]
        );

        if ($request->id) {
            $message = "Success Update Bank!";
        } else {
            $message = "Success Add Bank!";
        }

        return redirect()->back()->with('success', $message);
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
        //
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
        Bank::find($id)->delete();
        return redirect()->back()->with('success', 'Success Delete Bank!');
    }
}
