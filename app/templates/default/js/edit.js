/**
 * Created by alain.buetler on 10.07.14.
 */

$(document).ready(function(){
    $(".editCategoryButton").click(function()
    {
        var selector = "#bez"+this.value;
        var selectorBtn = "#save"+this.value;
        var text =  $(selector).html();
        $(this).hide();
        $(selectorBtn).show();
        $(selector).html("<form class='form-inline'><div class='form-group'>" +
            "<input class='form-control' id='bezNeu"+this.value+"' type='text' name='bezeichnung' value='"+text+"' /></div></form>");
    })

    $(".editQuestionButton").click(function()
    {
        var selectorText = "#text"+this.value;
        var selectorCategory = "#categoryQuestion"+this.value;
        var selectorAnswer1 = "#answer1question"+this.value;
        var selectorAnswer2 = "#answer2question"+this.value;
        var selectorAnswer3 = "#answer3question"+this.value;
        var selectorAnswer4 = "#answer4question"+this.value;



        $("#addQuestion").hide();
        $("#inputQuestion").val($(selectorText).text());
        $("#frageID").val(this.value);
        $("#inputCorrectAnswer").val($(selectorAnswer1).text());
        $("#inputWrongAnswer1").val($(selectorAnswer2).text());
        $("#inputWrongAnswer2").val($(selectorAnswer3).text());
        $("#inputWrongAnswer3").val($(selectorAnswer4).text());


        $('#inputCorrectAnswerID').val($(selectorAnswer1).attr("data-id"));
        $('#inputWrongAnswer1ID').val($(selectorAnswer2).attr("data-id"));
        $('#inputWrongAnswer2ID').val($(selectorAnswer3).attr("data-id"));
        $('#inputWrongAnswer3ID').val($(selectorAnswer4).attr("data-id"));

        $("#cbCategory").val($(selectorCategory).attr("data-id"));
        $('html, body').animate({scrollTop : 0},800);
        $("#editQuestion").show();
    })

    $("#updateQuestionForm").submit(function(event)
    {
        event.preventDefault();
        var postData = $(this).serializeArray();

        $.ajax({
            type: "POST",
            url: 'questions/update',
            data: postData
        }).done(function()
            {
                location.reload();
            })
    })

    $(".cancelEditQuestion").click(function(event)
    {
        event.preventDefault();
        $("#editQuestion").hide();
        $("#addQuestion").show();
    })

    $(".deleteQuestionButton").click(function()
    {
        var selector = "#confirmDeleteQuestion"+this.value;
        $(selector).show();
    })

    $(".cancelDeleteQuestionButton").click(function()
    {
        var selector = "#confirmDeleteQuestion"+this.value;
        $(selector).hide();
    })


    $(".confirmDeleteQuestionButton").click(function()
    {
        var id = this.value;

        $.ajax({
            type: "POST",
            url: 'questions/delete',
            data: { delete: true, id: id}
        }).done(function()
            {
                location.reload()
            })
    })

    $(".saveCategoryButton").click(function(){
        var id = this.value;
        var selector = "#bezNeu"+this.value;
        var bezeichnung = $(selector).val();
        var url = window.parent.location;

        $.ajax({
            type: "POST",
            url: url,
            data: { save: true, id: id, bezeichnung: bezeichnung}
        }).done(function()
        {
            location.reload()
        })

    })

    $(".showAnswersButton").click(function()
    {
        var selector = this.value;
        var selectorTitle = "#answersQuestion"+this.value;

        $(this).children().toggleClass('glyphicon-zoom-in');
        $(this).children().toggleClass('glyphicon-zoom-out');
        $(selectorTitle).toggle();


    })
})
