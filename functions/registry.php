<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//Autoload functionality
require_once __DIR__.'/../vendor/autoload.php';

//Database functionality
require_once __DIR__.'/../functions/database/dbclose.php';
require_once __DIR__.'/../functions/database/dbopen.php';

//HTML functionality
require_once __DIR__.'/../functions/html/printnavbar.php';
require_once __DIR__.'/../functions/html/printfooter.php';
require_once __DIR__.'/../functions/html/printheader.php';
require_once __DIR__.'/../functions/html/printcontractpage.php';
require_once __DIR__.'/../functions/html/printbodytag.php';
require_once __DIR__.'/../functions/html/printtitle.php';
require_once __DIR__.'/../functions/html/printpopups.php';
require_once __DIR__.'/../functions/html/printcorpselect.php';
require_once __DIR__.'/../functions/html/printheaderclosetag.php';
require_once __DIR__.'/../functions/html/printheadercorpselectscript.php';
require_once __DIR__.'/../functions/html/printcloseindexpage.php';
require_once __DIR__.'/../functions/html/printindexpage.php';

//Miscellaneous functionality
//require_once __DIR__.'/../functions/misc/calccontract.php';
require_once __DIR__.'/../functions/misc/corpselect.php';

?>