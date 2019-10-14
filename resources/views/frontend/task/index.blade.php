@section('content')
<table class="table table-striped">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Status</th>
        <th scope="col">Comments</th>
    </tr>
    </thead>
    <tbody>

    @foreach($items as $item)
        <tr>
            <th scope="row">{{$item->id}}</th>
            <td>{{$item->name}}</td>
            <td>{{$item->status->name}}</td>
            <td><a href="{{route('frontend-comments', ['id'=>$item->id])}}">{{$item->comments()->count()}}</a></td>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection