$("#change").click(function(){
    $("#red").css('visibility','visible').fadeToggle(1000);
    $("#black").css('visibility','visible').fadeToggle(1200);
    $("#green").css('visibility','visible').fadeToggle(1400);
    $("#blue").css('visibility','visible').fadeToggle(1600);
    $("#purple").css('visibility','visible').fadeToggle(1800);

})
document.getElementById("green").style.visibility = "hidden";
document.getElementById("red").style.visibility = "hidden";
document.getElementById("black").style.visibility = "hidden";
document.getElementById("blue").style.visibility = "hidden";
document.getElementById("purple").style.visibility = "hidden";
$("#red").click(function(){
    $(".overlay").removeClass("o-blue o-black o-green o-purple");
    $(".overlay").addClass("o-red");
    $("#menu-toggle").addClass("red");
    $("#menu-toggle").removeClass("black green azure purple");
})
$("#black").click(function(){
    $(".overlay").removeClass("o-blue o-red o-green o-purple");
    $(".overlay").addClass("o-black");
    $("#menu-toggle").addClass("black");
    $("#menu-toggle").removeClass("red green azure purple");
})
$("#blue").click(function(){
    $(".overlay").removeClass("o-red o-black o-green o-purple");
    $(".overlay").addClass("o-blue");
    $("#menu-toggle").addClass("azure");
    $("#menu-toggle").removeClass("black green red purple");
})
$("#green").click(function(){
    $(".overlay").removeClass("o-blue o-black o-red o-purple");
    $(".overlay").addClass("o-green");
    $("#menu-toggle").addClass("green");
    $("#menu-toggle").removeClass("black red azure purple");
})
$("#purple").click(function(){
    $(".overlay").removeClass("o-blue o-black o-red o-green");
    $(".overlay").addClass("o-purple");
    $("#menu-toggle").addClass("purple");
    $("#menu-toggle").removeClass("black red azure green");
})
$(".alert-success").hide();
$(function(){
    /* ------------------- visit method ----------------- */
    $(document).on('click',"#new-method",function(e){
        var form=$('#add-method-form').serialize();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'POST',
            url: 'visit-method',
            data: form,
            processData: false,
            success: function (data) {
                if((data.errors)){
                    $(".alert-success").show();
                    $(".alert-success").addClass("alert-danger");
                    $(".alert-danger").html("error please fill all inputs ,try again");
                }else{
                    $(".alert-success").show();
                    $(".alert-success").html('success');
                    $(".method-table").append("<tr class='method-"+data.id+"'>"+
                        "<td>"+data.id+"</td>"+
                        "<td>"+data.type+"</td>"+
                        "<td><button class='edit btn btn-success'  data-toggle='modal' data-target='#edit-modal-method' data-id='" + data.id + "' data-title='"+ data.type + "' >update</button></td>"
                        +
                        "<td><button class='delete-method btn btn-danger'  data-id='" + data.id +  "' >Delete</button></td>"
                        +
                        "</tr>")
                }
                $('#add-method-form').trigger("reset");
                $(".alert-success").load(" .alert-success");
                $(".alert-danger").load(" .alert-danger");
            }

        });
        e.preventDefault();


    });
    $(document).on('click',".delete-method",function(e) {
        var method_id=$(this).data('id');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'DELETE',
            url: 'visit-method/'+method_id,
            processData: false,
            success: function () {
                $(".method-"+method_id).remove();

            }
        });
        e.preventDefault();
    });
    $(".edit-method").click(function(){
        $("#type-edit").val($(this).data('title'));
        mid=$(this).data('id');
    });
    $(document).on('click',"#edit-method",function(e){
        var form=$('#edit-method-form').serialize();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'PUT',
            url: 'visit-method/'+mid,
            data: form,
            processData: false,
            success: function (data) {
                if((data.errors)){
                    $(".alert-success").show();
                    $(".alert-success").addClass("alert-danger");
                    $(".alert-danger").html("error please fill all inputs ,try again");
                }else{
                    $(".alert-success").show();
                    $(".alert-success").html('success');
                    $(".method-"+mid).replaceWith("<tr class='method-"+mid+"'>"+
                        "<td>"+mid+"</td>"+
                        "<td>"+data.type+"</td>"+
                        "<td><button class='edit btn btn-success'  data-toggle='modal' data-target='#edit-modal-method' data-id='" + mid + "' data-title='"+ data.type + "' >update</button></td>"
                        +
                        "<td><button class='delete-method btn btn-danger'  data-id='" + mid +  "' >Delete</button></td>"
                        +
                        "</tr>")
                }
                $(".alert-success").load(" .alert-success");
                $(".alert-danger").load(" .alert-danger");
            }
        });
        e.preventDefault();


    });
    /* ------------- pay method --------------*/
    $(document).on('click',"#new-pay",function(e){
        var pform=$('#add-pay-form').serialize();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'POST',
            url: 'payment-method',
            data: pform,
            processData: false,
            success: function (data) {
                if((data.errors)){
                    $(".alert-success").show();
                    $(".alert-success").addClass("alert-danger");
                    $(".alert-danger").html("error please fill all inputs ,try again");
                }else{
                    $(".alert-success").show();
                    $(".alert-success").html('success');
                    $(".method-table").append("<tr class='method-"+data.id+"'>"+
                        "<td>"+data.id+"</td>"+
                        "<td>"+data.method+"</td>"+
                        "<td><button class='edit-pay btn btn-success'  data-toggle='modal' data-target='#edit-modal-method' data-id='" + data.id + "' data-title='"+ data.method + "' >update</button></td>"
                        +
                        "<td><button class='delete-pay btn btn-danger'  data-id='" + data.id +  "' >Delete</button></td>"
                        +
                        "</tr>")
                }
                $('#add-pay-form').trigger("reset");
                $(".alert-success").load(" .alert-success");
                $(".alert-danger").load(" .alert-danger");
            }

        });
        e.preventDefault();


    });
    $(document).on('click',".delete-pay",function(e) {
        var pay_id=$(this).data('id');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'DELETE',
            url: 'payment-method/'+pay_id,
            processData: false,
            success: function () {
                $(".method-"+pay_id).remove();

            }
        });
        e.preventDefault();
    });
    $(".edit-pay").click(function(){
        $("#pay-edit").val($(this).data('title'));
        payid=$(this).data('id');
    });
    $(document).on('click',"#edit-pay",function(e){
        var pform=$('#edit-pay-form').serialize();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'PUT',
            url: 'payment-method/'+payid,
            data: pform,
            processData: false,
            success: function (data) {
                if((data.errors)){
                    $(".alert-success").show();
                    $(".alert-success").addClass("alert-danger");
                    $(".alert-danger").html("error please fill all inputs ,try again");
                }else{
                    $(".alert-success").show();
                    $(".alert-success").html('success');
                    $(".method-"+payid).replaceWith("<tr class='method-"+payid+"'>"+
                        "<td>"+payid+"</td>"+
                        "<td>"+data.method+"</td>"+
                        "<td><button class='edit-pay btn btn-success'  data-toggle='modal' data-target='#edit-modal-method' data-id='" + payid + "' data-title='"+ data.method + "' >update</button></td>"
                        +
                        "<td><button class='delete-pay btn btn-danger'  data-id='" + payid +  "' >Delete</button></td>"
                        +
                        "</tr>")
                }
                $(".alert-success").load(" .alert-success");
                $(".alert-danger").load(" .alert-danger");
            }
        });
        e.preventDefault();


    });
    /* ------------- doctor req --------------*/
    $(document).on('click',".delete-doctorreq",function(e) {
        var dreq_id=$(this).data('id');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'DELETE',
            url: 'doctor-request/'+dreq_id,
            processData: false,
            success: function () {
                $(".doctorreq-"+dreq_id).remove();

            }
        });
        e.preventDefault();
    });

    /* ------------------- category----------------- */
    $(document).on('click',"#new-category",function(e){
        var catform=$('#add-category-form').serialize();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'POST',
            url: 'categories',
            data: catform,
            processData: false,
            success: function (data) {
                if((data.errors)){
                    $(".alert-success").show();
                    $(".alert-success").addClass("alert-danger");
                    $(".alert-danger").html("error please fill all inputs ,try again");
                }else{
                    $(".alert-success").show();
                    $(".alert-success").html('success');
                    $(".method-table").append("<tr class='category-"+data.id+"'>"+
                        "<td>"+data.id+"</td>"+
                        "<td>"+data.name+"</td>"+
                        "<td><button class='edit-category btn btn-success'  data-toggle='modal' data-target='#edit-modal-method' data-id='" + data.id + "' data-title='"+ data.name + "' >update</button></td>"
                        +
                        "<td><button class='delete-category btn btn-danger'  data-id='" + data.id +  "' >Delete</button></td>"
                        +
                        "</tr>")
                }
                $('#add-category-form').trigger("reset");
                $(".alert-success").load(" .alert-success");
                $(".alert-danger").load(" .alert-danger");
            }

        });
        e.preventDefault();


    });
    $(document).on('click',".delete-category",function(e) {
        var category_id=$(this).data('id');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'DELETE',
            url: 'categories/'+category_id,
            processData: false,
            success: function () {
                $(".category-"+category_id).remove();
            }
        });
        e.preventDefault();
    });
    $(".edit-category").click(function(){
        $("#category-edit").val($(this).data('title'));
        catid=$(this).data('id');
    });
    $(document).on('click',"#edit-category",function(e){
        var catform=$('#edit-category-form').serialize();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'PUT',
            url: 'categories/'+catid,
            data: catform,
            processData: false,
            success: function (data) {
                if((data.errors)){
                    $(".alert-success").show();
                    $(".alert-success").addClass("alert-danger");
                    $(".alert-danger").html("error please fill all inputs ,try again");
                }else{
                    $(".alert-success").show();
                    $(".alert-success").html('success');
                    $(".category-"+catid).replaceWith("<tr class='category-"+catid+"'>"+
                        "<td>"+catid+"</td>"+
                        "<td>"+data.name+"</td>"+
                        "<td><button class='edit-category btn btn-success'  data-toggle='modal' data-target='#edit-modal-method' data-id='" + catid + "' data-title='"+ data.name + "' >update</button></td>"
                        +
                        "<td><button class='delete-category btn btn-danger'  data-id='" + catid +  "' >Delete</button></td>"
                        +
                        "</tr>")
                }
                $(".alert-success").load(" .alert-success");
                $(".alert-danger").load(" .alert-danger");
            }
        });
        e.preventDefault();


    });
    /* ------------------- blog----------------- */
    $(document).on('click',"#new-blog",function(e){
        var blogform=$('#add-blog-form').serialize();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'POST',
            url: 'blog-page',
            data: new FormData($("#add-blog-form")[0]),
            dataType:'json',
            async:false,
            contentType: false,
            processData: false,
            success: function (data) {
                if((data.errors)){
                    $(".alert-success").show();
                    $(".alert-success").addClass("alert-danger");
                    $(".alert-danger").html("error please fill all inputs ,try again");
                }else{
                    $(".alert-success").show();
                    $(".alert-success").html('success');
                    $(".method-table").append("<tr class='category-"+data.id+"'>"+
                        "<td>"+data.id+"</td>"+
                        "<td>"+data.title+"</td>"+
                        "<td>"+data.article+"</td>"+
                        "<td>"+data.photo+"</td>"+
                        "<td><button class='edit-blog btn btn-success'  data-toggle='modal' data-target='#edit-modal-method' data-id='" + data.id + "' data-article='" + data.article + "' data-photo='" + data.photo + "' data-title='"+ data.title + "' >update</button></td>"
                        +
                        "<td><button class='delete-blog btn btn-danger'  data-id='" + data.id +  "' >Delete</button></td>"
                        +
                        "</tr>")
                }
                $('#add-blog-form').trigger("reset");
                $(".alert-success").load(" .alert-success");
                $(".alert-danger").load(" .alert-danger");
            }

        });
        e.preventDefault();


    });
    $(document).on('click',".delete-blog",function(e) {
        var blog_id=$(this).data('id');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'DELETE',
            url: 'blog-page/'+blog_id,
            processData: false,
            success: function () {
                $(".blog-"+blog_id).remove();
            }
        });
        e.preventDefault();
    });
    $(".edit-blog").click(function(){
        $("#title-edit").val($(this).data('title'));
        $("#article-edit").val($(this).data('article'));
        blogid=$(this).data('id');
    });
    $(document).on('click',"#edit-blog",function(e){
        var blogform=$('#edit-blog-form').serialize();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'POST',
            url: 'blog-page/'+blogid,
            data: new FormData($("#edit-blog-form")[0]),
            dataType:'json',
            async:false,
            contentType: false,
            processData: false,
            success: function (data) {
                if((data.errors)){
                    $(".alert-success").show();
                    $(".alert-success").addClass("alert-danger");
                    $(".alert-danger").html("error please fill all inputs ,try again");
                }else{
                    $(".alert-success").show();
                    $(".alert-success").html('success');
                    $(".blog-"+blogid).replaceWith("<tr class='blog-"+blogid+"'>"+
                        "<td>"+blogid+"</td>"+
                        "<td>"+data.title+"</td>"+
                        "<td>"+data.article+"</td>"+
                        "<td>"+data.photo+"</td>"+
                        "<td><button class='edit-blog btn btn-success'  data-toggle='modal' data-target='#edit-modal-method' data-id='" + blogid + "' data-article='" + data.article + "' data-photo='" + data.photo + "' data-title='"+ data.name + "' >update</button></td>"
                        +
                        "<td><button class='delete-blog btn btn-danger'  data-id='" + blogid +  "' >Delete</button></td>"
                        +
                        "</tr>")
                }
                $(".alert-success").load(" .alert-success");
                $(".alert-danger").load(" .alert-danger");
            }
        });
        e.preventDefault();


    });
    /* ------------------- blog----------------- */
    $(document).on('click',"#new-location",function(e){
        var locationform=$('#add-location-form').serialize();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'POST',
            url: 'locations',
            data: new FormData($("#add-location-form")[0]),
            dataType:'json',
            async:false,
            contentType: false,
            processData: false,
            success: function (data) {
                if((data.errors)){
                    $(".alert-success").show();
                    $(".alert-success").addClass("alert-danger");
                    $(".alert-danger").html("error please fill all inputs ,try again");
                }else{
                    if(data.name==undefined){
                        $(".alert-success").show();
                        $(".alert-success").addClass("alert-danger");
                        $(".alert-danger").html("this doctor id not found in doctors table");
                    }
                    else{
                        $(".alert-success").show();
                        $(".alert-success").html('success');
                        $(".method-table").append("<tr class='location-"+data.id+"'>"+
                            "<td>"+data.id+"</td>"+
                            "<td>"+data.name+"</td>"+
                            "<td>"+data.long+"</td>"+
                            "<td>"+data.lat+"</td>"+
                            "<td>"+data.d_id+"</td>"+
                            "<td><button class='edit-location btn btn-success'  data-toggle='modal' data-target='#edit-modal-location' data-id='" + data.id + "' data-name='" + data.name + "' data-long='" + data.long + "' data-lat='"+ data.lat + "'  data-doctor='"+ data.d_id + "'>update</button></td>"
                            +
                            "<td><button class='delete-location btn btn-danger'  data-id='" + data.id +  "' >Delete</button></td>"
                            +
                            "</tr>")
                    }

                }
                $('#add-location-form').trigger("reset");
                $(".alert-success").load(" .alert-success");
                $(".alert-danger").load(" .alert-danger");
            }

        });
        e.preventDefault();


    });
    $(document).on('click',".delete-location",function(e) {
        var location_id=$(this).data('id');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'DELETE',
            url: 'locations/'+location_id,
            processData: false,
            success: function () {
                $(".location-"+location_id).remove();
            }
        });
        e.preventDefault();
    });
    $(".edit-location").click(function(){
        $("#name-edit").val($(this).data('name'));
        $("#long-edit").val($(this).data('long'));
        $("#lat-edit").val($(this).data('lat'));
        $("#d_id-edit").val($(this).data('doctor'));
        locationid=$(this).data('id');
    });
    $(document).on('click',"#edit-location",function(e){
        var blogform=$('#edit-location-form').serialize();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'POST',
            url: 'locations/'+locationid,
            data: new FormData($("#edit-location-form")[0]),
            dataType:'json',
            async:false,
            contentType: false,
            processData: false,
            success: function (data) {
                if((data.errors)){
                    $(".alert-success").show();
                    $(".alert-success").addClass("alert-danger");
                    $(".alert-danger").html("error please fill all inputs ,try again");
                }else{
                    $(".alert-success").show();
                    $(".alert-success").html('success');
                    $(".location-"+locationid).replaceWith("<tr class='location-"+data.id+"'>"+
                        "<td>"+data.id+"</td>"+
                        "<td>"+data.name+"</td>"+
                        "<td>"+data.long+"</td>"+
                        "<td>"+data.lat+"</td>"+
                        "<td>"+data.d_id+"</td>"+
                        "<td><button class='edit-location btn btn-success'  data-toggle='modal' data-target='#edit-modal-location' data-id='" + data.id + "' data-name='" + data.name + "' data-long='" + data.long + "' data-lat='"+ data.lat + "'  data-doctor='"+ data.d_id + "'>update</button></td>"
                        +
                        "<td><button class='delete-location btn btn-danger'  data-id='" + data.id +  "' >Delete</button></td>"
                        +
                        "</tr>")
                }
                $(".alert-success").load(" .alert-success");
                $(".alert-danger").load(" .alert-danger");
            }
        });
        e.preventDefault();


    });




})


/* ------------------------------------------------------------- doctor views --------------------------------------------------------*/
/* ------------------- doctor----------------- */
$(document).on('click',"#new-doctor-add",function(e){
    var doctorform=$('#add-doctor-form').serialize();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'POST',
        url: 'admin',
        data: new FormData($("#add-doctor-form")[0]),
        dataType:'json',
        async:false,
        contentType: false,
        processData: false,
        success: function (data) {
            if((data.errors)){
                $(".alert-success").show();
                $(".alert-success").addClass("alert-danger");
                $(".alert-danger").html("error please fill all inputs ,try again");
            }else{
                $(".alert-success").show();
                $(".alert-success").html('success');
                alert('success');
            }
            $('#add-doctor-form').trigger("reset");
            $(".alert-success").load(" .alert-success");
            $(".alert-danger").load(" .alert-danger");
        }

    });
    e.preventDefault();


});
$(".edit-doctor").click(function(){
    $("#doc-name-edit").val($(this).data('name'));
    $("#doc-email-edit").val($(this).data('email'));
    $("#address-edit").val($(this).data('address'));
    $("#certificates-edit").val($(this).data('cert'));
    doctorid=$(this).data('id');
});

$(document).on('click',"#new-doctor-edit",function(e){
    var doctorform=$('#edit-doctor-form').serialize();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'POST',
        url: 'profile/'+doctorid,
        data: new FormData($("#edit-doctor-form")[0]),
        dataType:'json',
        async:false,
        contentType: false,
        processData: false,
        success: function (data) {
            if((data.errors)){
                Swal.fire({
                    type: 'error',
                    title: 'Oops... , try again',
                    text: 'error in update ! fill all fields and try again',
                })
            }else{
                Swal.fire(
                    'Done',
                    'profile updated successfully',
                    'success'
                )
            }
            $('#add-doctor-form').trigger("reset");

        }

    });
    e.preventDefault();


});


/* ------------------- price 1----------------- */
$(".set-price1").click(function(){
    doctor1id=$(this).data('id');
});

$(document).on('click',"#set-price1",function(e){
    var price1form=$('#set-price1-form').serialize();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'POST',
        url: 'price/'+doctor1id,
        data: new FormData($("#set-price1-form")[0]),
        dataType:'json',
        async:false,
        contentType: false,
        processData: false,
        success: function (data) {
            if((data.errors)){
                $(".alert-success").show();
                $(".alert-success").addClass("alert-danger");
                $(".alert-danger").html("error please fill all inputs ,try again");
            }else{
                $(".alert-success").show();
                $(".alert-success").html('success');
                alert('success');
            }
            $('#set-price1-form').trigger("reset");
            $(".alert-success").load(" .alert-success");
            $(".alert-danger").load(" .alert-danger");
        }

    });
    e.preventDefault();


});


/* ------------------- price 2----------------- */
$(".set-price2").click(function(){
    doctor2id=$(this).data('id');
});

$(document).on('click',"#set-price2",function(e){
    var price2form=$('#set-price2-form').serialize();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'POST',
        url: 'price2/'+doctor2id,
        data: new FormData($("#set-price2-form")[0]),
        dataType:'json',
        async:false,
        contentType: false,
        processData: false,
        success: function (data) {
            if((data.errors)){
                $(".alert-success").show();
                $(".alert-success").addClass("alert-danger");
                $(".alert-danger").html("error please fill all inputs ,try again");
            }else{
                $(".alert-success").show();
                $(".alert-success").html('success');
                alert('success');
            }
            $('#set-price2-form').trigger("reset");
            $(".alert-success").load(" .alert-success");
            $(".alert-danger").load(" .alert-danger");
        }

    });
    e.preventDefault();


});

/* ------------------- price 1----------------- */
$(".edit-price1").click(function(){
    edoctor1id=$(this).data('id');
});

$(document).on('click',"#edit-price1",function(e){
    var eprice1form=$('#edit-price1-form').serialize();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'POST',
        url: 'price-edit/'+edoctor1id,
        data: new FormData($("#edit-price1-form")[0]),
        dataType:'json',
        async:false,
        contentType: false,
        processData: false,
        success: function (data) {
            if((data.errors)){
                $(".alert-success").show();
                $(".alert-success").addClass("alert-danger");
                $(".alert-danger").html("error please fill all inputs ,try again");
            }else{
                $(".alert-success").show();
                $(".alert-success").html('success');
                alert('success');
            }
            $('#set-price2-form').trigger("reset");
            $(".alert-success").load(" .alert-success");
            $(".alert-danger").load(" .alert-danger");
        }

    });
    e.preventDefault();


});

/* ------------------- price 1----------------- */
$(".edit-price2").click(function(){
    edoctor2id=$(this).data('id');
});

$(document).on('click',"#edit-price2",function(e){
    var eprice2form=$('#edit-price2-form').serialize();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'POST',
        url: 'price-edit2/'+edoctor2id,
        data: new FormData($("#edit-price2-form")[0]),
        dataType:'json',
        async:false,
        contentType: false,
        processData: false,
        success: function (data) {
            if((data.errors)){
                $(".alert-success").show();
                $(".alert-success").addClass("alert-danger");
                $(".alert-danger").html("error please fill all inputs ,try again");
            }else{
                $(".alert-success").show();
                $(".alert-success").html('success');
                alert('success');
            }
            $('#set-price2-form').trigger("reset");
            $(".alert-success").load(" .alert-success");
            $(".alert-danger").load(" .alert-danger");
        }

    });
    e.preventDefault();


});
function initMap() {

        myLatLng ={lat: parseFloat($("#map").attr('data-lat')), lng: parseFloat($("#map").attr('data-long'))};


    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 12,
        center: myLatLng
    });

    var marker = new google.maps.Marker({
        position: myLatLng,
        map: map,
        title: 'Hello World!'
    });
}
// note //
$(".notes").click(function(){
    $("#visit-id").val($(this).data('id'));
});
$(document).on('click',"#new-notes",function(e){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'POST',
        url: 'my-history',
        data: new FormData($("#notes-form")[0]),
        dataType:'json',
        async:false,
        contentType: false,
        processData: false,
        success: function (data) {
            if((data.errors)){
                Swal.fire({
                    type: 'error',
                    title: 'Oops... , try again',
                    text: 'notes was not done ! fill all fields and try again',
                })
            }else{
                Swal.fire(
                    'done',
                    'notes added to this visit',
                    'success'
                )
            }
            $('#book-form').trigger("reset");

        }

    });
    e.preventDefault();


});
