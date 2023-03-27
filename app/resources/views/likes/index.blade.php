@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col mb-5">💟いいね！したホテル</div>
    </div>
    <div class="row row-cols-1 row-cols-md-3">
        @foreach($likes as $like)
        <div class="col mb-4">
            <div class="card h-100">
                <img src="{{ asset('storage/'.$like['image']) }}" class="img-thumbnail">
                <div class="card-body">
                    
                    <h5 class="card-title"><a href="{{ route('hotels.show',$like['hotel_id'])}}">{{ $like->hotel }}</a></h5>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
