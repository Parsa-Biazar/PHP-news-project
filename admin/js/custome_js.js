$(document).ready(function (){
    $(".delete-item").click(function(){
        //alert($(this).attr('code') + " | " + $(this).attr('text'));
        $("#delete-title").html($(this).attr('text'));
        $("#delete_item_id").val($(this).attr('code'));
        // $("#delete-confirm").slideDown();
    });

    $("#close-alert").click(function (){
        $("#delete-confirm").slideUp();
    });

    setTimeout(function (){
        $("#global-message").slideUp();
    },3000)
});