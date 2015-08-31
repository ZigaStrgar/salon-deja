<?php include_once "header.php"; ?>
    <div id="contact-info" class="block-flat">
        <div class="col-lg-3 col-xs-12">
            <h1 class="page-header">Kontakt</h1>
            <span>
                <span class="fa-stack fa-lg">
                    <i class="fa fa-circle-thin fa-stack-2x"></i>
                    <i class="fa fa-map-marker fa-stack-1x"></i>
                </span>
                Tabor - Beograjska ulica 6a
            </span>
            <br/>
            <br/>
            <span>
                <span class="fa-stack fa-lg">
                    <i class="fa fa-circle-thin fa-stack-2x"></i>
                    <i class="fa fa-building-o fa-stack-1x"></i>
                </span>
                2000 Maribor
            </span>
            <br/>
            <br/>
            <span>
                <span class="fa-stack fa-lg">
                    <i class="fa fa-circle-thin fa-stack-2x"></i>
                    <i class="fa fa-phone fa-stack-1x"></i>
                </span>
                02/331-42-19
            </span>
            <br/>
            <br/>
            <span>
                <span class="fa-stack fa-lg">
                    <i class="fa fa-circle-thin fa-stack-2x"></i>
                    <i class="fa fa-at fa-stack-1x"></i>
                </span>
                <a href="mailto:info@salon-deja.si">info@salon-deja.si</a>
            </span>
            <br/>
            <br/>
            <span>
                <span class="fa-stack fa-lg">
                    <i class="fa fa-circle-thin fa-stack-2x"></i>
                    <i class="fa fa-car fa-stack-1x"></i>
                </span>
                Brezplačno parkiranje
            </span>
        </div>
        <div class="col-lg-9 col-xs-12">
            <h1 class="page-header">Kako do nas</h1>

            <div id="googlemap" style="width: 100%; height: 400px;"></div>
        </div>
        <?php
        $hours = Db::queryAll("SELECT * FROM hours ORDER BY id ASC");
        ?>
        <h1 class="page-header" id="work_hours">Delovni čas</h1>
        <table class="table-condensed table-bordered table-striped text-center col-xs-12 col-lg-4 col-lg-offset-4">
            <?php
            foreach ($hours as $hour) {
                ?>
                <tr>
                    <td>
                        <?= $hour["name"] ?>
                    </td>
                    <td>
                        <?= $hour["text"] ?>
                    </td>
                </tr>
                <?php
            }
            ?>
        </table>
        <div class="clearfix"></div>
    </div>
<?php include_once "./footer.php"; ?>