<?php  
    require_once __DIR__.'/../functions/registry.php';
    
    if(isset($_POST["Quote_Time"])) {
        $contractTime = $_POST["Quote_Time"];
    } else {
        $db = DBOpen();
        $contractTime = $db->fetchColumn('SELECT MAX(time) FROM OrePrices WHERE ItemId= :item', array('item' => 1230));
        DBClose($db);
    }
    if(isset($_POST["Corporation"])) {
        $corporation = $_POST["Corporation"];
    } else {
        $corporation = 'None';
    }
    if(isset($_POST["Helium_Isotopes"])){
        $Helium_Isotopes = $_POST["Helium_Isotopes"];
    } else {
        $Helium_Isotopes = 0;
    }
    if(isset($_POST["Hydrogen_Isotopes"])){
        $Hydrogen_Isotopes = $_POST["Hydrogen_Isotopes"];
    } else {
        $Hydrogen_Isotopes = 0;
    }
    if(isset($_POST["Nitrogen_Isotopes"])){
        $Nitrogen_Isotopes = $_POST["Nitrogen_Isotopes"];
    } else {
        $Nitrogen_Isotopes = 0;
    }
    if(isset($_POST["Oxygen_Isotopes"])){
        $Oxygen_Isotopes = $_POST["Oxygen_Isotopes"];
    } else {
        $Oxygen_Isotopes = 0;
    }
    if(isset($_POST["Heavy_Water"])){
        $Heavy_Water = $_POST["Heavy_Water"];
    } else {
        $Heavy_Water = 0;
    }
    if(isset($_POST["Liquid_Ozone"])){
        $Liquid_Ozone = $_POST["Liquid_Ozone"];
    } else {
        $Liquid_Ozone = 0;
    }
    if(isset($_POST["Strontium_Clathrates"])){
        $Strontium_Clathrates = $_POST["Strontium_Clathrates"];
    } else {
        $Strontium_Clathrates = 0;
    }
    
    $post = array(
        'Helium_Isotopes' => $Helium_Isotopes,
        'Hydrogen_Isotopes' => $Hydrogen_Isotopes,
        'Nitrogen_Isotopes' => $Nitrogen_Isotopes,
        'Oxygen_Isotopes' => $Oxygen_Isotopes,
        'Heavy_Water' => $Heavy_Water,
        'Liquid_Ozone' => $Liquid_Ozone,
        'Strontium_Clathrates' => $Strontium_Clathrates
    );
    
    $contract= IceProdContractValue($contractTime, $corporation, $post);
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
</head>
<body>

<?php
    PrintNavBar();
    PrintTitle();
?>

    <div class="container">
        <table class="table-bordered table-striped">
            <tr>
                <td>Contract To</td>
                <td>Contract Type</td>
                <td>Contract Length</td>
                <td>Contract Value</td>
            </tr>
            <tr>
                <td>Spatial Forces</td>
                <td>Private</td>
                <td>2 weeks</td>
                <td><?php echo $contract["Value"]; ?></td>
            </tr>
        </table>
    </div>
    <div class="container">
        <h1>Contract Contents</h1><br>
        <?php PrintIceProdContractContents($contract["Number"]); 
        ?>
    </div>
    
</body>
</html>
    