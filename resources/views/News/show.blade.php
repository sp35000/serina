@extends('Layouts.App')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Serina - Read</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="" title="Go back"> <i class="fas fa-backward "></i> </a>
            </div>
        </div>
    </div>

    <div class="row">
    <p>Title: {{ $news->title}}</p>
    <p>Category: {{ $news->category}}</p>
    <p>Link: {{ $news->link}}</p>
    <p>Hashtag: {{ $news->hashtag}}</p>
    <p>Media: {{ $news->media}}</p>
    </div>
@endsection