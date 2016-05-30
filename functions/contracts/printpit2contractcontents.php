<?php

function PrintPiT2ContractContents($contractNum) {
    $db = DBOpen();
    $columns = $db->fetchColumnMany('SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME= :table', array('table' => 'PiT2ContractContents'));
    $contents = $db->fetchRow('SELECT * FROM PiT2ContractContents WHERE ContractNum= :number', array('number' => $contractNum));
    
    $columnsNum = sizeof($columns);
    
    printf("<table class=\"table-striped\">");
    for($i = 0; $i < $columnsNum - 1; $i++) {
        $header = str_replace('_', ' ', $columns[$i]);
        if($contents[$columns[$i]] > 0) {
            printf("<tr>");
            printf("<td>");
            printf($header);
            printf("</td>");
            printf("<td>");
            printf($contents[$columns[$i]]);
            printf("</td>");
            printf("</tr>");
        }
    }
    printf("</table>");
    
    DBClose($db);
}

?>
