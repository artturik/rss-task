@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @foreach($feed as $item)
            <div class="card">
                <div class="card-header"><a href="{{ $item->getLink() }}">{{ $item->getTitle() }}</a></div>
                <div class="card-body">
                    {!! clean($item->getDescription()) !!}
                </div>
            </div>
            <hr>
            @endforeach
        </div>
    </div>
</div>
@endsection
