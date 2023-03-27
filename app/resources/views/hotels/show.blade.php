@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <h2>{{ $hotel['hotel'] }}</h2>
            <div class="row mt-5">
                <div class="col"><img src="{{ asset('storage/'.$hotel['image']) }}" class="img-thumbnail"></div>
                <div class="col">所在　：　{{ $hotel['address'] }}</div>
                <div class="col mt-5">価格　：　{{ $hotel['price'] }}</div>
            </div>
            <div class="row mt-5 text-center border-bottom" style="padding:10px;">
                <div class="col mb-5">{{ $hotel['text'] }}</div>
            </div>
        </div>
    </div>
    <div claa="row">
        <div class="row mt-5">
            <div class="col">★レビュー</div>
        @auth
            <a href="{{ route('reviews.new',$hotel['id']) }}"><button type="button" class="btn btn-outline-secondary ml-5">＋　レビューする</button></a>
        </div>
            @foreach($reviews as $review)
            <div class="row justify-content-center">
                <div class="col-md-7">
                    <div class="card text-white bg-secondary mt-5">
                        <div class="card-header d-flex justify-content-between">
                            <p>{{ $review['title'] }}</p>
                            <p>{{ $review->user['name'] }}さんのレビュー</p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col"><img src="{{ asset('storage/'.$review['image']) }}" class="img-thumbnail"></div>
                                <div class="col">{{ $review['post'] }}</div>
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
