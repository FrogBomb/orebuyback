<?php
    require_once __DIR__.'/functions/registry.php';
    require_once __DIR__.'/corpselect.php';
    //Start the session
    session_start();    
    if(isset($_SESSION["corporation"])) {
        echo $_SESSION["corporation"];
    } else {
        echo 'Corp Not Set Yet';
    }
    PrintHeader();
    PrintHeaderCloseTag();
    PrintBodyTag();
    PrintNavBar();
    PrintTitle();
    PrintCorpSelect();
    PrintIndexPage();
    PrintFooter();
    PrintPopups();
    PrintCloseIndexPage();
?>

