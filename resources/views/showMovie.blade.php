@extends('layouts.app')
<div class="container">
    <div class="row">
        <div class="col-sm">
            <p></p>
        </div>
    </div>
    <div class="row">
        <div class="col col-lg-2">
            <a class="btn btn-primary" href="{{ route('index') }}"> Back</a>
        </div>
        <div class="col-sm">
            <h1>{{ $movie['title'] }}</h1>
            <p>{{ $movie['overview'] }} </p>
          <h3>Vote rating {{ $movie['vote_average'] }} </h3>
        </div>
        <div class="col-sm">
            <img src="{{'https://image.tmdb.org/t/p/w342/'.$movie['poster_path']}}">
        </div>
    </div>
</div>
