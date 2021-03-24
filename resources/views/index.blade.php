<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <title>Search</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<div class="container">

    <h1>Movies & shows</h1>
    <form method="GET" action="{{ url('index') }}">
        <div class="col-md-4">
            <input type="text" name="search" class="form-control" placeholder="Search">
        </div>
        <div class="col-md-4">
            <button class="btn btn-primary">Search</button>
        </div>
    </form>
    <form action="{{ url('search') }}">
        <input type="submit" class="btn btn-secondary " value="Vue js movie search"><br><br>
    </form>
    <br/>
    <div class="col-md-6">
        <h1>Movies</h1>
        <table class="table table-striped">
            <tr>
                <th>Name</th>
                <th>Detail</th>

            </tr>
            @if(count($movies)!=0)
                @foreach($movies as $movie)
                    <tr>
                        <td>{{ $movie['title']}}</td>
                        <td>
                            <a class="btn btn-info" href="{{ route('show',$movie['id']) }}">Show</a>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="3" class="text-danger">Data not found.</td>
                </tr>
            @endif
        </table>
        {!! $movies->appends(['tvShows'=>$tvShows->currentPage()])->links() !!}
    </div>

    <div class="col-md-6">
        <h1>Tv shows</h1>

        <table class="table table-striped">
            <tr>
                <th>Name</th>
                <th>Detail</th>
            </tr>
            @if(count($tvShows)!=0)
                @foreach($tvShows as $tvShow)
                    <tr>
                        <td>{{ $tvShow['name']}}</td>
                        <td>
                            <a class="btn btn-info" href="{{ route('showTvShow',$tvShow['id']) }}">Show</a>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="3" class="text-danger">Data not found.</td>
                </tr>
            @endif
        </table>
        {!! $tvShows->appends(['movies'=>$movies->currentPage()])->links() !!}
    </div>


</div>
</body>
</html>
