<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Hotel;
use App\Review;
use App\Like;


class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     //ホテル一覧表示
    public function index(Request $request)
    {

        $area = $request->area;
        $price = $request->price;

        $like_model = new Like;
        $hotel = new Hotel;

        $query = Hotel::query();

        if(!empty($area))
        {
            $query->where('area',$area);
        }

        if(!empty($price))
        {
            $query->where('price',$price);
        }

        $all = $query->get();

        return view('hotels.index',[
            'hotels' => $all,
            'like_model' => $like_model,
            'area' => $area,
            'price' => $price,
            
        ]);

    }

    public function ajaxLike(Request $request){
        $id = Auth::user()->id;
        $hotel_id = $request->hotel_id;
        $like = new Like;

        // 空でない（既にいいねしている）なら
        if ($like->like_exist($id, $hotel_id)) {
            //likesテーブルのレコードを削除
            $like = Like::where('hotel_id', $hotel_id)->where('user_id', $id)->delete();
        } else {
            //空（まだ「いいね」していない）ならlikesテーブルに新しいレコードを作成する
            $like = new Like;
            $like->hotel_id = $request->hotel_id;
            $like->user_id = Auth::user()->id;
            $like->save();
        }

        return response()->json();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

     //登録画面の表示
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

     //登録処理
    public function store(Request $request)
    {
        //

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     //詳細表示
    public function show(Hotel $hotel)
    {
        
        $review = new Review;

        $all = $review->where('hotel_id',$hotel['id'])->get();

        return view('hotels.show',[
            'reviews' => $all,
            'hotel' => $hotel,

        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     //編集表示
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

     //編集の処理
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

     //削除
    public function destroy($id)
    {
        $hotel = Hotel::find($id);
 
        $hotel->delete();
        
        $review = Review::where('hotel_id',$id)->delete();
        return redirect(route('others.index'))->with('success', '削除しました');

    }
}
