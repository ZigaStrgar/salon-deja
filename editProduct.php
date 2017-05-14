<?php include_once "./header.php"; ?>
<?php
if ( empty($_SESSION["user_id"]) ) {
    $path                   = $_SERVER['REQUEST_URI'];
    $file                   = basename($path);
    $_SESSION["move_me_to"] = $file;
    header("Location: login.php");
    die();
}
$id      = (int)clearString($_GET['id']);
$product = Db::queryOne('SELECT * FROM products WHERE id = ?', $id);
?>
    <div class="block-flat">
        <h1 class="page-header">Dodaj produkt</h1>
        <form action="editingProduct.php?id=<?= $product['id'] ?>" method="POST"
              enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Ime produkta:</label>
                <input type="text" class="form-control" placeholder="Ime produkta" id="name" name="name"
                       value="<?= $product['name'] ?>">
            </div>
            <div class="form-group">
                <label for="price">Cena produkta:</label>
                <input type="number" class="form-control" placeholder="Cena produkta" id="price" name="price"
                       value="<?= $product['price'] ?>">
            </div>
            <div class="form-group">
                <label for="textarea">Opis produkta:</label>
                <textarea name="description" class="form-control" placeholder="Opis"
                          id="textarea"><?= $product['description'] ?></textarea>
            </div>
            <label for="image">Slika izdelka:</label>
            <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                <div class="form-control" data-trigger="fileinput"><i
                            class="glyphicon glyphicon-file fileinput-exists"></i> <span
                            class="fileinput-filename"></span></div>
                <span class="input-group-addon btn btn-default btn-file"><span class="fileinput-new">Izberi sliko</span><span
                            class="fileinput-exists">Spremeni</span><input type="file" id="image" name="image"></span>
                <a href="#" class="input-group-addon btn btn-default fileinput-exists"
                   data-dismiss="fileinput">Odstrani</a>
            </div>
            <p class="help-block">Če pustite prazno se ohrani prvotna slika</p>
            <input type="hidden" name="clear" value="1">
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Uredi produkt"/>
            </div>
        </form>

        <h1 class="page-header">Nalaganje slike
            <small>Za več slik v opisu</small>
        </h1>

        <form method="POST" action="" id="ajaxF">
            <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                <div class="form-control" data-trigger="fileinput"><i
                            class="glyphicon glyphicon-file fileinput-exists"></i> <span
                            class="fileinput-filename"></span></div>
                <span class="input-group-addon btn btn-default btn-file"><span class="fileinput-new">Izberi sliko</span><span
                            class="fileinput-exists">Spremeni</span><input type="file" name="image"></span>
                <a href="#" class="input-group-addon btn btn-default fileinput-exists"
                   data-dismiss="fileinput">Odstrani</a>
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
        function addimage() {
            var formData = new FormData($("form#ajaxF")[0]);
            $.ajax({
                url: "uploadImage.php",
                type: "POST",
                data: formData,
                async: false,
                success: function (msg) {
                    $("#result").html("Povezava do slike: " + msg);
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