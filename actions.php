<?php include_once "header.php"; ?>
<?php
$actions = Db::queryAll("SELECT * FROM actions WHERE valid >= ? ORDER BY valid DESC", date("Y-m-d"));
?>
    <div class="block-flat">
        <h1 class="page-header action">AKCIJE</h1>
        <?php
        if ( !empty($actions) ) {
            foreach ( $actions as $action ) {
                ?>
                <div class="col-xs-12">
                    <p>
                        <?= $action["text"]; ?>
                    </p>
                    <small class="text-muted">Akcija velja
                        do: <?= date("d. m. Y", strtotime($action["valid"])) ?></small>
                    <?php if ( !empty($_SESSION["user_id"]) ) { ?>
                        <br>
                        <a href="editAction.php?id=<?= $action["id"]; ?>">Uredi akcijo</a>
                        <a href="deleteAction.php?id=<?= $action["id"]; ?>">Izbriši akcijo</a>
                    <?php } ?>
                    <hr />
                </div>
                <?php
            }
        } else {
            ?>
            <h2 class="text-center">Žal ni aktivnih akcij :(</h2>
            <?php
        }
        ?>
        <div class="clearfix"></div>
    </div>
<?php include_once "footer.php"; ?>