$(document).ready(function () {
    $(".login").focus(function(){
        var data = $(".login").val();
        $.ajax({
                url: 'query_articles.php',
                type: 'POST',
                data: {author: data},
                success: function (res) {
                    $(".login").html(res);
                },error: function () {
                    $(".login").next().text(' Ошибка');
                }                            
        });            
    });
});