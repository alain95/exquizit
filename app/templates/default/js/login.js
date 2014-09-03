/**
 * Created by alain.buetler on 29.08.14.
 */

$(document).ready(function(){

    $("#registerForm").submit(function(event)
    {
        event.preventDefault();
        var postData = $(this).serializeArray();

        $.ajax({
            type: "POST",
            url: 'register',
            data: postData
        }).done(function()
            {

            })
    })

})