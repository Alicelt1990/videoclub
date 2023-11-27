<?php
class View
{
    public static function display($view)
    {
        include "views/header.html";
        include "views/$view.php";
        include "views/footer.html";
    }
}