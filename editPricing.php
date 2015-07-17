<?php include_once "./header.php"; ?>
<?php
if(empty($_SESSION["user_id"])){
    $path = $_SERVER['REQUEST_URI'];
    $file = basename($path);
    $_SESSION["move_me_to"] = $file;
    header("Location: login.php");
    die();
}
?>
    <div class="block-flat col-lg-12">
        <h1 class="page-header">Urejanje cenika</h1>
        <?php $categories = Db::queryAll("SELECT * FROM categories ORDER BY id ASC"); ?>
        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
            <?php foreach ( $categories as $category ) { ?>
                <div class="panel panel-default" id="panel<?= $category["id"]; ?>">
                    <div class="panel-heading" role="tab">
                        <h4 class="panel-title">
                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?= $category["id"]; ?>">
                                <?= $category["name"]; ?>
                            </a>
                            <span class="pull-right text-danger cursor" onclick="deleteCategory(<?= $category["id"]; ?>);" data-toggle="tooltip" data-placement="top" title="Odstrani kategorijo">
                                <i class="fa fa-times"></i>
                            </span>
                            <span class="pull-right text-primary cursor" style="margin-right: 10px;" onClick="renameCategory(<?= $category["id"]; ?>, '<?= $category["name"]; ?>');" data-toggle="tooltip" data-placement="top" title="Preimenuj kategorijo">
                                <i class="fa fa-pencil"></i>
                            </span>
                            <span class="pull-right text-success cursor addService" style="margin-right: 10px;" data-toggle="tooltip" data-placement="top" title="Dodaj storitev" data-category-id="<?= $category["id"]; ?>">
                                <i class="fa fa-plus"></i>
                            </span>
                        </h4>
                    </div>
                    <div id="collapse<?= $category["id"] ?>" class="panel-collapse collapse" role="tabpanel">
                        <div class="panel-body">
                            <input type="hidden" name="category[<?= $category["id"]; ?>]" value="<?= $category["name"]; ?>" data-attr-id="<?= $category["id"]; ?>" data-category-id="<?= $category["id"]; ?>"/>
                            <?php $services = Db::queryAll("SELECT * FROM pricelist WHERE category_id = ? ORDER BY id ASC", $category["id"]); ?>
                            <ul class="list-group" id="list<?= $category["id"]; ?>">
                                <?php foreach ( $services as $service ) { ?>
                                    <li class="list-group-item h3" id="service<?= $service["id"]; ?>">
                                        <div class="col-lg-9 col-xs-12">
                                            <input type="text" data-attr-id="<?= $service["id"]; ?>" name="name[<?= $category["id"] ?>][<?= $service["id"] ?>]" value="<?= $service["name"] ?>" class="form-control"/>
                                        </div>
                                        <div class="col-lg-2 col-xs-12">
                                            <div class="input-group">
                                                <input type="text" data-attr-id="<?= $service["id"]; ?>" name="price[<?= $category["id"] ?>][<?= $service["id"] ?>]" value="<?= $service["price"] ?>" class="form-control"/>
                                                <span class="input-group-addon">€</span>
                                            </div>
                                        </div>
                                        <br/>
                                        <br/>
                                        <textarea placeholder="Dodatne informacije" class="form-control" data-attr-id="<?= $service["id"]; ?>" name="notes[<?= $category["id"] ?>][<?= $service["id"] ?>]"><?= $service["note"] ?></textarea>
                                        <span class='pull-right cursor' onclick="deleteService(<?= $service["id"]; ?>);"><i class='fa fa-times text-danger'></i></span>

                                        <div class="clearfix"></div>
                                    </li>
                                <?php } ?>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
        <div class="panel panel-default cursor" id="addCategory">
            <div class="panel-heading" role="tab">
                <h4 class="panel-title">
                    <span class="text-success">
                        Dodaj kategorijo
                    </span>
                    <span class="pull-right text-success cursor" style="margin-right: 10px;" data-toggle="tooltip" data-placement="top" title="Dodaj kategorijo" data-category-id="<?= $category["id"]; ?>">
                        <i class="fa fa-plus"></i>
                    </span>
                </h4>
            </div>
        </div>
        <button class="btn btn-success" id="save">Shrani spremembe</button>
    </div>
    <script>
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })
        $(document).on("click", "#addCategory", addCategory);
        $(document).on("click", ".addService", addService);
        $(document).on("click", "#save", save);

        function addCategory() {
            $.ajax({
                url: "addCategory.php",
                type: "POST",
                success: function (comeback) {
                    $("#accordion").append(comeback);
                }
            });
        }

        function addService() {
            var id = $(this).attr("data-category-id");
            $.ajax({
                url: "addService.php",
                type: "POST",
                data: {"category_id": id},
                success: function (comeback) {
                    $('ul#list' + id).append(comeback);
                }
            });
        }

        function save() {
            var categories = [];
            var names = [];
            var prices = [];
            var notes = [];
            $("input[name^=category]").each(function () {
                var st = $(this).attr("data-attr-id");
                categories[st] = $(this).val();
            });
            $("input[name^=name]").each(function () {
                var names_st = $(this).attr("data-attr-id");
                names[names_st] = $(this).val();
            });
            $("input[name^=price]").each(function () {
                var prices_st = $(this).attr("data-attr-id");
                prices[prices_st] = $(this).val();
            });
            $("textarea[name^=notes]").each(function () {
                var prices_st = $(this).attr("data-attr-id");
                notes[prices_st] = $(this).val();
            });
            $.ajax({
                url: "editingPricing.php",
                type: "POST",
                data: {categories: categories, names: names, prices: prices, notes: notes},
                success: function (comeback) {
                    comeback = $.trim(comeback);
                    comeback = comeback.split("|");
                    if (comeback[0] == "success") {
                        alertify.success(comeback[1]);
                    } else if (comeback[0] == "error") {
                        alertify.error(comeback[1]);
                    }
                }
            });
        }

        function deleteCategory(id) {
            $.ajax({
                url: "deleteCategory.php",
                type: "POST",
                data: {id: id},
                success: function (comeback) {
                    comeback = $.trim(comeback);
                    comeback = comeback.split("|");
                    if (comeback[0] == "success") {
                        alertify.success(comeback[1]);
                        $(document).find("#panel" + id).html("&nbsp;").empty().hide();
                    } else if (comeback[0] == "error") {
                        alertify.error(comeback[1]);
                    }
                }
            })
        }

        function deleteService(id) {
            $.ajax({
                url: "deleteService.php",
                type: "POST",
                data: {id: id},
                success: function (comeback) {
                    comeback = $.trim(comeback);
                    comeback = comeback.split("|");
                    if (comeback[0] == "success") {
                        alertify.success(comeback[1]);
                        $(document).find("#service" + id).html("&nbsp;").empty().hide();
                    } else if (comeback[0] == "error") {
                        alertify.error(comeback[1]);
                    }
                }
            })
        }

        function renameCategory(id, name){
            alertify.prompt('Preimenuj kategorijo: '+name, name,
                function(evt, value){
                    $(document).find("input[data-category-id='"+id+"']").val(value);
                    $(document).find("#panel"+id).find("a").text(value);
                }
            );
        }
    </script>
<?php include_once "./footer.php"; ?>