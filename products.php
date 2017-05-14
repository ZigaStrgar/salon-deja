<?php include_once "header.php"; ?>
<?php
$products = Db::queryAll("SELECT * FROM products ORDER BY id DESC");
?>
    <div class="block-flat">
        <h1 class="page-header">Izdelki</h1>

        <div class="row">
            <?php
            if ( empty($products) ) {
                ?>
                <h2 class="text-center action">Zaenkrat še nimamo dodanih izdelkov</h2>
                <?php
            }
            ?>
            <?php
            foreach ( $products as $product ):
                ?>
                <div class="col-md-6 col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="col-md-12">
                                <div class="col-md-4">
                                    <img class="img-responsive" src="<?= $product['image'] ?>"
                                         alt="<?= $product['name'] ?>"/>
                                </div>
                                <div class="col-md-8">
                                    <h2><?= $product['name'] ?></h2>
                                    <p><?= $product['description'] ?></p>
                                    <p class="price"><?= formatPrice($product['price']); ?></p>
                                </div>
                            </div>
                        </div>
                        <?php if ( isset($_SESSION['user_id']) ) { ?>
                            <div class="panel-footer">
                                <a href="editProduct.php?id=<?= $product['id'] ?>" class="btn btn-primary">Uredi
                                    izdelek</a>
                                <a href="deleteProduct.php?id=<?= $product['id'] ?>" class="btn btn-danger">Izbriši
                                    izdelek</a>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
<?php include_once "footer.php"; ?>