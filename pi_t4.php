<?php 
    define('indexes', TRUE);
    require_once __DIR__.'/functions/registry.php';
    include 'misc/input_pi_t4.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
    <meta content="Warped Intentions Buy Back Program" name="description">
    <meta content="index,follow" name="robots">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <title>Warped Intentions Buy Back Program</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <link href="css/custom.css" rel="stylesheet">
    <link href="css/eve-link.css" rel="stylesheet">
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js" type="text/javascript"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <style type="text/css">
        body{
            background-image:url(images/bgs/pi_bg_blur.jpg);
            background-repeat:no-repeat;
            background-attachment: fixed;
        }
        .affix {
            top: 75px;
        }
        .affix-bottom {
            position: absolute;
        }
    </style>
    <script>
        $(function() {
            var $affix = $("#invoice-panel"),
                $parent = $affix.parent(),
                resize = function() { $affix.width($parent.width()); };
            $(window).resize(resize);
            resize();
        });
    </script>
</head>
<body>

<?php
    PrintNavBar();
    PrintTitle();
?>

<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading" align="center">
            <h3 class="panel-title"><span style="font-family: Arial; color: #FF2A2A;"><strong>Instruction Sheet</strong></span><br></h3>
        </div>
        <div class="panel-body" align="center">
            - In the Calculator below you can enter the amounts for each Ore that you want to sell.<br>
            - Once done click on the <strong>Invoice</strong> price to submit the contract.<br>
            - The contract will be submitted to the database, and contract details will be printed on the next page.<br>
            <span style="font-family: Arial; color: #FF2A2A;"><strong>- Contract max is 500m ISK at a time, will allow for faster processing of the contracts.</strong></span>
            <hr>
            <span style="font-family: Arial; color: #8FEF2F;"><strong>Database was last updated on: <?php echo $update ?></strong></span><br>
            <span style="font-family: Arial; color: #8FEF2F;"><strong>Ore prices are mineral based</strong></span><br>
            <span style="font-family: Arial; color: white;"<strong>Corporation: </strong> <?php echo $corporation ?></span><br>
            <span style="font-family: Arial; color: white;"<strong>Alliance Tax Rate: </strong>  <?php echo $alliance_tax ?> %</span><br>
            <span style="font-family: Arial; color: white;"<strong>Corp Tax Rate: </strong>  <?php echo $corpTax ?> %</span><br>
            <span style="font-family: Arial; color: white;"<strong>TotalTax Rate: </strong>  <?php echo $total_tax ?> %</span><br>
        </div>
    </div>
</div>

<div class="clearfix"></div>

<!-- Calculate -->

<div class="container">
    <div class="row">
        <form action="contracts/pi_t4_contract.php" method="post">
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><strong>Calculator</strong></h3>
                    </div>
                    <div class="panel-body">
                        <p>
                            <label>Broadcast Node <?php echo number_format($Broadcast, 2, '.', ',');?> ISK/Unit</label>
                            <div class="input-group form-control" id="Broadcast Node" style="padding: 0; border: none;">
                                <input type="number" class="form-control text-right typeahead" name="Broadcast_Node" placeholder="Broadcast Node" id="calc-input-Broadcast_Node_units-value">
                            </div>
                        </p>
                        <p>
                            <label>Integrity Response Drones <?php echo number_format($Response_Drones, 2, '.', ',');?> ISK/Unit</label>
                            <div class="input-group form-control" id="Integrity Response Drones" style="padding: 0; border: none;">
                                <input type="number" class="form-control text-right typeahead" name="Integrity_Response_Drones" placeholder="Integrity Response Drones" id="calc-input-Integrity_Response_Drones_units-value">
                            </div>
                        </p>
                        <p>
                            <label>Nano-Factory <?php echo number_format($Nanofactory, 2, '.', ',');?> ISK/Unit</label>
                            <div class="input-group form-control" id="Nano-Factory" style="padding: 0; border: none;">
                                <input type="number" class="form-control text-right typeahead" name="Nano-Factory" placeholder="Nano-Factory" id="calc-input-NanoFactory_units-value">
                            </div>
                        </p>
                        <p>
                            <label>Organic Mortar Applicators <?php echo number_format($Organic_Mortar, 2, '.', ',');?> ISK/Unit</label>
                            <div class="input-group form-control" id="Organic Mortar Applicators" style="padding: 0; border: none;">
                                <input type="number" class="form-control text-right typeahead" name="Organic_Mortar_Applicators" placeholder="Organic Mortar Applicators" id="calc-input-Organic_Mortar_Applicators_units-value">
                            </div>
                        </p>
                        <p>
                            <label>Recursive Computing Module <?php echo number_format($Recursive_Computing, 2, '.', ',');?> ISK/Unit</label>
                            <div class="input-group form-control" id="Recursive Computing Module" style="padding: 0; border: none;">
                                <input type="number" class="form-control text-right typeahead" name="Recursive_Computing_Module" placeholder="Recursive Computing Module" id="calc-input-Recursive_Computing_Module_units-value">
                            </div>
                        </p>
                        <p>
                            <label>Self-Harmonizing Power Core <?php echo number_format($Power_Core, 2, '.', ',');?> ISK/Unit</label>
                            <div class="input-group form-control" id="Self-Harmonizing Power Core" style="padding: 0; border: none;">
                                <input type="number" class="form-control text-right typeahead" name="Self-Harmonizing_Power_Core" placeholder="Self-Harmonizing Power Core" id="calc-input-Self_Harmonizing_Power_Core_units-value">
                            </div>
                        </p>
                        <p>
                            <label>Sterile Conduits <?php echo number_format($Sterile_Conduits, 2, '.', ',');?> ISK/Unit</label>
                            <div class="input-group form-control" id="Sterile Conduits" style="padding: 0; border: none;">
                                <input type="number" class="form-control text-right typeahead" name="Sterile_Conduits" placeholder="Sterile Conduits" id="calc-input-Sterile_Conduits_units-value">
                            </div>
                        </p>
                        <p>
                            <label>Wetware Mainframe <?php echo number_format($Mainframe, 2, '.', ',');?> ISK/Unit</label>
                            <div class="input-group form-control" id="Wetware Mainframe" style="padding: 0; border: none;">
                                <input type="number" class="form-control text-right typeahead" name="Wetware_Mainframe" placeholder="Wetware Mainframe" id="calc-input-Wetware_Mainframe_units-value">
                            </div>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="panel panel-default" data-spy="affix" data-offset-top="450" data-offset-bottom="370" id="invoice-panel">
                    <div class="panel-heading">
                        <h3 class="panel-title"><strong>Invoice</strong></h3>
                    </div>
                    <div class="panel-body">
                        <p id="calc-output-row">Total Broadcast Node value <span class="pull-right"><span id="calc-output-broadcast-value"></span></p>
                        <p id="calc-output-row">Total Integrity Response Drones value <span class="pull-right"><span id="calc-output-responseDrones-value"></span></p>
                        <p id="calc-output-row">Total Nano-Factory value <span class="pull-right"><span id="calc-output-nanoFactory-value"></span></p>
                        <p id="calc-output-row">Total Organic Mortar Applicators value <span class="pull-right"><span id="calc-output-organicMortar-value"></span></p>
                        <p id="calc-output-row">Total Recursive Computing Module value <span class="pull-right"><span id="calc-output-recursiveComputing-value"></span></p>
                        <p id="calc-output-row">Total Self-Harmonizing Power Core value <span class="pull-right"><span id="calc-output-powerCore-value"></span></p>
                        <p id="calc-output-row">Total Sterile Conduits value <span class="pull-right"><span id="calc-output-sterileConduits-value"></span></p>
                        <p id="calc-output-row">Total Wetware Mainframe value <span class="pull-right"><span id="calc-output-Mainframe-value"></span></p>
                        <hr>
                        <p id="calc-output-reward-row">
                            <b>Contract Value    </b><strong class="pull-right" id="calc-output-reward-value"></strong><br>
                            <br><input class="form-contorl pull-left" type="submit" value="Submit Contract">
                        </p>
                        <br>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- Calculate -->

<?php
    PrintFooter();
    PrintPopups();
?>

    <!-- Clipboard -->
    <div class="modal" id="clipboard" tabindex="-1" role="dialog" aria-labelledby="clipboardLabel" aria-hidden="true" onkeydown="if (event.keyCode == 13) $('#clipboard').modal('hide');">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="clipboardLabel">Copy to clipboard: CTRL-C, Enter</h4>
                </div>
                <div class="modal-body">
                    <input type="text" class="form-control text-right" id="clipboard-content">
                </div>
            </div>
        </div>
    </div>
    <!-- Clipboard -->

    <script src="js/jquery.cookie.js"></script>
    <script src="js/custom.js"></script>
    <script src="js/typeahead.bundle.js"></script>
    <script src="js/handlebars-v1.3.0.js"></script>
    <script src="js/t4_pi_cal.js"></script>

</body>
</html>