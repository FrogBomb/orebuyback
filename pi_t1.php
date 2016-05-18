<?php 
    define('indexes', TRUE);
    require_once __DIR__.'/functions/registry.php';
    include 'misc/input_pi_t1.php';
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
            <span style="font-family: Arial; color: white;"><strong>Corporation: </strong> <?php echo $corporation ?></span><br>
            <span style="font-family: Arial; color: white;"><strong>Alliance Tax Rate: </strong>  <?php echo $alliance_tax ?> %</span><br>
            <span style="font-family: Arial; color: white;"><strong>Corp Tax Rate: </strong>  <?php echo $corpTax ?> %</span><br>
            <span style="font-family: Arial; color: white;"><strong>TotalTax Rate: </strong>  <?php echo $total_tax ?> %</span><br>
        </div>
    </div>
</div>

<div class="clearfix"></div>
<!-- Calculate -->
<div class="container">
    <div class="row">
        <form action="contracts/pi_t1_contract.php" method="post">
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><strong>Calculator</strong></h3>
                    </div>
                    <div class="panel-body">
                        <p>
                            <label>Bacteria <?php echo number_format($Bacteria, 2, '.', ','); ?> ISK/Unit</label>
                            <div class="input-group form-control" id="Bacteria" style="padding: 0; border: none;">
                                <input type="number" class="form-control text-right typeahead" name="Bacteria" placeholder="Bacteria" id="calc-input-Bacteria-value">
                            </div>
                        </p>
                        <p>
                            <label>Biofuels <?php echo number_format($Biofuels, 2, '.', ','); ?> ISK/Unit</label>
                            <div class="input-group form-control" id="Biofuels" style="padding: 0; border: none;">
                                <input type="number" class="form-control text-right typeahead" name="Biofuels" placeholder="Biofuels" id="calc-input-Biofuels_units-value">
                            </div>
                        </p>
                        <p>
                            <label>Biomass <?php echo number_format($Biomass, 2, '.', ','); ?> ISK/Unit</label>
                            <div class="input-group form-control" id="Biomass" style="padding: 0; border: none;">
                                <input type="number" class="form-control text-right typeahead" name="Biomass" placeholder="Biomass" id="calc-input-Biomass_units-value">
                            </div>
                        </p>
                        <p>
                            <label>Chiral Structures <?php echo number_format($Chiral_Structures, 2, '.', ','); ?> ISK/Unit</label>
                            <div class="input-group form-control" id="Chiral_Structures" style="padding: 0; border: none;">
                                <input type="number" class="form-control text-right typeahead" name="Chiral_Structures" placeholder="Chiral Structures" id="calc-input-Chiral_Structures_units-value">
                            </div>
                        </p>
                        <p>
                            <label>Electrolytes <?php echo number_format($Electrolytes, 2, '.', ','); ?> ISK/Unit</label>
                            <div class="input-group form-control" id="Electrolytes" style="padding: 0; border: none;">
                                <input type="number" class="form-control text-right typeahead" name="Electrolytes" placeholder="Electrolytes" id="calc-input-Electrolytes_units-value">
                            </div>
                        </p>
                        <p>
                            <label>Industrial Fibers <?php echo number_format($Industrial_Fibers, 2, '.', ','); ?> ISK/Unit</label>
                            <div class="input-group form-control" id="Industrial_Fibers" style="padding: 0; border: none;">
                                <input type="number" class="form-control text-right typeahead" name="Industrial_Fibers" placeholder="Industrial Fibers" id="calc-input-industrial_fibers_units-value">
                            </div>
                        </p>
                        <p>
                            <label>Oxidizing Compound <?php echo number_format($Oxidizing_Compound, 2, '.', ','); ?> ISK/Unit</label>
                            <div class="input-group form-control" id="Oxydizing Compound" style="padding: 0; border: none;">
                                <input type="number" class="form-control text-right typeahead" name="Oxidizing_Compound" placeholder="Oxidizing Compound" id="calc-input-Oxidizing_Compound-value">
                            </div>
                        </p>
                        <p>
                            <label>Oxygen <?php echo number_format($Oxygen, 2, '.', ','); ?> ISK/Unit</label>
                            <div class="input-group form-control" id="Oxygen" style="padding: 0; border: none;">
                                <input type="number" class="form-control text-right typeahead" name="Oxygen" placeholder="Oxygen" id="calc-input-Oxygen_pi_units-value">
                            </div>
                        </p>
                        <p>
                            <label>Plasmoids <?php echo number_format($Plasmoids, 2, '.', ','); ?> ISK/Unit</label>
                            <div class="input-group form-control" id="Plasmoids" style="padding: 0; border: none;">
                                <input type="number" class="form-control text-right typeahead" name="Plasmoids" placeholder="Plasmoids" id="calc-input-Plasmoids_units-value">
                            </div>
                        </p>
                        <p>
                            <label>Precious Metals <?php echo number_format($Precious_Metals, 2, '.', ','); ?> ISK/Unit</label>
                            <div class="input-group form-control" id="Precious Metals" style="padding: 0; border: none;">
                                <input type="number" class="form-control text-right typeahead" name="Precious_Metals" placeholder="Precious Metals" id="calc-input-Precious_Metals_units-value">
                            </div>
                        </p>
                        <p>
                            <label>Proteins <?php echo number_format($Proteins, 2, '.', ','); ?> ISK/Unit</label>
                            <div class="input-group form-control" id="Proteins" style="padding: 0; border: none;">
                                <input type="number" class="form-control text-right typeahead" name="Proteins" placeholder="Proteins" id="calc-input-Proteins_units-value">
                            </div>
                        </p>
                        <p>
                            <label>Reactive Metals <?php echo number_format($Reactive_Metals, 2, '.', ','); ?> ISK/Unit</label>
                            <div class="input-group form-control" id="Reactive Metals" style="padding: 0; border: none;">
                                <input type="number" class="form-control text-right typeahead" name="Reactive_Metals" placeholder="Reactive Metals" id="calc-input-Reactive_Metals_units-value">
                            </div>
                        </p>
                        <p>
                            <label>Silicon <?php echo number_format($Silicon, 2, '.', ','); ?> ISK/Unit</label>
                            <div class="input-group form-control" id="Silicon" style="padding: 0; border: none;">
                                <input type="number" class="form-control text-right typeahead" name="Silicon" placeholder="Silicon" id="calc-input-Silicon_units-value">
                            </div>
                        </p>
                        <p>
                            <label>Toxic Metals  <?php echo number_format($Toxic_Metals, 2, '.', ','); ?> ISK/Unit</label>
                            <div class="input-group form-control" id="Toxic Metals" style="padding: 0; border: none;">
                                <input type="number" class="form-control text-right typeahead" name="Toxic_Metals" placeholder="Toxic Metals" id="calc-input-Toxic_Metals_units-value">
                            </div>
                        </p>
                        <p>
                            <label>Water <?php echo number_format($Water, 2, '.', ','); ?> ISK/Unit</label>
                            <div class="input-group form-control" id="Water" style="padding: 0; border: none;">
                                <input type="number" class="form-control text-right typeahead" name="Water" placeholder="Water" id="calc-input-Water_units-value">
                            </div>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="panel panel-default" data-spy="affix" data-offset-top="450" data-offset-bottom="370" id="invoice-panel">
                    <div class="panel-heading">
                        <h3 class="panel-title"><strong>Invoice</strong>
                        </h3>
                    </div>
                    <div class="panel-body">
                        <p id="calc-output-row">Total Bacteria value <span class="pull-right"><span id="calc-output-bacteria-value"></span></p>
                        <p id="calc-output-row">Total Biofuels value <span class="pull-right"><span id="calc-output-biofuels-value"></span></p>
                        <p id="calc-output-row">Total Biomass value <span class="pull-right"><span id="calc-output-biomass-value"></span></p>
                        <p id="calc-output-row">Total Chiral Structures value <span class="pull-right"><span id="calc-output-chiral_structures-value"></span></p>
                        <p id="calc-output-row">Total Electrolytes value <span class="pull-right"><span id="calc-output-electrolytes-value"></span></p>
                        <p id="calc-output-row">Total Industrial Fibers value <span class="pull-right"><span id="calc-output-industrial_fibers-value"></span></p>
                        <p id="calc-output-row">Total Oxidizing Compound value <span class="pull-right"><span id="calc-output-oxidizing_compound-value"></span></p>
                        <p id="calc-output-row">Total Oxygen value <span class="pull-right"><span id="calc-output-oxygen-value"></span></p>
                        <p id="calc-output-row">Total Plasmoids value <span class="pull-right"><span id="calc-output-plasmoids-value"></span></p>
                        <p id="calc-output-row">Total Precious Metals value <span class="pull-right"><span id="calc-output-precious-value"></span></p>
                        <p id="calc-output-row">Total Proteins value <span class="pull-right"><span id="calc-output-proteins-value"></span></p>
                        <p id="calc-output-row">Total Reactive Metals value <span class="pull-right"><span id="calc-output-reactive_metals-value"></span></p>
                        <p id="calc-output-row">Total Silicon value <span class="pull-right"><span id="calc-output-silicon-value"></span></p>
                        <p id="calc-output-row">Total Toxic Metals value <span class="pull-right"><span id="calc-output-toxic_metals-value"></span></p>
                        <p id="calc-output-row">Total Water value <span class="pull-right"><span id="calc-output-water-value"></span></p>
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
    <script src="js/t1_pi_cal.js"></script>

</body>
</html>