@extends('frontend.layouts.default')
@section('content')
<table class="table table-striped">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Content</th>
        <th scope="col">Comment added</th>
    </tr>
    </thead>
    <tbody>
        <tr>
            <th scope="row">{{$item->id}}</th>
            <td></td>
            <td>{{$item->content}}</td>
            <td>{{$item->date_created}}</td>
        </tr>
    </tbody>
</table>
@endsection