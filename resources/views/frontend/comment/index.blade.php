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


        <tr>
            <th scope="row">{{$item->id}}</th>
            <td></td>
            <td>{{$item->content}}</td>
            <td>{{$item->date_created}}</td>
        </tr>

    </tbody>
</table>
@endsection