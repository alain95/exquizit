/**
 * Created by alain.buetler on 07.08.14.
 */
$(document).ready(function(){

    $(".addCategoryButton").click(function()
    {
        var selector = "#row"+this.value;
        var selectorID = "#katID"+this.value;
        var selectorBez = "#bez"+this.value;
        var tdID = $(selector).find(selectorID).html();
        var tdBez = $(selector).find(selectorBez).html();
        $('#myCategoryTable').append('<tr id="gamerow'+this.value+'"><td>'+ tdID +'</td><td>' + tdBez +"</td><td>"+
           "<button class=\"removeCategoryButton btn btn-danger btn-xs\" onclick='removeCategoryButtonClick("+this.value+")'> "+
               "<span class=\"glyphicon glyphicon-arrow-left\"></span>"+
           " </button></td></tr>");

        $(selector).hide();

        $('#startGameForm').append('<input type="hidden" value="'+this.value+'" name="kat'+this.value+'" />');



    })

    $(".answer").click(function()
    {

        $.ajax({
            type: "POST",
            url: 'check',
            data: {id : this.value}
        }).done(function(data)
            {
                var obj = jQuery.parseJSON(data);
                console.log(obj);
                var selector = '#answer' + obj.id;
                if(obj.korrekt == "1")
                {
                    $(selector).removeClass('btn-info');
                    $(selector).addClass('btn-success');
                    $('.answer').attr("disabled", "disabled");
                    $('#gameButtons').hide();
                    $('#nextRoundButton').show();
                }
                else
                {
                    $(selector).removeClass('btn-info');
                    $(selector).addClass('btn-danger');
                    $('.answer').attr("disabled", "disabled");
                }
            })
    })

    $("#fiftyfifty").click(function()
    {

        $.ajax({
            type: "POST",
            url: 'joker',
            data: {id : this.value}
        }).done(function(data)
            {
                var array = jQuery.parseJSON(data);
                $.each(array, function( key, value ) {
                    $("#answer" + value.antwortID).attr("disabled", "disabled");
                    $("#fiftyfifty").attr("disabled", "disabled");
                })
            })
    })

    $("#startGameForm").submit(function(event)
    {
        event.preventDefault();
        data = $(this).serialize();

        if(data == '')
        {
            $('#errorNoCategory').show();
        }
        else
        {
            $.ajax({
                type: "POST",
                url: 'quiz/start',
                data: data
            }).done(function(data)
                {
                   $('#mainContainer').html(data);
                    history.pushState(null, document.title, 'quiz/start');
                })
        }
    })

})

function removeCategoryButtonClick(id)
{
    var selector = "#row"+id;
    var selectorGame = "#gamerow" + id;

    $('#myCategoryTable').children(selectorGame).remove();
    $(selector).show();
}


