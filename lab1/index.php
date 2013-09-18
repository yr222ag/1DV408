<?php 

    //include models/views/controllers
    require_once("/src/view/HTMLPage.php");
    require_once("/src/model/Form.php");
    require_once("/src/model/DateTime.php");

    session_start();
    setlocale(LC_ALL, "sv-SE");

    //initiate models
    $form = new \model\Form();
    $datetime = new \model\DateTime();
    
    //assemble output
    $html = $form->getForm();
    $date = $datetime->getDateTime();

    $pageView = new \view\HTMLPage();
    echo $pageView->getPage("Webbutveckling med PHP, Laboration 1", "<h1>Laborationskod yr222ag</h1>", $html, $date);

