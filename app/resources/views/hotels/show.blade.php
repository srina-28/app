@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <h2 style="color:#808080;">{{ $hotel['hotel'] }}</h2>
            <div class="row m-5" style="padding-bottom:100px;border-bottom: thick double #000000;">
                <div class="col"><img src="{{ asset('storage/'.$hotel['image']) }}" class="img-thumbnail"></div>
                <div class="col">
                    <div style="font-size:20px;color:#808080;">所在　：　{{ $hotel['address'] }}</div>
                    <div class="my-5" style="font-size:20px;color:#808080;">価格　：　{{ $hotel['price'] }}</div>
                    <div class="row mt-5 text-center">
                        <div class="col mb-5" style="color:#808080;">{{ $hotel['text'] }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div claa="row">
        <div class="row mt-5">
            <div class="col" style="font-size:20px;">★レビュー</div>
        @auth
            <a href="{{ route('reviews.new',$hotel['id']) }}"><button type="button" class="btn btn-outline-secondary ml-5">＋　レビューする</button></a>
        </div>
            @foreach($reviews as $review)
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="card mt-5" style="margin: 2em auto;padding:2em;border-radius: 30px 60px/60px 30px;border: solid 3px #ccc7be;background-color:#f5f5f5;">
                        <div class="card-header d-flex justify-content-between" style="width:800px;margin: 2em auto;border-radius: 30px 60px/60px 30px;border: solid 3px #dcdcdc;">
                            <p style="font-size:20px;">{{ $review['title'] }}</p>
                            <p style="font-size:15px;">{{ $review->user['name'] }}さんのレビュー</p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col"><img src="{{ asset('storage/'.$review['image']) }}" class="img-thumbnail"></div>
                                <div class="col" style="font-size:15px;">{{ $review['post'] }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>  
            @endforeach 
        @endauth
        @guest
        <div class="row">
            <div class="col mt-5"><a href="{{ route('login',1 )}}">ログインしてください</a></div>
        </div>
        @endguest
    </div>
</div>
@endsection
