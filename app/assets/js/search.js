$(document).ready(function(){
    $("#article-search-form").on('submit', function(e){
        e.preventDefault();

        $.ajax({
            type: 'POST',
            url: '/search',
            data: $('#article-search-form').serialize(),
            beforeSend: function () {
                $("#more")[0].hidden = true;
                $("#search-result")[0].hidden = false;
                addLoaddingSpinner();
                $('#next-page').attr('data', $('#article-search-form').serialize());
            }
        }).done(function(result) {
            $("#search-result").html(result);
            $("#more")[0].hidden = false;
        });
    });

    $("#next-page").on('click', function(e){
        e.preventDefault();

        changeData();

        $.ajax({
            type: 'POST',
            url: '/search',
            data: $nextPage.attr("data"),
            beforeSend: function () {
                changeData();
                $nextPage.attr("href", parseInt($nextPage.attr("href")) + 1);
                addLoaddingSpinner();
                $("#more")[0].hidden = true;
            }
        }).done(function(result) {
            $("#load").remove();
            $("#search-result").append(result);
            $("#more")[0].hidden = false;
        });
    });

    function changeData() {
        $nextPage = $('#next-page');
        $pageIndex = parseInt($nextPage.attr("href")) + 1;
        $nextPage.attr("data", $nextPage.attr("data").replace("page=" + $nextPage.attr("href"), "page=" + $pageIndex));
    }

    function addLoaddingSpinner() {
        $("#search-result").append("<div id='load' class='loadding'><img src='/app/assets/images/load.gif'></div>");
    }
});
