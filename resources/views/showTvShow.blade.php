@extends('layouts.app')
<div class="container">
    <div class="row">
        <div class="col-sm">
            <p></p>
        </div>
    </div>
    <div class="row">
        <div class="col-sm">
            <a class="btn btn-primary" href="{{ route('index') }}"> Back</a>
        </div>
        <div class="col-sm">
            <h1>{{ $tvShow['name'] }}</h1>
            <p>{{ $tvShow['overview'] }} </p>
          <h3>Vote rating {{ $tvShow['vote_average'] }} </h3>
        </div>
        <div class="col-sm">
            <img src="{{'https://image.tmdb.org/t/p/w342/'.$tvShow['poster_path']}}">
        </div>
    </div>
</div>


