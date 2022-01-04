<!doctype html>

<title>My Blog</title>
<link rel="stylesheet"
      href="/app.css">
<body>
    <?php /** @var TYPE_NAME $posts */
    foreach ($posts as $post) : ?>
    <article>
        <h1>
            <a href="/posts/<?= $post->slug; ?>">
                <?=$post->title;?>
            </a>
        </h1>
        <div><?=$post->excerpt;?>...</div>
    </article>
    <?php endforeach; ?>
</body>