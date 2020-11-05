
$(document).ready(function (){
   
    $('.noneactive').first().addClass('active');
    $('#pagi').each(function() {
        $($(this)).on('click', 'li', function(e){
            e.preventDefault();
            $(this).addClass('active').siblings().removeClass('active');
        });
        
    });

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    //phan trang
    $('a[class="load-flim"]').on('click', function(){
        var num = $(this).attr('aria-details');
        var url = $(this).data('url');
        var list = $('#movie-last-movie').data('list');
        $.ajax({
            url: url,
            method:'POST',
            data:{num:num ,arr:list },
            success: function(result){
                
                $('#movie-last-movie').html(result);
            }
        })
    });
    //close btn
    $('button[type="submit"]').on('click', function(){
        
    //    console.log('hello');
       if ($(this).hasClass('btn-primary')) {
        $(this).css("display","none");
        return true;
       } else {
           
       }
       
    });
    
    
    setInterval(function(){
        var flimid = $('#box-comment').attr('data');
        var url = $('#box-comment').data('url');
        if (flimid !== undefined|| url !== undefined) {
            $.ajax({
                url: url,
                method:'POST',
                data:{flim_id:flimid },
                success: function(result){
                    //console.log("run");
                     $('#box-comment').html(result);
                }
            })
        } else {
            
        }
        
    },3000000);
    $("#formaddchat").submit(function(e) {

        e.preventDefault(); // avoid to execute the actual submit of the form.
    
        var form = $(this);
        var url = form.attr('action');
        
        $.ajax({
               method: "POST",
               url: url,
               data: form.serialize(), // serializes the form's elements.
               success: function(result){
                $('#contenttext').val('');
                $('#box-comment').html(result);
                }
             });
    
        
    });
    $(document).on('click','button[name="dbtn"]', function(){
        var num = $(this).attr('id');
        var flimid = $(this).attr('data');
        var url = $(this).data('url');
        $.ajax({
            url: url,
            method:'POST',
            data:{idcm:num , flim_id:flimid},
            success: function(result){
               
                 $('#box-comment').html(result);
            }
        })
        
    });
    $("select[name='admin-comment']").change(function (){
        var flim_id = $(this).val();
        var url = $(this).data('url');
        $.ajax({
            url: url,
            method:'POST',
            data:{flim_id:flim_id}, 
            dataType: 'html',          
            success: function(result){          
                $('#admin-boxcomment').html(result);
                
            }
        })
    });
    $(document).on('click','button[name="admin-xoacomment"]', function(){
        var num = $(this).attr('id');
        var flimid = $(this).attr('data');
        var url = $(this).data('url');
        $.ajax({
            url: url,
            method:'POST',
            data:{id:num , flim_id:flimid},
            success: function(result){           
                 $('#admin-boxcomment').html(result);
            }
        })
        
    });
    $(document).on('click','.jw-icon-display', function(){
        var chapid = $('#data').data('id');
        var url = $('#data').data('url');
        $.ajax({
            url: url,
            method:'POST',
            data:{id:chapid },
            success: function(result){
               
                //  console.log(result);
            }
        })
        
    });
    

});