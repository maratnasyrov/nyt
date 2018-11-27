<?php if (!empty($query)): ?>
    <div id="search-query" class="search-query-result">Results for <?php echo $query ?></div>
<?php endif; ?>


<div id="page-<?php echo $index ?>">
    <?php foreach ($articles as $article => $value): ?>
        <div class="article-part">
            <div class="main-block">
                <?php if (!empty($value['sectionName'])): ?>
                    <div class="rubric-label-dot"></div>
                    <div class="section-name">
                        <?php echo $value['sectionName']; ?>
                    </div>
                <?php endif; ?>
                <div class="title">
                    <a href="<?php echo $value['webUrl'] ?>"><?php echo $value['main'] ?></a>
                </div>

                <div class="snippet">
                    <?php echo $value['snippet'] ?>
                </div>

                <div class="pub-date">
                    <?php echo $value['pubDate'] ?>
                </div>
            </div>
            <?php if (!empty($value['imageUrl'])): ?>
                <img src="<?php echo $value['imageUrl'] ?>" class="preview" align="middle">
            <?php endif; ?>
        </div>
    <?php endforeach; ?>
</div>
