<?php 
    define('indexes', TRUE);
    require_once __DIR__.'/functions/registry.php';
    include 'misc/input_pi_t1.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
    <meta content="Lone Star Buyback Calculator" name="description">
    <meta content="index,follow" name="robots">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <title>Buy Up Indexes | Lone Star Warriors</title>
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
            top: 60px;
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
<!--Navigation-->
<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="navbar-header">
        <button class="navbar-toggle" data-target=".navbar-collapse" data-toggle="collapse" type="button">
            <span class="sr-only">Toggle Navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.php"><img src="images/logo-wide.png" style="margin-top: -7px;"></a>
    </div>
    <div class="collapse navbar-collapse pull-right">
        <ul class="nav navbar-nav">
            <li class="active"><a href="index.php">Home</a></li>
            <li><a href="../../index.html">Mainpage</a></li>
            <li><a href="../../eve.html">Eve Page</a></li>
            <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><img
                        src="images/settings.png"><b class="caret"></b></a>
                <ul class="dropdown-menu pull-right">
                    <li class="dropdown-header">Applications</li>
                    <li><a href="#">EvE Online Applications</a></li>
                    <li><a href="#" onclick="clearCookies();location.reload();">Clear all cookies</a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>
<!--Navigation-->

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
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><strong>Calculator</strong></h3>
                </div>
                <div class="panel-body">
                    <p>
                        <label>Bacteria <?php echo $bacteria; ?> ISK/Unit</label>

                    <div class="input-group form-control" id="Bacteria" style="padding: 0; border: none;">
                        <input type="number" class="form-control text-right typeahead" placeholder="Bacteria"
                               id="calc-input-Bacteria_units-value">
                    </div>
                    </p>
                    <p>
                        <label>Biofuels <?php echo $biofuels; ?> ISK/Unit</label>

                    <div class="input-group form-control" id="Biofuels" style="padding: 0; border: none;">
                        <input type="number" class="form-control text-right typeahead" placeholder="Biofuels"
                               id="calc-input-Biofuels_units-value">
                    </div>
                    </p>
                    <p>
                        <label>Biomass <?php echo $biomass; ?> ISK/Unit</label>

                    <div class="input-group form-control" id="Biomass" style="padding: 0; border: none;">
                        <input type="number" class="form-control text-right typeahead" placeholder="Biomass"
                               id="calc-input-Biomass_units-value">
                    </div>
                    </p>
                    <p>
                        <label>Chiral Structures <?php echo $chiral_structures; ?> ISK/Unit</label>

                    <div class="input-group form-control" id="Chiral_Structures" style="padding: 0; border: none;">
                        <input type="number" class="form-control text-right typeahead" placeholder="Chiral Structures"
                               id="calc-input-Chiral_Structures_units-value">
                    </div>
                    </p>
                    <p>
                        <label>Electrolytes <?php echo $electrolytes; ?> ISK/Unit</label>

                    <div class="input-group form-control" id="Electrolytes" style="padding: 0; border: none;">
                        <input type="number" class="form-control text-right typeahead" placeholder="Electrolytes"
                               id="calc-input-Electrolytes_units-value">
                    </div>
                    </p>
                    <p>
                        <label>Industrial Fibers <?php echo $industrial_fibers; ?> ISK/Unit</label>

                    <div class="input-group form-control" id="Industrial_Fibers" style="padding: 0; border: none;">
                        <input type="number" class="form-control text-right typeahead" placeholder="Industrial Fibers"
                               id="calc-input-industrial_fibers_units-value">
                    </div>
                    </p>
                    <p>
                        <label>Oxidizing Compound <?php echo $oxidizing_compound; ?> ISK/Unit</label>

                    <div class="input-group form-control" id="Oxydizing Compound" style="padding: 0; border: none;">
                        <input type="number" class="form-control text-right typeahead" placeholder="Oxidizing Compound"
                               id="calc-input-Oxidizing_Compound-value">
                    </div>
                    </p>
                    <p>
                        <label>Oxygen <?php echo $oxygen; ?> ISK/Unit</label>

                    <div class="input-group form-control" id="Oxygen" style="padding: 0; border: none;">
                        <input type="number" class="form-control text-right typeahead" placeholder="Oxygen"
                               id="calc-input-Oxygen_pi_units-value">
                    </div>
                    </p>
                    <p>
                        <label>Plasmoids <?php echo $plasmoids; ?> ISK/Unit</label>

                    <div class="input-group form-control" id="Plasmoids" style="padding: 0; border: none;">
                        <input type="number" class="form-control text-right typeahead" placeholder="Plasmoids"
                               id="calc-input-Plasmoids_units-value">
                    </div>
                    </p>
                    <p>
                        <label>Precious Metals <?php echo $precious_metals; ?> ISK/Unit</label>

                    <div class="input-group form-control" id="Precious Metals" style="padding: 0; border: none;">
                        <input type="number" class="form-control text-right typeahead" placeholder="Precious Metals"
                               id="calc-input-Precious_Metals_units-value">
                    </div>
                    </p>
                    <p>
                        <label>Proteins <?php echo $proteins; ?> ISK/Unit</label>

                    <div class="input-group form-control" id="Proteins" style="padding: 0; border: none;">
                        <input type="number" class="form-control text-right typeahead" placeholder="Proteins"
                               id="calc-input-Proteins_units-value">
                    </div>
                    </p>
                    <p>
                        <label>Reactive Metals <?php echo $reactive_metals; ?> ISK/Unit</label>

                    <div class="input-group form-control" id="Reactive Metals" style="padding: 0; border: none;">
                        <input type="number" class="form-control text-right typeahead" placeholder="Reactive Metals"
                               id="calc-input-Reactive_Metals_units-value">
                    </div>
                    </p>
                    <p>
                        <label>Silicon <?php echo $silicon; ?> ISK/Unit</label>

                    <div class="input-group form-control" id="Silicon" style="padding: 0; border: none;">
                        <input type="number" class="form-control text-right typeahead" placeholder="Silicon"
                               id="calc-input-Silicon_units-value">
                    </div>
                    </p>
                    <p>
                        <label>Toxic Metals  <?php echo $toxic_metals; ?> ISK/Unit</label>

                    <div class="input-group form-control" id="Toxic Metals" style="padding: 0; border: none;">
                        <input type="number" class="form-control text-right typeahead" placeholder="Toxic Metals"
                               id="calc-input-Toxic_Metals_units-value">
                    </div>
                    </p>
                    <p>
                        <label>Water <?php echo $water; ?> ISK/Unit</label>

                    <div class="input-group form-control" id="Water" style="padding: 0; border: none;">
                        <input type="number" class="form-control text-right typeahead" placeholder="Water"
                               id="calc-input-Water_units-value">
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
    </div>
</div>
<!-- Calculate -->

<!-- Footer -->
<?php
    PrintFooter();
    PrintPopups();
?>
    <!-- Popups -->

    <script src="js/jquery.cookie.js"></script>
    <script src="js/custom.js"></script>
    <script src="js/typeahead.bundle.js"></script>
    <script src="js/handlebars-v1.3.0.js"></script>
    <script src="js/t1_pi_cal.js"></script>

</body>
</html>