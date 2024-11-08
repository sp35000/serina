@extends('Layouts.App')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
            <br/><br/>
                <h2>Serina CRUD</h2>
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

    <table class="table table-bordered table-responsive-lg">
        <tr>
            <th>operation</th>
            <th>id</th>
            <th>Title</th>
            <th>Initial Date</th>
            <th>Category</th>
            <th>Link</th>
            <th>Hashtag</th>
            <th>Media</th>
        </tr>
        @foreach ($news as $n) 
            <tr>
            <td>
                    <form action="news/delete" method="POST">
                    <input type = "hidden" name="id" value="{{ $n->id }}">
<!--
                        <a href="show/{{ $n->id }}" " title="show">
                            <i class="fas fa-eye text-success  fa-lg"></i>
                        </a>
-->
                        <a href="news/edit/{{ $n->id }}" title="edit">
                            <i class="fas fa-edit  fa-lg"></i>
                        </a>
                        @csrf
                        <button type="submit" title="delete" style="border: none; background-color:transparent;">
                            <i class="fas fa-trash fa-lg text-danger"></i>
                        </button>
                    </form>
                </td>
            <td>{{ $n->id }} </td>
            <td>{{ $n->title }} </td>
            <td>{{ $n->initial_date }} </td>
            <td>{{ $n->category }} </td>
            <td>{{ $n->link }} </td>
            <td>{{ $n->hashtag }} </td>
            <td>{{ $n->media }} </td>
            </tr>
        @endforeach
    </table>
    <p>{!! $news->links() !!}</p>
@endsection