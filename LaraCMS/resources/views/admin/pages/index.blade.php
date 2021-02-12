@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{route('pages.create')}}" class="btn btn-light">Create New Page</a>
    <table class="table">
        <thead>
            <tr>
                <th>Title</th>
                <th>Url</th>
                <th>Content</th>
            </tr>
        </thead>
        @foreach ($pages as $page)
          <tr>
            <td>
                <a href="{{route('pages.edit',['page'=>$page->id])}}">{{ $page->title }}</a>
            </td>
            <td>{{ $page->url }}</td>
            <td>{{ $page->content }}</td>
        </tr>
        @endforeach
    </table>
</div>
@endsection
