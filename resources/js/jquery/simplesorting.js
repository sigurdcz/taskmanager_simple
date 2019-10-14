function getPaginationInputData() {
    var term = $('#search').val();
    var column_name = $('#hidden_column_name').val();
    var sort_type = $('#hidden_sort_type').val();
    var page = $('#hidden_page').val();
    return {term, column_name, sort_type, page};
}

$(document).ready(function()
{
    // f
    fetch_data(1, 'asc' , 'id', '');
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

        var {term, column_name, sort_type, page} = getPaginationInputData();
        fetch_data(page ? page : '1', sort_type ? sort_type : 'asc' , column_name ? column_name : 'id', term ? term : '');
    });

    $(document).on('click', '.pagination a',function(event)
    {
        event.preventDefault();
        $('li').removeClass('active');
        $(this).parent('li').addClass('active');
        var page=$(this).attr('href').split('page=')[1];
        $('#hidden_page').val(page);
        var {term, column_name, sort_type, page} = getPaginationInputData();
        fetch_data(page ? page : '1', sort_type ? sort_type : 'asc' , column_name ? column_name : 'id', term ? term : '');
    });

    $(document).on('keyup', '#search', function(){
        var {term, column_name, sort_type, page} = getPaginationInputData();
        fetch_data(page ? page : '1', sort_type ? sort_type : 'asc' , column_name ? column_name : 'id', term ? term : '');
    });

    function fetch_data(page, sort_type, sort_by, term)
    {
        let url = "/ajax-tasks?page="+page+"&sortby="+sort_by+"&sorttype="+sort_type+"&term="+term;
        let ajaxData = {
            url:url,
            success:function(data)
            {
                $("#js_items").empty().html(data);
            }
        };
        $.ajax(ajaxData)
    }
});


