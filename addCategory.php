<?php

include_once "./core/session.php";

Db::insert("categories", ["name" => "Nova kategorija"]);

$new = Db::getLastId();

//echo "<li class='h2 list-group-item'>
//    <div class='col-xs-11'>
//        <input type='text' data-attr-id='$new' value='Nova kategorija' name='category[]' class='form-control' />
//    </div>
//    <span class='pull-right'><i class='fa fa-times text-danger'></i></span>
//    <div class='clearfix'></div>
//    <ul class='list-group' data-category-id='$new'>
//        <li class='h5 list-group-item text-success cursor addService'>
//            Dodaj storitev
//            <span class='pull-right'>
//                <i class='fa fa-plus'></i>
//            </span>
//            <div class='clearfix'></div>
//        </li>
//    </ul>
//</li>";

echo "<div class='panel panel-default' id='panel$new'>
                    <div class='panel-heading' role='tab'>
                        <h4 class='panel-title'>
                            <a role='button' data-toggle='collapse' data-parent='#accordion' href='#collapse$new'>
Nova kategorija
</a>
<span class='pull-right text-danger cursor' onclick='deleteCategory($new);' data-toggle='tooltip' data-placement='top' title='Odstrani kategorijo'>
                                <i class='fa fa-times'></i>
                            </span>
<span class='pull-right text-success cursor addService' style='margin-right: 10px;' data-toggle='tooltip' data-placement='top' title='Dodaj storitev' data-category-id='$new'>
                                <i class='fa fa-plus'></i>
                            </span>
</h4>
</div>
<div id='collapse$new' class='panel-collapse collapse' role='tabpanel'>
    <div class='panel-body'>
    <ul class='list-group' id='list$new'>

    </ul>
    </div>
    </div>
    ";