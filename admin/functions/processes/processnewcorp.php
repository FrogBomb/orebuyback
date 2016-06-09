<?php

    require_once __DIR__.'/../../functions/registry.php';
    
    $corporation = filter_var(INPUT_POST, $_POST["Corporation"], FILTER_SANITIZE_STRING);
    $tax = filter_var(INPUT_POST, $_POST["Tax"], FILTER_SANITIZE_STRING);
    $tax = $tax * 1.00;
    if($tax > 100.00)
        $tax = 100.0;
    if($tax < 0.00)
        $tax = 0.00;
    
    //Add the new corporation to the database
    if(is_float($tax)) {
        $db = DBOpen();
        $db->insert('Corps', array('CorpName' => $corporation, 'TaxRate' => $tax));
        DBClose($db);
        header('Location: /../admin/dashboard.php?msg=newcorpsuccess');
    } else {
        header('Location: /../admin/dashboard.php?msg=newcorpfailure');
    }

?>