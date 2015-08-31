<?php include_once "./header.php"; ?>
<?php
if (empty($_SESSION["user_id"])) {
    $path = $_SERVER['REQUEST_URI'];
    $file = basename($path);
    $_SESSION["move_me_to"] = $file;
    header("Location: login.php");
    die();
}
?>
    <div class="block-flat">
        <h1 class="page-header">
            Urejanje delovnega časa
            <span id="add" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Dodaj vrsto</span>
        </h1>
        <?php
        $hours = Db::queryAll("SELECT * FROM hours");
        ?>
        <form action="editingHours.php" method="POST">
            <ul id="hoursList" class="list-group">
                <?php foreach ($hours as $hour) { ?>
                    <li class="list-group-item">
                        <div class="col-sm-6 col-xs-12">
                            <div class="form-group">
                                <div class="input-group">
                                <span class="input-group-addon">
                                    Dan
                                </span>
                                    <input type="text" name="name[]" class="form-control" placeholder="Dan"
                                           value="<?= $hour["name"] ?>">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-xs-12">
                            <div class="form-group">
                                <div class="input-group">
                                <span class="input-group-addon">
                                    Vsebina
                                </span>
                                    <input type="text" name="text[]" class="form-control" placeholder="Vsebina"
                                           value="<?= $hour["text"] ?>">
                                </div>
                            </div>
                        </div>
                        <a href="deleteHour.php?id=<?= $hour["id"]; ?>"><i
                                class="fa fa-times text-danger pull-right"></i></a>

                        <div class="clearfix"></div>
                    </li>
                <?php } ?>
            </ul>
            <input type="submit" value="Shrani delovni čas" class="btn btn-success <?php if (empty($hours)) {
                echo "hidden";
            } ?>"/>
        </form>
    </div>
    <script>
        $num = 0;

        $("#add").click(function () {
            $("ul#hoursList").append("<li id='list" + $num + "' class='list-group-item'><div class='col-sm-6 col-xs-12'><div class='form-group'><div class='input-group'><span class='input-group-addon'>Dan</span><input type='text' name='name[]' class='form-control' placeholder='Dan' /></div></div></div><div class='col-sm-6 col-xs-12'><div class='form-group'><div class='input-group'><span class='input-group-addon'>Vsebina</span><input type='text' name='text[]' class='form-control' placeholder='Vsebina' /></div></div></div><i class='fa fa-times text-danger pull-right cursor' onClick='removeLine("+$num+")'></i><div class='clearfix'></div></li>");
            $num++;
            $("input[type=submit]").removeClass("hidden");
        });

        function removeLine(id) {
            $("#list"+id).remove();
        }
    </script>
<?php include_once "./footer.php"; ?>