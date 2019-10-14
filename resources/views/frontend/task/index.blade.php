@extends('frontend.layouts.default')
@section('content')
<input type="text" id="search">
    <div id="js_items">
    </div>
    <script type="text/javascript">

        $(window).on('hashchange', function() {
            if (window.location.hash) {
                var page = window.location.hash.replace('#', '');
                if (page == Number.NaN || page <= 0) {
                    return false;
                }else{
                    getData(page);
                }
            }
        });



        $(document).ready(function()
        {
            $(document).on('click', '.sorting',function(event)
            {
                var new_column_name = $(this).attr('data-column_name');

                var current_sort_type = $('#hidden_sort_type').val();

                let new_sort_type;
                if(current_sort_type === 'asc'){
                    new_sort_type = 'desc'
                }else{
                    new_sort_type = 'asc'
                }

                $('#hidden_column_name').val(new_column_name);
                $('#hidden_sort_type').val(new_sort_type);

                var term = $('#search').val();
                var column_name = $('#hidden_column_name').val();
                var sort_type = $('#hidden_sort_type').val();
                var page = $('#hidden_page').val();

                fetch_data(page ? page : '1', sort_type ? sort_type : 'asc' , column_name ? column_name : 'id', term ? term : '');
            });

            $(document).on('click', '.pagination a',function(event)
            {
                event.preventDefault();
                $('li').removeClass('active');
                $(this).parent('li').addClass('active');
                var myurl = $(this).attr('href');
                var page=$(this).attr('href').split('page=')[1];
                getData(page);
            });
            fetch_data(1, 'asc' , 'id', '');
        });

        $(document).on('keyup', '#search', function(){
            var term = $('#search').val();
            var column_name = $('#hidden_column_name').val();
            var sort_type = $('#hidden_sort_type').val();
            var page = $('#hidden_page').val();
            fetch_data(page ? page : '1', sort_type ? sort_type : 'asc' , column_name ? column_name : 'id', term ? term : '');
        });
        function fetch_data(page, sort_type, sort_by, term)
        {
            let url = "/ajax-tasks?page="+page+"&sortby="+sort_by+"&sorttype="+sort_type+"&term="+term;

            $.ajax({
                url:url,
                success:function(data)
                {
                    // $('tbody').html('');
                    // $('tbody').html(data);
                    //
                    $("#js_items").empty().html(data);
                }
            })
        }
        function getData(page){
            let ajaxdata = {
                url: 'ajax-tasks?page=' + page,
                type: "get",
                datatype: "html"
            };

            $.ajax(ajaxdata)
                .done(function(data){
                    $("#js_items").empty().html(data);
                    //location.hash = page;
                })
                .fail(function(jqXHR, ajaxOptions, thrownError){
                    alert('No response from server');
                });
        }

    </script>

@endsection