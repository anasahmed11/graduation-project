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
                    Swal.fire({
                        type: 'error',
                        title: 'Oops... , try again',
                        text: 'Something went wrong ! fill all fields and try again',
                    })
                }else{
                    Swal.fire(
                        'Your request has been successfully sent !',
                        'We will contact you soon',
                        'success'
                    )
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
                    Swal.fire({
                        type: 'error',
                        title: 'Oops...,try again',
                        text: 'Something went wrong ! fill all fields and try again',
                    })
                }else{
                    Swal.fire(
                        'Thank You',
                        'Your message has been successfully sent , we will try to solve your problems!',
                        'success'
                    )
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
