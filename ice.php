<?php  
    define('indexes', TRUE);
    require_once __DIR__.'/functions/registry.php';
    include 'misc/input_iceProd_fuel.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!--metas-->
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
    <meta content="Warped Intentions Buy Back Program" name="description">
    <meta content="index,follow" name="robots">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <title>
        Warped Intentions Buy Back Program
    </title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <link href="css/custom.css" rel="stylesheet">
    <link href="css/eve-link.css" rel="stylesheet">
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js" type="text/javascript"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <style type="text/css">
        body{
            background-image:url(images/bgs/EVE_asteroid_ice.jpg);
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

<div class="container">
    <div class="row">
        <form action="contracts/ice_contract.php" method="post">
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><strong>Calculator</strong></h3>
                    </div>
                    <div class="panel-body">
                        <p>
                            <label>Clear Icicle <?php echo number_format($Clear_Icicle, 2, ',', '.'); ?> ISK/Unit</label>

                        <div class="input-group form-control" id="Icicle" style="padding: 0; border: none;">
                            <input type="number" class="form-control text-right typeahead" placeholder="Clear Icicle"
                                   id="calc-input-Icicle_units-value">
                        </div>
                        </p>
                        <p>
                            <label>Enriched Clear Icicle  <?php echo number_format($Enriched_Clear_Icicle, 2, ',', '.'); ?> ISK/Unit</label>

                        <div class="input-group form-control" id="Enriched" style="padding: 0; border: none;">
                            <input type="number" class="form-control text-right typeahead" placeholder="Enriched Clear Icicle"
                                   id="calc-input-Enriched_units-value">
                        </div>
                        </p>
                        <p>
                            <label>Glacial Mass <?php echo number_format($Glacial_Mass, 2, ',', '.'); ?> ISK/Unit</label>

                        <div class="input-group form-control" id="Glacial" style="padding: 0; border: none;">
                            <input type="number" class="form-control text-right typeahead" placeholder="Glacial Mass"
                                   id="calc-input-Glacial_units-value">
                        </div>
                        </p>
                        <p>
                            <label>Smooth Glacial Mass  <?php echo number_format($Smooth_Glacial_Mass, 2, ',', '.'); ?> ISK/Unit</label>

                        <div class="input-group form-control" id="Smooth" style="padding: 0; border: none;">
                            <input type="number" class="form-control text-right typeahead" placeholder="Smooth Glacial Mass"
                                   id="calc-input-Smooth_units-value">
                        </div>
                        </p>
                        <p>
                            <label>White Glaze <?php echo number_format($White_Glaze, 2, ',', '.'); ?> ISK/Unit</label>

                        <div class="input-group form-control" id="Glaze" style="padding: 0; border: none;">
                            <input type="number" class="form-control text-right typeahead" placeholder="White Glaze"
                                   id="calc-input-Glaze_units-value">
                        </div>
                        </p>
                        <p>
                            <label>Pristine White Glaze <?php echo number_format($Pristine_White_Glaze, 2, ',', '.'); ?> ISK/Unit</label>

                        <div class="input-group form-control" id="Pristine" style="padding: 0; border: none;">
                            <input type="number" class="form-control text-right typeahead" placeholder="Pristine White Glaze"
                                   id="calc-input-Pristine_units-value">
                        </div>
                        </p>
                        <p>
                            <label>Blue Ice <?php echo number_format($Blue_Ice, 2, ',', '.'); ?> ISK/Unit</label>

                        <div class="input-group form-control" id="Blue" style="padding: 0; border: none;">
                            <input type="number" class="form-control text-right typeahead" placeholder="Blue Ice"
                                   id="calc-input-Blue_units-value">
                        </div>
                        </p>
                        <p>
                            <label>Thick Blue Ice <?php echo number_format($Thick_Blue_Ice, 2, ',', '.'); ?> ISK/Unit</label>

                        <div class="input-group form-control" id="Thick" style="padding: 0; border: none;">
                            <input type="number" class="form-control text-right typeahead" placeholder="Thick Blue Ice"
                                   id="calc-input-Thick_units-value">
                        </div>
                        </p>
                        <p>
                            <label>Glare Crust <?php echo number_format($Glare_Crust, 2, ',', '.'); ?> ISK/Unit</label>

                        <div class="input-group form-control" id="Glare" style="padding: 0; border: none;">
                            <input type="number" class="form-control text-right typeahead" placeholder="Glare Crust"
                                   id="calc-input-Glare_units-value">
                        </div>
                        </p>
                        <p>
                            <label>Dark Glitter  <?php echo number_format($Dark_Glitter, 2, ',', '.'); ?> ISK/Unit</label>

                        <div class="input-group form-control" id="Glitter" style="padding: 0; border: none;">
                            <input type="number" class="form-control text-right typeahead" placeholder="Dark Glitter"
                                   id="calc-input-Glitter_units-value">
                        </div>
                        </p>
                        <p>
                            <label>Gelidus <?php echo number_format($Gelidus, 2, ',', '.'); ?> ISK/Unit</label>

                        <div class="input-group form-control" id="Gelidus" style="padding: 0; border: none;">
                            <input type="number" class="form-control text-right typeahead" placeholder="Gelidus"
                                   id="calc-input-Gelidus_units-value">
                        </div>
                        </p>
                        <p>
                            <label>Krystallos <?php echo number_format($Krystallos, 2, ',', '.'); ?> ISK/Unit</label>

                        <div class="input-group form-control" id="Krystallos" style="padding: 0; border: none;">
                            <input type="number" class="form-control text-right typeahead" placeholder="Krystallos"
                                   id="calc-input-Krystallos_units-value">
                        </div>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="panel panel-default" data-spy="affix" data-offset-top="450" data-offset-bottom="370" id="invoice-panel">
                    <div class="panel-heading">
                        <h3 class="panel-title"> <strong>Invoice</strong>
                        </h3>
                    </div>
                    <div class="panel-body">
                        <p id="calc-output-row">Total Clear Icicle value <span class="pull-right"><span id="calc-output-Icicle-value"></span></p>
                        <p id="calc-output-row">Total Enriched Clear Icicle value <span class="pull-right"><span id="calc-output-Enriched-value"></span></p>
                        <p id="calc-output-row">Total Glacial Mass value<span class="pull-right"><span id="calc-output-Glacial-value"></span></p>
                        <p id="calc-output-row">Total Smooth Glacial Mass value <span class="pull-right"><span id="calc-output-Smooth-value"></span></p>
                        <p id="calc-output-row">Total White Glaze value <span class="pull-right" id="calc-output-Glaze-value"></span></p>
                        <p id="calc-output-row">Total Pristine White Glaze value <span class="pull-right" id="calc-output-Pristine-value"></span></p>
                        <p id="calc-output-row">Total Blue Ice value <span class="pull-right" id="calc-output-Blue-value"></span></p>
                        <p id="calc-outputb-row">Total Thick Blue Ice value <span class="pull-right" id="calc-output-Thick-value"></span></p>
                        <p id="calc-output-row">Total Glare Crust value <span class="pull-right" id="calc-output-Glare-value"></span></p>
                        <p id="calc-output-row">Total Dark Glitter value <span class="pull-right" id="calc-output-Glitter-value"></span></p>
                        <p id="calc-output-row">Total Gelidus value <span class="pull-right" id="calc-output-Gelidus-value"></span></p>
                        <p id="calc-outputb-row">Total Krystallos value <span class="pull-right" id="calc-output-Krystallos-value"></span></p>
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
    <script src="js/ice_cal.js"></script>
</body>
</html>