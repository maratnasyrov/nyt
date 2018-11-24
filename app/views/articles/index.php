<h3>Wellcome to the search page</h3>

<?php foreach ($articles as $article => $value): ?>
    <br>
    <?php echo $value['main'] ?>
    <br>
    <?php echo $value['snippet'] ?>
<?php endforeach; ?>
