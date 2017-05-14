<?php include_once "header.php"; ?>
<?php
if(!isset($_GET['id'])){
    $news = Db::queryAll("SELECT *, LEFT(text, 200) as izvlecek FROM news ORDER BY id DESC");
} else {
    $id = (int) clearString($_GET['id']);
    $news = Db::queryOne('SELECT * FROM news WHERE id = ?', $id);
}
?>
    <div class="block-flat">
        <?php if ( is_numeric($id) && $id != 0 ) { ?>
            <h1 class="page-header action"><?= $news['title']; ?>
                <small><?php echo date('d. m. Y H:i:s', strtotime($news['created_at'])) ?></small>
            </h1>
            <p>
                <?= $news['text'] ?>
            </p>
            <?php if ( ! empty($_SESSION["user_id"]) ) { ?>
                <a href="editNews.php?id=<?= $news["id"]; ?>">Uredi novico</a>
                <a href="deleteNews.php?id=<?= $news["id"]; ?>">Izbriši novico</a>
            <?php } ?>
        <?php } else { ?>
            <h1 class="page-header action">Novice</h1>
            <?php foreach ( $news as $article ) { ?>
                <div class="media">
                    <div class="media-body">
                        <h3 class="action media-heading"><?= $article['title'] ?></h3>
                        <?= strip_tags($article['izvlecek']) . "..." ?>
                        <br/>
                        <a href="news.php?id=<?= $article['id'] ?>">Preberi več...</a>
                    </div>
                </div>
                <?php if ( ! empty($_SESSION["user_id"]) ) { ?>
                    <a href="editNews.php?id=<?= $article["id"]; ?>">Uredi novico</a>
                    <a href="deleteNews.php?id=<?= $article["id"]; ?>">Izbriši novico</a>
                <?php } ?>
            <?php } ?>
        <?php } ?>
    </div>
<?php include_once "footer.php"; ?>