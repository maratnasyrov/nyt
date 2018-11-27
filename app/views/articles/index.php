<div class="search-part">
    <h2>The New York Times Search</h2>
    <form id="article-search-form" method="POST" action="" class="search-form">
        <input type="text" name="q" placeholder="SEARCH" class="q">
        <select class="sort" name="sort">
            <option value="best">Sort by Relevance</option>
            <option value="newest">Sort by Newest</option>
            <option value="oldest">Sort by Oldest</option>
        </select>
        <input type="text" name="begin_date" placeholder="START DATE" class="date">
        <input type="text" name="end_date" placeholder="END DATE" class="date">

        <input id="page-index" type="text" name="page" value="0" hidden>

        <button type="submit" name="SEARCH">SEARCH</button>
    </form>
</div>

<div id="search-result" class="search-result" hidden="true">
</div>

<div id="more" class="show-more" hidden="true">
    <a id="next-page" href="0" data="">SHOW MORE</a>
</div>
