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


})


