<?php if(! empty($errors)): ?>

<ul>
    <?php foreach ($errors as $error): ?>
        <li><?= $error ?></li>
        <?php endforeach; ?>

</ul>

<?php endif; ?>
 
<?php 
if ($published_at) {
    $published_at = date('Y-m-d\TH:i', strtotime($published_at));
}
?>






<!-- Form for creating a new article -->
<form method="post">
    <div>
        <!-- Title input field -->
        <label for="title">Title:</label>
        <input type="name" name="title" id="title" placeholder="Article title" value = <?= htmlspecialchars($title); ?> >
    </div>

    <div>
        <!-- Content input field -->
        <label for="content">Content:</label>
        <textarea name="content" rows="4" cols="40" id="content" placeholder="Article content"><?= htmlspecialchars($content);?></textarea>
    </div>

    <div>
        <!-- Date and time input field for publication date -->
        <label for="published_at">Publication and time:</label>
        <input type="datetime-local" name="published_at" id="published_at" value= <?=  $published_at;?> >
    </div>

    <!-- Submit button for the form -->
    <button>Save</button>
</form>