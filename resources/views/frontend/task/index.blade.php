@extends('frontend.layouts.default')
@section('content')
    <h2 class="section-heading mb-4">
        Tasks
    </h2>
    <div id="dtBasicExample_wrapper" class="dataTables_wrapper dt-bootstrap4">
        <div class="row">
            <div class="col-sm-12 col-md-6">
                <div class="dataTables_length bs-select"><label>Show
                        <select id="take_page" class="custom-select custom-select-sm form-control form-control-sm">
                            <option value="3">3</option>
                            <option value="5">5</option>
                            <option value="10">10</option>
                            <option value="25">25</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                        </select> entries</label>
                </div>
            </div>
            <div class="col-sm-12 col-md-6"><div id="dtBasicExample_filter" class="dataTables_filter">
                    <label>Search:<input type="search" class="form-control form-control-sm" placeholder="Type task name..." id="search"></label>
                </div>
            </div>
        </div>
        <div id="js_items">
        </div>
    </div>
@endsection
