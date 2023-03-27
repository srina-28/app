@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <div class="row">
                <div class="col">★ホテル追加(管理者用)</div>
            </div>
            <form action="{{ route('others.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row mt-5">
                    <p>　　　　　　　　　　　　　エリア</p>
                    <div class="col">
                        <select name="area" class="form-select">
                            <option value="" selected>選択してください</option>
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
                            <option value="" selected="">選択してください</option>
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
                </div>
                @error('image')
                    <div class="row justify-content-center">
                        <p style='color:red' class='m-auto'>{{$message}}</p>
                    </div>
                @enderror
                <div class="row mt-5 w-50 m-auto justify-content-center">
                    <input type='file' class='form-control mb-5' name='image' value="{{ old('image') }}"/>
                </div>
                @error('hotel')
                    <div class="row justify-content-center">
                        <p style='color:red' class='m-auto'>{{$message}}</p>
                    </div>
                @enderror
                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('ホテル名') }}</label>
                    <div class="col-md-5">
                        <input type='text' class='form-control' name='hotel' value="{{ old('hotel') }}"/>
                    </div>
                </div>
                @error('address')
                    <div class="row justify-content-center">
                        <p style='color:red' class='m-auto'>{{$message}}</p>
                    </div>
                @enderror
                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('所在地') }}</label>
                    <div class="col-md-5">
                        <input type='text' class='form-control mb-5' name='address' value="{{ old('address') }}"/>
                    </div>
                </div>
                @error('text')
                    <div class="row justify-content-center">
                        <p style='color:red' class='m-auto'>{{$message}}</p>
                    </div>
                @enderror
                <div class="form-group row justify-content-center">
                    <label for="name" class="row col-form-label text-md-right"></label>
                    <textarea name="text" cols="70" rows="4">{{ old('text') }}</textarea>
                </div>
                <div class="row mt-5 justify-content-center">
                    <button type="submit" class="btn btn-outline-dark">追加</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
