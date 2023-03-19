<?php if (!empty($article->errors)): ?>

<?php foreach ($article->errors as $error): ?>
    <p>
        <?= $error ?>
    </p>
<?php endforeach ?>
<?php endif ?>

<form method="post">
<div>
    <label for="title">Tytuł:</label>
    <input type="text" name="title" id="title" placeholder="wprowadź tytuł" value="<?= htmlspecialchars($article->title) ?>">
</div>
<div>
    <label for="content">Treść:</label>
    <textarea name="content" id="content" cols="30" rows="10"  placeholder="wprowadź treść"><?= htmlspecialchars($article->content) ?></textarea>
</div>



<button type="submit">Stwórz</button>
</form>