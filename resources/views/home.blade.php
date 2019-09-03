@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Top 10 Words in this feed</div>
                <div class="card-body">
                    <ol>
                    @foreach($topWords as $word => $count)
                            <li>{{ $word }} - {{ $count }}</li>
                    @endforeach
                    </ol>
                </div>
            </div>
            <hr>
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
