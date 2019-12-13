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

class ChuDeController extends Controller
{
    
    public function index()
    {
        
        $all_chude = DB::table('chu_des')->where([
            ['dell_flag', '=', Business::DELL_OFF],
        ])->get();
        // dd($all_chude);
        return view('admin.category.index',[ 'all_chude' => $all_chude ]);
    }

    
    public function create()
    {
        return view('admin.category.form');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $dataCreate = [
            'name' => $request->name,
            'status' => Business::STATUS_ON,
            'dell_flag' => Business::DELL_OFF,
        ];
        // dd($dataCreate);
        ChuDe::create($dataCreate);
        return redirect()->route('chude.index');
    }

    
    public function show(ChuDe $chuDe)
    {
        //
    }

    
    public function edit($id)
    {
        // $chude = ChuDe::find($id);
        $chude = DB::table('chu_des')->where([
            ['id', '=', $id],
        ])->first();
        // dd($chude);
        return view('admin.category.form',[ 'chude' => $chude ]);
    }

    
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $dataUpdate = [
            'name' => $request->name,
            'status' => Business::STATUS_ON,
            'dell_flag' => Business::DELL_OFF,
        ];
        $chude = ChuDe::find($id);
        $chude->update($dataUpdate);
        return redirect()->route('chude.index');
    }

    
    public function destroy($id)
    {
        // $chude = ChuDe::find($id);
        DB::table('chu_des')
            ->where('id', $id)
            ->update(['dell_flag' => Business::DELL_ON]);
        return redirect()->route('chude.index');

    }
}
