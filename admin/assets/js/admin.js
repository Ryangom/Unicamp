$('.delete_btn').click(function (e) { 
    e.preventDefault();
    var id =$(this).closest('tr').find('.std_id').text();
    console.log(id);

    $('#delete_id').val(id);
    
});


