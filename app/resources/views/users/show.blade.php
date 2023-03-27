@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <div class="row mt-5">
                <div class="col">★レビュー</div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card mt-5">
                        <div class="card-header">星野リゾート</div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col"><img src="..." class="card-img-top" alt="..."></div>
                                <div class="col">レビュー</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-5 text-center">
                <div class="col"><a href="{{ route('reviews.edit',1) }}">編集</a></div>
                <div class="col">削除</div>
            </div>  
        </div>
    </div>
    
</div>
@endsection
