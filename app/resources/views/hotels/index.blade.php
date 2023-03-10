@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row px-md-5 justify-content-center">
        <div class="col-md-8">
            <div class="row justify-content-center">
                <a>検索・絞り込み　：　</a>
                <div class="dropdown">
                    <button class="btn btn btn-outline-dark dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                        エリア
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#">茨城</a>
                        <a class="dropdown-item" href="#">栃木</a>
                        <a class="dropdown-item" href="#">群馬</a>
                        <a class="dropdown-item" href="#">埼玉</a>
                        <a class="dropdown-item" href="#">東京</a>
                        <a class="dropdown-item" href="#">神奈川</a>
                        <a class="dropdown-item" href="#">千葉</a>
                    </div>
                </div>
                <div class="dropdown">
                    <button class="btn btn btn-outline-dark dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                        価格
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#">〜2万</a>
                        <a class="dropdown-item" href="#">〜3万</a>
                        <a class="dropdown-item" href="#">〜4万</a>
                        <a class="dropdown-item" href="#">〜5万</a>
                        <a class="dropdown-item" href="#">〜6万</a>
                        <a class="dropdown-item" href="#">〜7万</a>
                        <a class="dropdown-item" href="#">〜8万</a>
                        <a class="dropdown-item" href="#">〜9万</a>
                        <a class="dropdown-item" href="#">〜10万</a>
                    </div>
                </div>
            </div>       
            <div class="card my-3">
                <div class="card-header">神奈川 　　　　　　　　　　　　　　 ¥60,000 　　　　　　　　　　　　　　いいね！10</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col"><img src="..." class="card-img-top" alt="..."></div>
                        <div class="col">星野リゾート</div>
                    </div>
                    <div class="row">レビューを見る</div>
                </div>
            </div>   
        </div>
    </div>
</div>
@endsection
