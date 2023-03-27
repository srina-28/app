@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row px-md-5 justify-content-center">
        <div class="col-md-8">
            <form action="{{route('hotels.index')}} ">
                <div class="row mt-5">
                    <p>エリア</p>
                    <div class="col">
                        <select name="area" class="form-select">
                            @if(!$area)
                                <option value="" selected>選択してください</option>
                            @else
                                <option value="{{$area}}" selected>{{$area}}</option>
                            @endif
                            <option value="茨城">茨城</option>
                            <option value="栃木">栃木</option>
                            <option value="群馬">群馬</option>
                            <option value="埼玉">埼玉</option>
                            <option value="東京">東京</option>
                            <option value="神奈川">神奈川</option>
                            <option value="千葉">千葉</option>
                        </select>
                    </div>
                    <p>価格　</p>
                    <div class="col">
                        <select name="price" class="form-select">
                            @if(!$area)
                                <option value="" selected>選択してください</option>
                            @else
                                <option value="{{$price}}" selected>{{$price}}</option>
                            @endif
                            <option value="〜2万">〜2万</option>
                            <option value="〜3万">〜3万</option>
                            <option value="〜4万">〜4万</option>
                            <option value="〜5万">〜5万</option>
                            <option value="〜6万">〜6万</option>
                            <option value="〜7万">〜7万</option>
                            <option value="〜8万">〜8万</option>
                            <option value="〜9万">〜9万</option>
                            <option value="〜10万">〜10万</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-outline-secondary">検索</button>
                </div>
            </form>
            @foreach($hotels as $hotel)
            <div class="card text-white bg-secondary my-3">
                <div class="card-header d-flex justify-content-around align-items-center">
                    <p>{{ $hotel['area'] }}</p>
                    <p>{{ $hotel['price'] }}</p>
                    @if($like_model->like_exist(Auth::user()->id,$hotel['id']))
                        <p class="">
                            <button type="button" class="js-like-toggle loved btn" data-hotelid="{{ $hotel['id'] }}">
                                <i class="fas fa-heart fa-lg"></i>
                            </button>
                        </p>
                        @else
                        <p class="">
                            <button type="button" class="js-like-toggle loved btn" data-hotelid="{{ $hotel['id'] }}">
                                <i class="far fa-heart fa-lg"></i>
                            </button>
                        </p>
                    @endif
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col"><img src="{{ asset('storage/'.$hotel['image']) }}" class="img-thumbnail"></div>
                        <div class="col">{{ $hotel['hotel'] }}</div>
                    </div>
                    <div class="row float-right"><a class="text-white" href="{{ route('hotels.show',$hotel['id'] )}}">レビューを見る</a></div>
                </div>
            </div>  
            @endforeach 
        </div>
    </div>
</div>
@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>
$(function () {
    var like = $('.js-like-toggle');
    var likeHotelId;
    like.on('click', function () {
        var $this = $(this);
        var heart = $(this).children('.fa-heart');
        likeHotelId = $this.data('hotelid');
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/ajax_like',  //routeの記述
            type: 'POST', //受け取り方法の記述（GETもある）
            data: {
                'hotel_id': likeHotelId //コントローラーに渡すパラメーター
            },
            dataType: 'json',
        })
        
        // Ajaxリクエストが成功した場合
        .done(function (data) {
            //lovedクラスを追加
            heart.toggleClass('fas');
            heart.toggleClass('far');
        })
        // Ajaxリクエストが失敗した場合
        .fail(function (data, xhr, err) {
            //ここの処理はエラーが出た時にエラー内容をわかるようにしておく。
            //とりあえず下記のように記述しておけばエラー内容が詳しくわかります。笑
                console.log('エラー');
            });
        
        return false;
    });
    });
    
</script>










