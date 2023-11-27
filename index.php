<?php
    include "views.php";
    include "login.php";
    include "film.php";
    include "person.php";

    if (isset($_REQUEST["do"])) {
        $do = $_REQUEST["do"];
    }
    else {
        $do = "formLogin";
    }

    switch ($do) {
    case "formLogin":
        Login::mostrarFormLogin();
        break;
    case "tryLogin":
        $result = Login::procesarFormLogin();
        if ($result) {
            View::display("main");
        }
        break;
    case "showInsertFilm":
        Film::showInsert();
        break;
    case "showInsertPerson":
        Person::showInsert();
        break;
    case "insertarPeli":
        Film::insertarPeli();
        break;
    case "insertPerson":
        Person::insertPerson();
        break;
    case "showSearchFilm":
        View::display("searchFilm");
        break;
    case "searchFilm":
        Film::searchFilm();
        break;
    case "showSearchPerson":
        View::display("searchPerson");
        break;
    case "searchPerson":
        Person::searchPerson();
        break;
    case "showDeleteFilm":
        View::display("deleteFilmForm");
        break;
    case "showDeletePerson":
        View::display("deletePersonForm");
        break;
    case "deletePerson":
        Person::deletePerson();
        break;
    case "deleteFilm":
        Film::deleteFilm();
        break;
    case "showModifyFilm":
        View::display("modifyFilmForm");
        break;
    case "modifyFilm":
        Film::modifyFilm();
        break;
    case "showModifyPerson":
        View::display("modifyPersonForm");
        break;
    case "modifyPerson":
        Person::modifyPerson();
        break;
    case "main":
        View::display("main");
        break;

    }

    ?>

