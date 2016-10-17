// Shorthand for $( document ).ready()
$(function() {

    $('#create_category').click(function(e){
    	e.preventDefault(); 
        var name = $('#category_name').val();
    $.ajax
    ({ 
        url: '/admin/blog/category/create',
        data: {"name": name, '_token': $('input[name=_token]').val()},
        type: 'post',
        success: function()
        {
          location.reload();
        }       
    });
  });

   $('.delete_cat').click(function(e){
    	e.preventDefault();
        var category_id = $(this).attr('href');
    $.ajax
    ({ 
        url: '/admin/blog/category/'+category_id+'/delete',
        type: 'get',
        success: function(msg)
        {
          $(".show_results").html(msg['message']);

          setTimeout(function(){
             location.reload();
          }, 2000);
           //console.log(msg['message']);
          //location.reload();
        }     
    });
  });
   
  var cat_id=0;
   $('.edit_cat').click(function(e){
     e.preventDefault();

     var category_name = $(this).parent().prev('.category-name').find('p').html();
     cat_id = $(this).attr('href');
     // alert(cat_id);
     $('#category-name').val(category_name);
     $('#edit-modal').modal();
        //var category_id = $(this).attr('href');
        //alert(category_id);
  });

  $('#save-category').on('click',function(e){
    e.preventDefault();
    var token = $('input[name=_token1]').val();
    $.ajax
    ({ 
      url: '/admin/blog/category/edit',
      type: 'post',
      data : {category:$('#category-name').val(),_token:token,cat_id:cat_id },
      success: function(msg)
      {
        var href = '[href='+cat_id+']';
        $('a[class="edit_cat"]'+href).parent().prev().find('p').text(msg['new_body']);
        $('#edit-modal').modal('hide');
      }
    });
  });

});