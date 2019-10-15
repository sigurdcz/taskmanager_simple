






    <div class="row">
        <div class="col-sm-12">
            <table id="dtBasicExample" class="table table-striped table-bordered table-sm dataTable" cellspacing="0" width="100%" role="grid" aria-describedby="dtBasicExample_info" style="width: 100%;">
                <thead>
                <tr>
                    <th class="sorting" data-sorting_type="asc" data-column_name="id" style="cursor: pointer">#ID <span id="id_icon"></span></th>
                    <th class="sorting" data-sorting_type="asc" data-column_name="name" style="cursor: pointer">Name <span id="id_icon"></span></th>
                <th>Status
                </th>
                <th>Comments
                </th>
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
                <tfoot>
                <tr>

                    <th>#ID
                    </th>
                    <th>NAME
                    </th>
                    <th>STATUS
                    </th>
                    <th>Comments
                    </th>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 col-md-5">
            <div class="dataTables_info" id="dtBasicExample_info" role="status" aria-live="polite">
                Showing 1 to 10 of 57 entries
            </div>
        </div>
        <div class="col-sm-12 col-md-7">
            <div class="dataTables_paginate paging_simple_numbers" id="dtBasicExample_paginate">
                {!! $items->render() !!}
            </div>
        </div>
    </div>

<input type="hidden" name="hidden_page" id="hidden_page" value="{{$page}}" />
<input type="hidden" name="hidden_column_name" id="hidden_column_name" value="{{$sortby}}" />
<input type="hidden" name="hidden_sort_type" id="hidden_sort_type" value="{{$sorttype}}" />
