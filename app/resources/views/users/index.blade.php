@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <div class="row">
                <div class="col" style="font-size:30px;color:#808080">My page</div>
                <a href="{{ route('hotels.index')}}"><button type="button" class="btn btn-outline-secondary">ホテル一覧へ</button></a>
            </div>
            <div class="row mt-5 text-center" style="padding:10px;border-bottom: thick double #000000;">
                <div class="mb-5" style="background-color:#f5f5f5;-webkit-text-stroke: 1px #888;text-stroke: 1px #888;padding: 0 0 10px;margin: 2em auto;padding:2em;border-radius: 30px 60px/60px 30px;border: solid 3px #bc8f8f;">
                    <a href="{{ route('users.edit',1)}}" style="color:#cd5c5c;font-size:15px;text-decoration:none;">ユーザーネームを編集</a>
                </div>
                <div class="mb-5" style="background-color:#f5f5f5;-webkit-text-stroke: 1px #888;text-stroke: 1px #888;padding: 0 0 10px;margin: 2em auto;padding:2em;border-radius: 30px 60px/60px 30px;border: solid 3px #bc8f8f;">
                    <a href="{{ route('likes.index')}}" style="color:#cd5c5c;font-size:15px;text-decoration:none;">いいね！したホテル一覧</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="row">
                <div class="col mt-5" style="font-size:30px;color:#808080">My Review</div>
            </div>
            @foreach($reviews as $review)
            <div class="row justify-content-center">
                <div class="col-md-7">
                    <div class="card mt-5" style="width:800px;margin: 2em auto;padding:2em;border-radius: 30px 60px/60px 30px;border: solid 3px #bc8f8f;background-color:#f5f5f5;">
                        <div class="card-header text-center border-light" style="width:500px;margin: 2em auto;border-radius: 30px 60px/60px 30px;border: solid 6px #cd5c5c;">{{ $review['title'] }}</div>
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
