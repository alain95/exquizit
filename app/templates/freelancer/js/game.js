/**
 * Created by alain.buetler on 07.08.14.
 */



$(document).ready(function(){

    $(".categoryButton").click(function()
    {

        var selector = "#rowGameCategory"+this.value;
        $(selector).toggle();

        var selector = "#rowCategory"+this.value;
        $(selector).toggle();

        var selector = "#categoryField" + this.value;

        $(selector).attr('name', 'kat'+this.value);
        $(selector).attr('value', this.value);

        $("#errorNoCategory").hide().fadeOut();

    })

    $(".removeCategoryButton").click(function()
    {

        var selector = "#rowGameCategory"+this.value;
        $(selector).toggle();

        var selector = "#rowCategory"+this.value;
        $(selector).toggle();

        var selector = "#categoryField"+this.value;


        $(selector).removeAttr('name');
        $(selector).removeAttr('value');
    })


    $(".answer").click(function()
    {
        $.ajax({
            type: "POST",
            url: 'check',
            data: {
                id : this.value
            }
        }).done(function(data)
            {
                var obj = jQuery.parseJSON(data);
                console.log(obj);
                var selector = '#answer' + obj.id;
                var correctSelector = '#answer' + obj.korrektID;
                if(obj.korrekt == "1")
                {
                    $(selector).removeClass('btn-info');
                    $(selector).addClass('btn-success');
                    $('.answer').attr("disabled", "disabled");
                    $('#gameButtons').hide();
                    $('#jokerButtons').hide();
                    $('#nextRoundButton').show();
                }
                else
                {
                    $(correctSelector).addClass('btn-success');
                    $(selector).removeClass('btn-info');
                    $(selector).addClass('btn-danger');
                    $('.answer').attr("disabled", "disabled");
                    $('#gameButtons').hide();
                    $('#jokerButtons').hide();
                    $('#lostGame').show();
                }
            })
    })

    $("#fiftyfiftyJoker").click(function()
    {

        $.ajax({
            type: "POST",
            url: 'joker',
            data: {
                id : this.value,
                jokerType : 'fiftyfity'
            }
        }).done(function(data)
            {
                var array = jQuery.parseJSON(data);
                $.each(array, function( key, value ) {
                    $("#answer" + value.antwortID).attr("disabled", "disabled");
                    $("#fiftyfiftyJoker").attr("disabled", "disabled");
                })
            })
    })

    $("#skipQuestionJoker").click(function()
    {

        $.ajax({
            type: "POST",
            url: 'joker',
            data: {
                id : this.value,
                jokerType : 'skip'
            }
        }).done(function()
            {
                location.reload();
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
                   $('body').html(data);
                    history.pushState(null, document.title, 'quiz/start');
                    var ctx = document.getElementById("questionChart").getContext("2d");
                    window.myPie = new Chart(ctx).Pie(pieData);
                })
        }
    })

    $("#finishGameBtn").click(function()
    {
        $.ajax({
            type: "POST",
            url: 'finish',
            data: {id: this.value}
        }).done(function(data)
            {
                $('body').html(data);
                history.pushState(null, document.title, '/quiz');
            })
    })

})




