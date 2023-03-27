<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ReviewStoreRequest;

use App\Review;


class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keyword = $request->input('keyword');

        $query = Review::query();

        if(!empty($keyword)) {
            $query->where('title', 'LIKE', "%{$keyword}%")
                ->orWhere('post', 'LIKE', "%{$keyword}%");
        }

        $reviews = $query->get();
        
        return view('reviews.index', compact('reviews', 'keyword'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('reviews.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ReviewStoreRequest $request)
    {
        $review = new Review;
        
       $review->user_id = Auth::id();
       $review->hotel_id = $request->hotel_id;
       $review->title = $request->title;
       // アップロードされたファイル名を取得
       $file_name = $request->file('image')->getClientOriginalName();

       // 取得したファイル名で保存
       $request->file('image')->storeAs('public/',$file_name);
       $review->image = $file_name;
       $review->post = $request->post;


       $review->save();

       return redirect()->route('hotels.show',$request->hotel_id);
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
        return view('reviews.edit');
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
        $review = Review::find($id);
 
        $review->delete();
        return redirect(route('reviews.index'))->with('success', '削除しました');
    }

    public function review($hotel_id)
    {

        return view('reviews.create',[
            'hotel' => $hotel_id
        ]);
    }
}
