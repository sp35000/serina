@extends('Layouts.App')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
            <br/><br/>
                <h2>CRUD</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="news/create" title="Add News"> <i class="fas fa-plus-circle"></i>
                    </a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p></p>
        </div>
    @endif
        @foreach ($news as $n) 
                    <form action="news/delete" method="POST">
                    <input type = "hidden" name="id" value="{{ $n->id }}">
                        <a href="news/edit/{{ $n->id }}" title="edit">
                            <i class="fas fa-edit  fa-lg"></i>
                        </a>
                        @csrf
                        <button type="submit" title="delete" style="border: none; background-color:transparent;">
                            <i class="fas fa-trash fa-lg text-danger"></i>
                        </button>
                    <p>{{ $n->id }} - {{ $n->category }} - {{ $n->initial_date }} - <strong>{{ $n->title }}</strong> <br/>
                    {{ $n->link }} <br/> {{ $n->hashtag }}</p><hr/>
                    </form>
            </tr>
        @endforeach
    <p>{!! $news->links() !!}</p>
@endsection