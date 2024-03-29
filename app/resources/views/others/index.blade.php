@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <div class="row">
                <div class="col" style="font-size:20px;">★ホテル一覧(管理者用)</div>
                <a href="{{ route('others.create',0) }}"><button type="button" class="btn btn-outline-secondary">＋　ホテル追加</button></a>
            </div>
             <div class="row mt-5 justify-content-between">
                <form action="{{ route('others.index') }}" method="GET">
                    <div class="col input-group">
                        <input type="text" name="keyword" value="{{ $keyword }}" id="txt-search" class="form-control input-group-prepend" placeholder="ホテル名"></input>
                        <span class="input-group-btn input-group-append">
                            <button type="submit" id="btn-search" class="btn btn-secondary"><i class="fas fa-search"></i>検索</button>
                        </span>
                    </div>
                </form>
                <a href="{{ route('reviews.index') }}"><button type="button" class="btn btn-outline-secondary">レビュー一覧</button></a>
            </div>
            <div class="row">
                <table class="mt-5 table text-center">
                    <thead>
                        <tr>
                            <th scope="col" style="border-color:#000000;">ホテル名</th>
                            <th scope="col" style="border-color:#000000;">エリア</th>
                            <th scope="col" style="border-color:#000000;">価格</th>
                            <th scope="col" style="border-color:#000000;">詳細</th>
                            <th scope="col" style="border-color:#000000;"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($hotels as $hotel)
                        <tr>
                            <th scope="row" style="border-color:#000000;">{{ $hotel['hotel'] }}</th>
                            <td style="border-color:#000000;">{{ $hotel['area'] }}</td>
                            <td style="border-color:#000000;">{{ $hotel['price'] }}</td>
                            <td style="border-color:#000000;"><a href="{{ route('hotels.show',$hotel['id']) }}">ホテル詳細へ</a></td>
                            <td style="border-color:#000000;"><form action="{{route('hotels.destroy', $hotel['id'] )}}" method="post" class="float-right">
                                    @csrf
                                    @method('delete')
                                    <input type="submit" value="削除" class="btn btn-danger" onclick='return confirm("削除しますか？");'>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
