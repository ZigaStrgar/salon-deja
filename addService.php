<?php

include_once "./core/session.php";

if ( isset($_SESSION["user_id"]) ) {
    $category = (int) $_POST["category_id"];
    Db::insert("pricelist", ["name" => "Nova storitev", "price" => 0.00, "category_id" => $category]);
    $new = Db::getLastId();
    echo "<li class='list-group-item h3' id='service$new'>
                                <div class='col-lg-9 col-xs-12'>
                                    <input type='text' data-attr-id='$new' name='name[$category][$new]' placeholder='Nova storitev' class='form-control'/>
</div>
<div class='col-lg-2 col-xs-12'>
    <div class='input-group'>
        <input type='text' data-attr-id='$new' name='price[$category][$new]' placeholder='0.00' class='form-control'/>
        <span class='input-group-addon'>€</span>
    </div>
</div>
<br />
<br />
<textarea placeholder='Dodatne informacije' class='form-control' name='notes[$category][$new]' data-attr-id='$new'></textarea>
<span class='pull-right cursor' onclick='deleteService($new);'><i class='fa fa-times text-danger'></i></span>
<div class='clearfix'></div>
</li>";
} else {
    echo "error|Why?!";
}