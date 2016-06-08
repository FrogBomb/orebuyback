<?php

function PrintNavBar($username) {
    printf("<div class=\"navbar navbar-inverse navbar-fixed-top\" style=\"height: 60px;\" role=\"navigation\">
                <div class=\"navbar-header\">
                    <button class=\"navbar-toggle\" data-target=\".navbar-collapse\" data-toggle=\"collapse\" type=\"button\">
                        <span class=\"sr-only\">Toggle navigation</span>
                        <span class=\"icon-bar\"></span>
                        <span class=\"icon-bar\"></span>
                        <span class=\"icon-bar\"></span>
                        <span class=\"icon-bar\"></span>
                    </button>
                </div>
                <div class=\"collapse navbar-collapse pull-left\">
                    <ul class=\"nav navbar-nav\">
                        <li><a href=\"dashboard.php\">Dashboard</a></li>
                        <li><a href=\"contracts.php\">Contracts</a></li>
                        <li><a href=\"corppayouts.php\">Corp Payouts</a></li>
                        <li><a href=\"corpsettings.php\">Corp Settings</a></li>
                        <li><a href=\"addnewcorp.php\">Add New Corp</a></li>
                    </ul>
                </div>
                <div class=\"collapse navbar-collapse pull-right\">
                    <ul class=\"nav navbar-nav\">
                        <li><h2>" .  $username . " </h2></li>
                        <li><a href=\"includes/logout.php\">Log Out</a></li>
                    </ul>
                </div>
            </div>");
}