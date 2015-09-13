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

        <h1 class="page-header">Nalaganje slike</h1>

        <form method="POST" action="" id="ajaxF">
            <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                <div class="form-control" data-trigger="fileinput"><i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div>
                <span class="input-group-addon btn btn-default btn-file"><span class="fileinput-new">Izberi sliko</span><span class="fileinput-exists">Spremeni</span><input type="file" name="image"></span>
                <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Odstrani</a>
            </div>
            <br>
            <div id="result"></div>
            <br>
            <span onclick="addimage();" class="btn btn-success cursor">Naloži sliko</span>
        </form>
    </div>
    <script src="./vendor/datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
    <script src="./vendor/datepicker/locales/bootstrap-datepicker.sl.min.js" type="text/javascript"></script>
    <script src="./vendor/wysihtml/wysihtml5-toolbar.min.js"></script>
    <script src="./vendor/wysihtml/bootstrap3-wysihtml5.js"></script>
    <script src="./assets/js/jasny-bootstrap.min.js"></script>
    <script>
        function addimage(){
            var formData = new FormData($("form#ajaxF")[0]);
            $.ajax({
                url: "uploadImage.php",
                type: "POST",
                data: formData,
                async: false,
                success: function (msg) {
                    $("#result").html("Povezava do slike: "+ msg);
                },
                cache: false,
                contentType: false,
                processData: false
            });
        }

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
            "image": true,
            "video": false,
            "html": false
        });
    </script>
<?php include_once "./footer.php"; ?>