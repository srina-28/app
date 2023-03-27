<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\OtherStoreRequest;


use App\Hotel;
use App\Review;


class OtherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    //ホテル一覧
    public function index(Request $request)
    {
        $keyword = $request->input('keyword');

        $query = Hotel::query();

        if(!empty($keyword)) {
            $query->where('hotel', 'LIKE', "%{$keyword}%");
               
        }

        $hotels = $query->get();

        return view('others.index', compact('hotels', 'keyword'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('others.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     //ホテル追加
    public function store(OtherStoreRequest $request)
    {
        
       $hotel = new Hotel;
       $hotel->user_id = Auth::id();
       $hotel->area = $request->area;
       $hotel->price = $request->price;
       // アップロードされたファイル名を取得
       $file_name = $request->file('image')->getClientOriginalName();

       // 取得したファイル名で保存
       $request->file('image')->storeAs('public/',$file_name);
       $hotel->image = $file_name;
       $hotel->hotel = $request->hotel;
       $hotel->address = $request->address;
       $hotel->text = $request->text;

       $hotel->save();

       return redirect()->route('others.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     //レビュー一覧
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
        //
    }
}
