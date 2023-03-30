@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="width:800px;margin: 2em auto;padding:2em;border-radius: 30px 60px/60px 30px;border: solid 6px #bc8f8f;background-color:#f5f5f5;">
                <div class="card-header border-light" style="width:100px;margin: 2em auto;border-radius: 30px 60px/60px 30px;border: solid 6px;">{{ __('編集') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('users.update',Auth::user()->id) }}">
                        @csrf
                        @method('PUT')
                        @error('name')
                            <div class="row justify-content-center">
                                <p style='color:red' class='m-auto'>{{$message}}</p>
                            </div>
                        @enderror
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name',Auth::user()->name) }}" autofocus>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-warning">完了</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
