@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col mb-5" style="font-size:20px;color:#808080;"><i class="fa-sharp fa-solid fa-heart" style="color:#b22222"></i>　いいね！したホテル</div>
    </div>
    <div class="row row-cols-1 row-cols-md-3">
        @foreach($likes as $like)
        <div class="col mb-4">
            <div class="card h-100" style="border-radius: 30px 60px/60px 30px;border: solid 3px #ccc7be;">
                <div class="card-body">
                    <img src="{{ asset('storage/'.$like['image']) }}" class="img-thumbnail mb-3">
                    <a href="{{ route('hotels.show',$like['hotel_id'])}}" style="color:#808080;">{{ $like->hotel }}</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
