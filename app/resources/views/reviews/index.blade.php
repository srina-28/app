@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <div class="row">
                <div class="col">★レビュー一覧(管理者用)</div>
                <a href="{{ route('others.create',0) }}"><button type="button" class="btn btn-outline-secondary">＋　ホテル追加</button></a>
            </div>
            <div class="row mt-5 justify-content-between">
                <form action="{{ route('reviews.index') }}" method="GET">
                    <div class="col input-group">
                        <input type="text" name="keyword" value="{{ $keyword }}" id="txt-search" class="form-control input-group-prepend" placeholder="タイトル・内容検索"></input>
                        <span class="input-grousp-btn input-group-append">
                            <button type="submit" id="btn-search" class="btn btn-secondary"><i class="fas fa-search"></i>検索</button>
                        </span>
                    </div>
                </form>
                <a href="{{ route('others.index') }}"><button type="button" class="btn btn-outline-secondary">ホテル一覧</button></a>
            </div>
            <div class="row">
                <table class="mt-5 table text-center">
                    <thead>
                        <tr>
                            <th scope="col">ユーザー名</th>
                            <th scope="col">タイトル</th>
                            <th scope="col">内容</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($reviews as $review)
                        
                        <tr>
                            <td>{{ $review->user['name'] }}</td>
                            <td>{{ $review['title'] }}</td>
                            <td>{{ $review['post'] }}</td>
                            <td><form action="{{route('reviews.destroy', $review['id'] )}}" method="post" class="float-right">
                                @csrf
                                @method('delete')
                                <input type="submit" value="削除" class="btn btn-danger" onclick='return confirm("削除しますか？");'></form>
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
