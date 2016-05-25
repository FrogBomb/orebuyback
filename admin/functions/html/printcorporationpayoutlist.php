<?php

function PrintCorporationPayoutListAdminDashboard() {
  
    //Open the database connection
    $db = DBOpen();
    //Get all of the corporations from the list
    $corporations = $db->fetchRowMany('SELECT * FROM Corps WHERE Deleted= :deleted', array('deleted' => 0));
    
    foreach($corporations as $corp) {
        $corporationName = $corp["CorpName"];
        $taxesInTemp = $db->fetchRowMany('SELECT Amount FROM CorporationPayouts WHERE CorpName= :corp AND Type= :ty', array('corp' => $corporationName, 'ty' => 0));
        $paidInTaxes = 0.00;
        if($taxesInTemp != false) {
            foreach($taxesInTemp as $taxes) {
                $paidInTaxes = $paidInTaxes + $taxes["Amount"];
            }
        }
        $taxesOutTemp = $db->fetchRowMany('SELECT Amount FROM CorporationPayouts WHERE CorpName= :corp AND Type= :ty', array('corp' => $corporationName, 'ty' => 1));
        $paidOutTaxes = 0.00;
        if($taxesOutTemp != false) {
            foreach($taxesOutTemp as $taxes) {
                $paidOutTaxes = $paidOutTaxes + $taxes["Amount"];
            }
        }
        //Calculate the taxes
        $taxes = $paidInTaxes - $paidOutTaxes;
        //If the taxes are greater than zero, then display the table row for each corporation
        
        if($taxes > 0.00) {
            printf("<tr>");
            printf("<td>" . $corporationName . "</td>");
            printf("<td>" . $taxes . "</td>");
            printf("<td><input type=\"number\" class=\"form-control\" name=\"taxes\"><input type=\"hidden\"  class=\"form-control\" name=\"corporation\" value=\"" . $corporationName . "\"></td>");
            printf("<td><input type=\"submit\" value=\"Process Corp Payout\"</td>");
            printf("</tr>"); 
        }
        
    }
    //Close the database connection
    DBClose($db);

}

?>