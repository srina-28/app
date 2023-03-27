@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <div class="row">
                <div class="col">My page</div>
                <a href="{{ route('hotels.index')}}"><button type="button" class="btn btn-outline-secondary">ホテル一覧へ</button></a>
            </div>
            <div class="row mt-5 text-center border-bottom">
                <div class="col mb-5"><a href="{{ route('users.edit',1)}}">ユーザーネームを編集</a></div>
                <div class="col mb-5"><a href="{{ route('likes.index')}}">いいね！したホテル一覧</a></div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="row">
                <div class="col mt-5">My Review</div>
            </div>
            @foreach($reviews as $review)
            <div class="row justify-content-center">
                <div class="col-md-7">
                    <div class="card text-white bg-secondary mt-5">
                        <div class="card-header text-center">{{ $review['title'] }}</div>
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
        </div>
    </div>
</div>
@endsection
