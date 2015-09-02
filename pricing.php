<?php include_once "header.php"; ?>
<?php
$categories = Db::queryAll("SELECT * FROM categories ORDER BY id ASC");
$lastChange = Db::querySingle("SELECT last_change FROM pricelist LIMIT 1");
?>
    <div class="block-flat">
        <h1 class="page-header">Cenik</h1>
        <?php foreach ( $categories as $category ) { ?>
            <h3 class="page-header text-center action"><?= $category["name"]; ?></h3>
            <table class="table col-lg-8 col-xs-12 table-condensed table-bordered table-striped">
                <?php
                $services = Db::queryAll("SELECT * FROM pricelist WHERE category_id = ? ORDER BY id ASC", $category["id"]);
                foreach ( $services as $service ) {
                    ?>
                    <tr>
                        <td class="col-xs-10">
                            <?= $service["name"] ?>
                        </td>
                        <td class="col-xs-2 text-center">
                            <?= formatPrice($service["price"]); ?>
                        </td>
                    </tr>
                    <?php if ( ! empty($service["note"]) ) { ?>
                        <tr>
                            <td colspan="2" class="h6 text-muted">
                                <?= $service["note"]; ?>
                            </td>
                        </tr>
                    <?php } ?>
                <?php } ?>
            </table>
            <div class="clearfix"></div>
        <?php } ?>
        <span class="help-block">Cenik velja od: <?= date("d. m. Y", strtotime($lastChange)) ?></span>
    </div>
<?php include_once "footer.php"; ?>