@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <div class="row mt-5">
                <div class="col">★レビュー</div>
            </div>
            <form action="{{ route('reviews.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name='hotel_id' value="{{ $hotel }}"/>
                @error('title')
                    <div class="row justify-content-center">
                        <p style='color:red' class='m-auto'>{{$message}}</p>
                    </div>
                @enderror
                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('タイトル') }}</label>
                    <div class="col-md-5">
                        <input type='text' class='form-control border-light' name='title' value="{{ old('title') }}"/>
                    </div>
                </div>
                @error('image')
                    <div class="row justify-content-center">
                        <p style='color:red' class='m-auto'>{{$message}}</p>
                    </div>
                @enderror
                <div class="row mt-5 w-50 m-auto justify-content-center">
                        <input type='file' class='mb-5' name='image' value="{{ old('image') }}"/>
                </div>  
                @error('post')
                    <div class="row justify-content-center">
                        <p style='color:red' class='m-auto'>{{$message}}</p>
                    </div>
                @enderror
                <div class="form-group row justify-content-center">
                        <textarea name="post" cols="80" rows="5" class="border-light">{{ old('post') }}</textarea>
                </div>
                <div class="row mt-5 justify-content-center">
                        <button type="submit" class="btn btn-warning">投稿する</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
