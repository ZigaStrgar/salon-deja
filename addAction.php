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
    <div class="block-flat">
        <h1 class="page-header">Dodaj akcijo</h1>

        <form action="addingAction.php" method="POST" class="ajaxForm">
            <div class="form-group">
                <label for="textarea">Vsebina:</label>
                <textarea name="text" class="form-control" placeholder="Vsebina" id="textarea"></textarea>
            </div>
            <div class="form-group">
                <label for="valid">Velja do:</label>

                <div class="input-group date">
                    <input type="text" class="form-control" name="valid" id="valid"><span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                </div>
            </div>
            <input type="hidden" name="clear" value="1">
            <div class="form-group">
                <input type="submit" class="btn btn-success" value="Dodaj akcijo"/>
            </div>
        </form>
    </div>
    <script src="./vendor/datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
    <script src="./vendor/datepicker/locales/bootstrap-datepicker.sl.min.js" type="text/javascript"></script>
    <script src="./vendor/wysihtml/wysihtml5-toolbar.min.js"></script>
    <script src="./vendor/wysihtml/bootstrap3-wysihtml5.js"></script>
    <script>
        $('.input-group.date').datepicker({
            language: "sl",
            startDate: "<?= date("m/d/Y"); ?>",
            autoclose: true,
            todayHighlight: true
        });
        $('textarea').wysihtml5({
            "font-styles": true,
            "color": false,
            "emphasis": true,
            "textAlign": false,
            "lists": true,
            "blockquote": false,
            "link": true,
            "table": false,
            "image": false,
            "video": false,
            "html": false
        });
    </script>
<?php include_once "./footer.php"; ?>