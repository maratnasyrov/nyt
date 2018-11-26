$(document).ready(function(){
    $("#article-search-form").on('submit', function(e){
        e.preventDefault();

        $.ajax({
            type: 'POST',
            url: '/search',
            data: $('#article-search-form').serialize(),
        }).done(function(result) {
            $("#search-result").html(result);
        });
    });
});
