<?php

namespace App\Http\Controllers;

use App\BaiViet;
use App\ChuDe;
use App\Business;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App;
use DB;

class BaiVietController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_baiviet = DB::table('bai_viets')->where([
            ['dell_flag', '=', Business::DELL_OFF],
        ])->get();
        return view('admin.product.index',[ 'all_baiviet' => $all_baiviet ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $all_chude = ChuDe::select()->get();
        return view('admin.product.form', [ 'all_chude'=>$all_chude]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'category_id' => 'required',
        ]);
        $dataCreate = [
            'title' => $request->title,
            'content' => $request->content,
            'category_id' => $request->category_id,
            'dell_flag' => Business::DELL_OFF,
        ];
        // dd($dataCreate);
        BaiViet::create($dataCreate);
        // dd('xong');
        return redirect()->route('baiviet.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BaiViet  $baiViet
     * @return \Illuminate\Http\Response
     */
    public function show(BaiViet $baiViet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BaiViet  $baiViet
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $all_chude = ChuDe::select()->get();
        $baiviet = DB::table('bai_viets')->where([
            ['id', '=', $id],
        ])->first();
        return view('admin.product.form',[ 'baiviet' => $baiviet, 'all_chude' => $all_chude,  ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BaiViet  $baiViet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'category_id' => 'required',
        ]);
        $dataUpdate = [
            'title' => $request->title,
            'content' => $request->content,
            'category_id' => $request->category_id,
            'dell_flag' => Business::DELL_OFF,
        ];
        $baiviet = BaiViet::find($id);
        $baiviet->update($dataUpdate);
        return redirect()->route('baiviet.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BaiViet  $baiViet
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('bai_viets')
            ->where('id', $id)
            ->update(['dell_flag' => Business::DELL_ON]);
        return redirect()->route('baiviet.index');
    }
}
