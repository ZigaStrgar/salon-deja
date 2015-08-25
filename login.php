<?php include_once "header.php"; ?>
    <div class="col-lg-8 col-lg-offset-2 col-xs-12" style="margin-bottom: 20px;">
        <div role="tabpanel" id="tabs">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs nav-justified" role="tablist">
                <li role="presentation" class="active"><a href="#login" role="tab" data-toggle="tab">Prijava</a></li>
                <li role="presentation"><a href="#register" role="tab" data-toggle="tab">Registracija</a></li>
                <li role="presentation"><a href="#lost" role="tab" data-toggle="tab">Izgubljeno geslo</a></li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active block-flat" id="login">
                    <h1 class="page-header">Prijava</h1>
                    <?php if (!empty($_SESSION["move_me_to"])) { ?>
                        <div class="col-lg-12 alert alert-danger alert-fixed-bottom">
                            Da bi videli to stran, se najprej prijavite!
                        </div>
                    <?php } ?>
                    <form action="loginCheck.php" method="POST" class="ajaxForm" role="form">
                        <div class="row">
                            <div class="col-xs-12 col-md-6">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-at"></i></span>
                                    <input tabindex="1" type="email" id="email-login" class="form-control" name="email" placeholder="E-naslov" required>
                                </div>
                                <span data-placeholder-for="email-login"></span>
                            </div>
                            <div class="col-xs-12 col-md-6">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                    <input tabindex="2" type="password" id="password-login" class="form-control" name="password" placeholder="Geslo" required>
                                </div>
                                <span data-placeholder-for="password-login"></span>
                            </div>
                        </div>
                        <?php
                        if (!empty($_SESSION["move_me_to"])) {
                            ?>
                            <input type="hidden" name="redirect" value="<?php echo $_SESSION["move_me_to"]; ?>" />
                            <?php
                            unset($_SESSION["move_me_to"]);
                        }
                        ?>
                        <br />
                        <br />
                        <input type="submit" tabindex="3" value="Prijavi me" class="btn btn-flat btn-brand" />
                        <span class="btn" tabindex="4" id="lost-it">Pozabil sem geslo?!</span>
                    </form>
                </div>
                <div role="tabpanel" class="tab-pane block-flat" id="register">
                    <h1 class="page-header">Registracija</h1>
                    <form action="register.php" method="POST" class="ajaxForm" role="form">
                        <div class="row">
                            <div class="col-xs-12 col-md-4">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-at"></i></span>
                                    <input type="email" class="form-control" name="email" placeholder="E-poštni naslov">
                                </div>
                            </div>
                            <div class="col-xs-12 col-md-4">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                    <input type="password" class="form-control" id="check-me" name="password" placeholder="Geslo">
                                </div>
                            </div>
                            <div class="col-xs-12 col-md-4">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                    <input type="password" class="form-control" id="check-me2" name="password2" placeholder="Ponovite geslo">
                                </div>
                            </div>
                        </div>
                        <br />
                        <span class="text-danger" id="message"></span>
                        <br />
                        <input type="submit" value="Registriraj me" class="btn btn-flat btn-brand" />
                    </form>
                </div>
                <div role="tabpanel" class="tab-pane block-flat" id="lost">
                    <h1 class="page-header">Obnavljanje gesla</h1>
                    <div class="alert alert-warning">
                        Ob kliku na gumb "Ponastavi geslo" se vam bo ponastavilo geslo. Novo geslo boste dobili na e-naslov in ga boste uporabili ob prijavi!
                    </div>
                    <form action="forgotten.php" method="POST" class="ajaxForm">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-at"></i></span>
                            <input type="email" name="email" class="form-control" placeholder="Vnesite vaš e-naslov" />
                        </div>
                        <br />
                        <input type="submit" name="submit" value="Ponastavi geslo" class="btn btn-flat btn-success" />
                    </form>
                </div>
            </div>
        </div>
        <div class="clear"></div>
    </div>
    <script>
        $(document).ready(function () {
            setInterval(function () {
                if ($("#check-me").val().length > 0 || $("#check-me2").val().length > 0) {
                    if ($("#check-me").val().length > 6) {
                        if ($("#check-me").val() !== $("#check-me2").val()) {
                            $("#message").text("Gesli se ne ujemata!");
                        } else {
                            $("#message").text("");
                        }
                    } else {
                        $("#message").text("Geslo mora vsebovati vsaj 7 znakov!");
                    }
                }
            }, 150);

            if(window.location.hash === "#lost"){
                $('#tabs a[href="#lost"]').tab("show");
            }

            $("#lost-it").click(function(){
                $('#tabs a[href="#lost"]').tab("show");
            });

            $("#reg-form").click(function(){
                $('#tabs a[href="#register"]').tab("show");
            });

            if(window.location.hash === "#register"){
                $('#tabs a[href="#register"]').tab("show");
            }
        });
    </script>
<?php include_once "footer.php"; ?>