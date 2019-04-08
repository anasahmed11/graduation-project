$(".alert-success").hide();
$(function(){

    /* ------------- doctor req --------------*/
    $(document).on('click',"#new-doctor-req",function(e){
        var dreqform=$('#new-doctorreq-form').serialize();
        $.ajax({
            type: 'POST',
            url: 'newdoctor',
            data: dreqform,
            processData: false,
            success: function (data) {
                if((data.errors)){
                    $(".alert-success").show();
                    $(".alert-success").addClass("alert-danger");
                    $(".alert-danger").html("error please fill all inputs ,try again");
                }else{
                    $(".alert-success").show();
                    $(".alert-success").html('success');
                }
                $('#new-doctorreq-form').trigger("reset");

            }

        });
        e.preventDefault();


    });

    /* ------------- doctor req --------------*/
    $(document).on('click',"#new-client-rev",function(e){
        var clientrevform=$('#new-clientrev-form').serialize();
        $.ajax({
            type: 'POST',
            url: 'contact-us',
            data: clientrevform,
            processData: false,
            success: function (data) {
                if((data.errors)){
                    $(".alert-success").show();
                    $(".alert-success").addClass("alert-danger");
                    $(".alert-danger").html("error please fill all inputs ,try again");
                }else{
                    $(".alert-success").show();
                    $(".alert-success").html('success');
                }
                $('#new-clientrev-form').trigger("reset");


            }

        });
        e.preventDefault();

    });

    /* ------------- blog -------------*/
    $(".blog-ajx").click(function(){
        var path="uploads/"
        $(".img-ajx").html('<img src="'+path+$(this).data('photo')+'" width="100%">');
        $(".desc-ajx").html('<h2>'+$(this).data('title')+'</h2><br>' +
            '<p>'+$(this).data('article')+'</p>');

    });

})
