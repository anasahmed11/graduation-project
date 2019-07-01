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
$(".see-location").click(function initMap() {
    doctorlat=parseFloat($(this).data('lat'));
    doctorlong=parseFloat($(this).data('long'));
    myLatLng ={lat: doctorlat, lng: doctorlong};


    var map = new google.maps.Map(document.getElementById('doctor-map'), {
        zoom: 12,
        center: myLatLng
    });

    var marker = new google.maps.Marker({
        position: myLatLng,
        map: map,
        title: 'Hello World!'
    });


});

/* make condition to visit date */
$(function(){
    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth()+1; //January is 0!
    var yyyy = today.getFullYear();
    if(dd<10){
        dd='0'+dd
    }
    if(mm<10){
        mm='0'+mm
    }

    today = yyyy+'-'+mm+'-'+dd;
    $("#visit-date").attr("min", today);
});


/* ------------------- visit----------------- */
$(".book").click(function(){
    $("#visit-doc-id").val($(this).data('id'));
});
$(document).on('click',"#send-date",function(e){
     gg=$("#visit-date").val();
});
$(document).on('click',"#book-now",function(e){
    var visitform=$('#book-form').serialize();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'POST',
        url: 'find-doctor',
        data: new FormData($("#book-form")[0]),
        dataType:'json',
        async:false,
        contentType: false,
        processData: false,
        success: function (data) {
            if((data.errors)){
                Swal.fire({
                    type: 'error',
                    title: 'Oops... , try again',
                    text: 'Booking was not done ! fill all fields and try again,may be the time you choose already reserved',
                })
            }else{
                Swal.fire(
                    'Booking successful!',
                    'Please pay by this number , 0128 686 4229',
                    'success'
                )
            }
            $('#book-form').trigger("reset");

        }

    });
    e.preventDefault();


});
// booking view //
$(".doctor-info").click(function initMap() {
    doctorlat=parseFloat($(this).data('lat'));
    doctorlong=parseFloat($(this).data('long'));
    myLatLng ={lat: doctorlat, lng: doctorlong};


    var map = new google.maps.Map(document.getElementById('doctor-map'), {
        zoom: 12,
        center: myLatLng
    });

    var marker = new google.maps.Marker({
        position: myLatLng,
        map: map,
        title: 'Hello World!'
    });


});
// notes //
$(document).on('click',".details",function(e){
    $(".note-p").html("<h1>notes</h1>"+$(this).data('note'));
    $(".drug-p").html("<h1>drugs</h1>"+$(this).data('drug'));
});
//rate//
$(".rate").click(function(){
    rate=$(this).data('rate');
    d_id=$(this).data('id');
    $("#doctor-times").val($(this).data('times')+1);
});
$(document).on('click',"#new-rate",function(e){
    $("#doctor-rate").val((parseInt($("#doctor-rates").val())+rate));
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'POST',
        url: 'history/'+d_id,
        data: new FormData($("#rate-form")[0]),
        dataType:'json',
        async:false,
        contentType: false,
        processData: false,
        success: function (data) {
            if((data.errors)){
                Swal.fire({
                    type: 'error',
                    title: "Oops... , try again",
                    text: 'your rate not send successfully ! fill all fields and try again',
                })
            }else{
                Swal.fire(
                    'rating successful!',
                    'your rate done',
                    'success'
                )
            }
            $('#book-form').trigger("reset");

        }

    });
    e.preventDefault();


});
