<table class="table table-striped">
    <thead>
    <tr>
        <th class="sorting" data-sorting_type="asc" data-column_name="id" style="cursor: pointer">ID <span id="id_icon"></span></th>
        <th class="sorting" data-sorting_type="asc" data-column_name="name" style="cursor: pointer">ID <span id="id_icon"></span></th>
        <th scope="col">Status</th>
        <th scope="col">Komentáře</th>
    </tr>
    </thead>
    <tbody>
    @foreach($items as $item)
        <tr>
            <th scope="row">{{$item->id}}</th>
            <td>{{$item->name}}</td>
            <td>{{$item->status->name}}</td>
            <td><a href="{{route('comments.show', ['id'=>$item->id])}}">{{$item->comments()->count()}}</a></td>
        </tr>
    @endforeach
    </tbody>
</table>

{!! $items->render() !!}

<input type="hidden" name="hidden_page" id="hidden_page" value="{{$page}}" />
<input type="hidden" name="hidden_column_name" id="hidden_column_name" value="{{$sortby}}" />
<input type="hidden" name="hidden_sort_type" id="hidden_sort_type" value="{{$sorttype}}" />