/**
 * Author:  Chris Mancuso
 * Created: May 20, 2016
 */

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `orebuyback`
--

-- --------------------------------------------------------

--
-- Table structure for table `Configuration`
--

CREATE TABLE IF NOT EXISTS `Configuration` (
  `refineRate` decimal(5,2) NOT NULL,
  `allianceTaxRate` decimal (5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Configuration`
--

INSERT INTO `Configuration` (`refineRate, allianceTaxRate`) VALUES (80.00, 4.00);

--
-- Table structure for table `Corps`
--

CREATE TABLE IF NOT EXISTS `Corps` (
  `index` int(11) NOT NULL AUTO_INCREMENT,
  `CorpName` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `TaxRate` decimal(5,2) DEFAULT NULL,
  `Deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`index`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

--
-- Table structure for table `login_attempts`
--

CREATE TABLE IF NOT EXISTS `login_attempts` (
  `user_id` int(11) NOT NULL,
  `time` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Table structure for table `members`
--

CREATE TABLE IF NOT EXISTS `members` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` char(128) NOT NULL,
  `salt` char(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

--
-- Table structure for table `member_roles`
-- Roles are Member, Director, CEO, and SiteAdmin
--

CREATE TABLE IF NOT EXISTS `member_roles` (
    `id` int(11) NOT NULL,
    `username` varchar(30) NOT NULL,
    `corporation` varchar(50) DEFAULT 'None',
    `role` varchar(20) NOT NULL DEFAULT 'Member', 
    `canChangeCorpTax` tinyint(1) NOT NULL DEFAULT '0',
    `canChangeRefineRate` tinyint(1) NOT NULL DEFAULT '0',
    `canChangeAllianceTaxRate` tinyint(1) NOT NULL DEFAULT '0',
    `canAddNewCorp` tinyint(1) NOT NULL DEFAULT '0',
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Table structure for table `Contracts`
--

CREATE TABLE IF NOT EXISTS `Contracts` (
  `ContractNum` int(11) NOT NULL AUTO_INCREMENT,
  `ContractType` varchar(50) NOT NULL,
  `Corporation` varchar(50) DEFAULT 'None',
  `QuoteTime` timestamp NOT NULL,
  `Value` decimal(20,2) DEFAULT NULL,
  `AllianceTax` decimal(20,2) NOT NULL DEFAULT '0.00',
  `CorpTax` decimal (20,2) NOT NULL DEFAULT '0.00',
  `Paid` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ContractNum`),
  UNIQUE KEY `ContractNum` (`ContractNum`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

--
-- Table structure for table 'OreContractContents`
--

CREATE TABLE IF NOT EXISTS `OreContractContents` (
    `ContractNum` int(11) NOT NULL,
    `ContractTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `QuoteTime` timestamp NOT NULL,
    `Veldspar` int(20) NOT NULL DEFAULT '0',
    `Concentrated_Veldspar` int(20) NOT NULL DEFAULT '0',
    `Dense_Veldspar` int(20) NOT NULL DEFAULT '0',
    `Scordite` int(20) NOT NULL DEFAULT '0',
    `Condensed_Scordite` int(20) NOT NULL DEFAULT '0',
    `Massive_Scordite` int(20) NOT NULL DEFAULT '0',
    `Pyroxeres` int(20) NOT NULL DEFAULT '0',
    `Solid_Pyroxeres` int(20) NOT NULL DEFAULT '0',
    `Viscous_Pyroxers` int(20) NOT NULL DEFAULT '0',
    `Plagioclase` int(20) NOT NULL DEFAULT '0',
    `Azure_Plagioclase` int(20) NOT NULL DEFAULT '0',
    `Rich_Plagioclase` int(20) NOT NULL DEFAULT '0',
    `Omber` int(20) NOT NULL DEFAULT '0',
    `Silvery_Omber` int(20) NOT NULL DEFAULT '0',
    `Golden_Omber` int(20) NOT NULL DEFAULT '0',
    `Kernite` int(20) NOT NULL DEFAULT '0',
    `Luminous_Kernite` int(20) NOT NULL DEFAULT '0',
    `Fiery_Kernite` int(20) NOT NULL DEFAULT '0',
    `Jaspet` int(20) NOT NULL DEFAULT '0',
    `Pure_Jaspet` int(20) NOT NULL DEFAULT '0',
    `Pristine_Jaspet` int(20) NOT NULL DEFAULT '0',
    `Hemorphite` int(20) NOT NULL DEFAULT '0',
    `Vivid_Hemorphite` int(20) NOT NULL DEFAULT '0',
    `Radiant_Hemorphite` int(20) NOT NULL DEFAULT '0',
    `Hedbergite` int(20) NOT NULL DEFAULT '0',
    `Vitric_Hedbergite` int(20) NOT NULL DEFAULT '0',
    `Glazed_Hedbergite` int(20) NOT NULL DEFAULT '0',
    `Gneiss` int(20) NOT NULL DEFAULT '0',
    `Iridescent_Gneiss` int(20) NOT NULL DEFAULT '0',
    `Prismatic_Gneiss` int(20) NOT NULL DEFAULT '0',
    `Dark_Ochre` int(20) NOT NULL DEFAULT '0',
    `Onyx_Ochre` int(20) NOT NULL DEFAULT '0',
    `Obsidian_Ochre` int(20) NOT NULL DEFAULT '0',
    `Spodumain` int(20) NOT NULL DEFAULT '0',
    `Bright_Spodumain` int(20) NOT NULL DEFAULT '0',
    `Gleaming_Spodumain` int(20) NOT NULL DEFAULT '0',
    `Crokite` int(20) NOT NULL DEFAULT '0',
    `Sharp_Crokite` int(20) NOT NULL DEFAULT '0',
    `Crystalline_Crokite` int(20) NOT NULL DEFAULT '0',
    `Bistot` int(20) NOT NULL DEFAULT '0',
    `Triclinic_Bistot` int(20) NOT NULL DEFAULT '0',
    `Monoclinic_Bistot` int(20) NOT NULL DEFAULT '0',
    `Arkonor` int(20) NOT NULL DEFAULT '0',
    `Crimson_Arkonor` int(20) NOT NULL DEFAULT '0',
    `Prime_Arkonor` int(20) NOT NULL DEFAULT '0',
    `Mercoxit` int(20) NOT NULL DEFAULT '0',
    `Magma_Mercoxit` int(20) NOT NULL DEFAULT '0',
    `Vitreous_Mercoxit` int(20) NOT NULL DEFAULT '0',
    PRIMARY KEY (`ContractNum`),
    UNIQUE KEY `ContractNum` (`ContractNum`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

--
-- Table structure for table 'OreCompContractContents`
--

CREATE TABLE IF NOT EXISTS `OreCompContractContents` (
    `ContractNum` int(11) NOT NULL,
    `ContractTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `QuoteTime` timestamp NOT NULL,
    `Compressed_Veldspar` int(20) NOT NULL DEFAULT '0',
    `Compressed_Concentrated_Veldspar` int(20) NOT NULL DEFAULT '0',
    `Compressed_Dense_Veldspar` int(20) NOT NULL DEFAULT '0',
    `Compressed_Scordite` int(20) NOT NULL DEFAULT '0',
    `Compressed_Condensed_Scordite` int(20) NOT NULL DEFAULT '0',
    `Compressed_Massive_Scordite` int(20) NOT NULL DEFAULT '0',
    `Compressed_Pyroxeres` int(20) NOT NULL DEFAULT '0',
    `Compressed_Solid_Pyroxeres` int(20) NOT NULL DEFAULT '0',
    `Compressed_Viscous_Pyroxers` int(20) NOT NULL DEFAULT '0',
    `Compressed_Plagioclase` int(20) NOT NULL DEFAULT '0',
    `Compressed_Azure_Plagioclase` int(20) NOT NULL DEFAULT '0',
    `Compressed_Rich_Plagioclase` int(20) NOT NULL DEFAULT '0',
    `Compressed_Omber` int(20) NOT NULL DEFAULT '0',
    `Compressed_Silvery_Omber` int(20) NOT NULL DEFAULT '0',
    `Compressed_Golden_Omber` int(20) NOT NULL DEFAULT '0',
    `Compressed_Kernite` int(20) NOT NULL DEFAULT '0',
    `Compressed_Luminous_Kernite` int(20) NOT NULL DEFAULT '0',
    `Compressed_Fiery_Kernite` int(20) NOT NULL DEFAULT '0',
    `Compressed_Jaspet` int(20) NOT NULL DEFAULT '0',
    `Compressed_Pure_Jaspet` int(20) NOT NULL DEFAULT '0',
    `Compressed_Pristine_Jaspet` int(20) NOT NULL DEFAULT '0',
    `Compressed_Hemorphite` int(20) NOT NULL DEFAULT '0',
    `Compressed_Vivid_Hemorphite` int(20) NOT NULL DEFAULT '0',
    `Compressed_Radiant_Hemorphite` int(20) NOT NULL DEFAULT '0',
    `Compressed_Hedbergite` int(20) NOT NULL DEFAULT '0',
    `Compressed_Vitric_Hedbergite` int(20) NOT NULL DEFAULT '0',
    `Compressed_Glazed_Hedbergite` int(20) NOT NULL DEFAULT '0',
    `Compressed_Gneiss` int(20) NOT NULL DEFAULT '0',
    `Compressed_Iridescent_Gneiss` int(20) NOT NULL DEFAULT '0',
    `Compressed_Prismatic_Gneiss` int(20) NOT NULL DEFAULT '0',
    `Compressed_Dark_Ochre` int(20) NOT NULL DEFAULT '0',
    `Compressed_Onyx_Ochre` int(20) NOT NULL DEFAULT '0',
    `Compressed_Obsidian_Ochre` int(20) NOT NULL DEFAULT '0',
    `Compressed_Spodumain` int(20) NOT NULL DEFAULT '0',
    `Compressed_Bright_Spodumain` int(20) NOT NULL DEFAULT '0',
    `Compressed_Gleaming_Spodumain` int(20) NOT NULL DEFAULT '0',
    `Compressed_Crokite` int(20) NOT NULL DEFAULT '0',
    `Compressed_Sharp_Crokite` int(20) NOT NULL DEFAULT '0',
    `Compressed_Crystalline_Crokite` int(20) NOT NULL DEFAULT '0',
    `Compressed_Bistot` int(20) NOT NULL DEFAULT '0',
    `Compressed_Triclinic_Bistot` int(20) NOT NULL DEFAULT '0',
    `Compressed_Monoclinic_Bistot` int(20) NOT NULL DEFAULT '0',
    `Compressed_Arkonor` int(20) NOT NULL DEFAULT '0',
    `Compressed_Crimson_Arkonor` int(20) NOT NULL DEFAULT '0',
    `Compressed_Prime_Arkonor` int(20) NOT NULL DEFAULT '0',
    `Compressed_Mercoxit` int(20) NOT NULL DEFAULT '0',
    `Compressed_Magma_Mercoxit` int(20) NOT NULL DEFAULT '0',
    `Compressed_Vitreous_Mercoxit` int(20) NOT NULL DEFAULT '0',
    PRIMARY KEY (`ContractNum`),
    UNIQUE KEY `ContractNum` (`ContractNum`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

--
-- Table structure for table 'FuelContractContents`
--

CREATE TABLE IF NOT EXISTS `FuelContractContents` (
    `ContractNum` int(11) NOT NULL,
    `ContractTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `QuoteTime` timestamp NOT NULL,
    `Amarr_Fuel_Block` int(20) NOT NULL DEFAULT '0',
    `Caldari_Fuel_Block` int(20) NOT NULL DEFAULT '0',
    `Gallente_Fuel_Block` int(20) NOT NULL DEFAULT '0',
    `Minmatar_Fuel_Block` int(20) NOT NULL DEFAULT '0',
    PRIMARY KEY (`ContractNum`),
    UNIQUE KEY `ContractNum` (`ContractNum`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

--
-- Table structure for table 'IceContractContents`
--

CREATE TABLE IF NOT EXISTS `IceContractContents` (
    `ContractNum` int(11) NOT NULL,
    `ContractTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `QuoteTime` timestamp NOT NULL,
    `Clear_Icicle` int(20) NOT NULL DEFAULT '0',
    `Enriched_Clear_Icicle` int(20) NOT NULL DEFAULT '0',
    `Glacial_Mass` int(20) NOT NULL DEFAULT '0',
    `Smooth_Glacial_Mass` int(20) NOT NULL DEFAULT '0',
    `White_Glaze` int(20) NOT NULL DEFAULT '0',
    `Pristine_White_Glaze` int(20) NOT NULL DEFAULT '0',
    `Blue_Ice` int(20) NOT NULL DEFAULT '0',
    `Thick_Blue_Ice` int(20) NOT NULL DEFAULT '0',
    `Glare_Crust` int(20) NOT NULL DEFAULT '0',
    `Dark_Glitter` int(20) NOT NULL DEFAULT '0',
    `Gelidus` int(20) NOT NULL DEFAULT '0',
    `Krystallos` int(20) NOT NULL DEFAULT '0',
    PRIMARY KEY (`ContractNum`),
    UNIQUE KEY `ContractNum` (`ContractNum`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

--
-- Table structure for table 'IceProdContractContents`
--

CREATE TABLE IF NOT EXISTS `IceProdContractContents` (
    `ContractNum` int(11) NOT NULL,
    `ContractTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `QuoteTime` timestamp NOT NULL,
    `Helium_Isotopes` int(20) NOT NULL DEFAULT '0',
    `Hydrogen_Isotopes` int(20) NOT NULL DEFAULT '0',
    `Nitrogen_Isotopes` int(20) NOT NULL DEFAULT '0',
    `Oxygen_Isotopes` int(20) NOT NULL DEFAULT '0',
    `Heavy_Water` int(20) NOT NULL DEFAULT '0',
    `Liquid_Ozone` int(20) NOT NULL DEFAULT '0',
    `Strontium_Clathrates` int(20) NOT NULL DEFAULT '0',
    PRIMARY KEY (`ContractNum`),
    UNIQUE KEY `ContractNum` (`ContractNum`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

--
-- Table structure for table 'MineralContractContents`
--

CREATE TABLE IF NOT EXISTS `MineralContractContents` (
    `ContractNum` int(11) NOT NULL,
    `ContractTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `QuoteTime` timestamp NOT NULL,
    `Tritanium` int(20) NOT NULL DEFAULT '0',
    `Pyerite` int(20) NOT NULL DEFAULT '0',
    `Mexallon` int(20) NOT NULL DEFAULT '0',
    `Nocxium` int(20) NOT NULL DEFAULT '0',
    `Isogen` int(20) NOT NULL DEFAULT '0',
    `Megacyte` int(20) NOT NULL DEFAULT '0',
    `Zydrine` int(20) NOT NULL DEFAULT '0',
    `Morphite` int(20) NOT NULL DEFAULT '0',
    PRIMARY KEY (`ContractNum`),
    UNIQUE KEY `ContractNum` (`ContractNum`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;


--
-- Table structure for table 'PiContractContents`
--

CREATE TABLE IF NOT EXISTS `PiContractContents` (
    `ContractNum` int(11) NOT NULL,
    `ContractTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `QuoteTime` timestamp NOT NULL,
    `Aqueous_Liquids` int(20) NOT NULL DEFAULT '0',
    `Ionic_Solutions` int(20) NOT NULL DEFAULT '0',
    `Base_Metals` int(20) NOT NULL DEFAULT '0',
    `Heavy_Metals` int(20) NOT NULL DEFAULT '0',
    `Noble_Metals` int(20) NOT NULL DEFAULT '0',
    `Carbon_Compounds` int(20) NOT NULL DEFAULT '0',
    `Micro_Organisms` int(20) NOT NULL DEFAULT '0',
    `Complex_Organisms` int(20) NOT NULL DEFAULT '0',
    `Planktic_Colonies` int(20) NOT NULL DEFAULT '0',
    `Noble_Gas` int(20) NOT NULL DEFAULT '0',
    `Reactive_Metals` int(20) NOT NULL DEFAULT '0',
    `Felsic_Magma` int(20) NOT NULL DEFAULT '0',
    `Non-CS_Materials` int(20) NOT NULL DEFAULT '0',
    `Suspended_Plasma` int(20) NOT NULL DEFAULT '0',
    `Autotrophs` int(20) NOT NULL DEFAULT '0',
    PRIMARY KEY (`ContractNum`),
    UNIQUE KEY `ContractNum` (`ContractNum`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

--
-- Table structure for table 'PiT1ContractContents`
--

CREATE TABLE IF NOT EXISTS `PiT1ContractContents` (
    `ContractNum` int(11) NOT NULL,
    `ContractTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `QuoteTime` timestamp NOT NULL,
    `Bacteria` int(20) NOT NULL DEFAULT '0', 
    `Biofuels` int(20) NOT NULL DEFAULT '0',
    `Biomass` int(20) NOT NULL DEFAULT '0',
    `Chiral_Structures` int(20) NOT NULL DEFAULT '0',
    `Electrolytes` int(20) NOT NULL DEFAULT '0',
    `Industrial_Fibers` int(20) NOT NULL DEFAULT '0',
    `Oxidizing_Compound` int(20) NOT NULL DEFAULT '0',
    `Oxygen` int(20) NOT NULL DEFAULT '0',
    `Plasmoids` int(20) NOT NULL DEFAULT '0',
    `Precious_Metals` int(20) NOT NULL DEFAULT '0',
    `Proteins` int(20) NOT NULL DEFAULT '0',
    `Reactive_Metals` int(20) NOT NULL DEFAULT '0',
    `Silicon` int(20) NOT NULL DEFAULT '0',
    `Toxic_Metals` int(20) NOT NULL DEFAULT '0',
    `Water` int(20) NOT NULL DEFAULT '0',
    PRIMARY KEY (`ContractNum`),
    UNIQUE KEY `ContractNum` (`ContractNum`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;


--
-- Table structure for table 'PiT2ContractContents`
--

CREATE TABLE IF NOT EXISTS `PiT2ContractContents` (
    `ContractNum` int(11) NOT NULL,
    `ContractTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `QuoteTime` timestamp NOT NULL,
    `Biocells` int(20) NOT NULL DEFAULT '0',
    `Construction_Blocks` int(20) NOT NULL DEFAULT '0',
    `Consumer_Electronics` int(20) NOT NULL DEFAULT '0',
    `Coolant` int(20) NOT NULL DEFAULT '0',
    `Enriched_Uranium` int(20) NOT NULL DEFAULT '0',
    `Fertilizer` int(20) NOT NULL DEFAULT '0',
    `Genetically_Enhanced_Livestock` int(20) NOT NULL DEFAULT '0',
    `Livestock` int(20) NOT NULL DEFAULT '0',
    `Mechanical_Parts` int(20) NOT NULL DEFAULT '0',
    `Microfiber_Shielding` int(20) NOT NULL DEFAULT '0',
    `Miniature_Electronics` int(20) NOT NULL DEFAULT '0',
    `Nanites` int(20) NOT NULL DEFAULT '0',
    `Oxides` int(20) NOT NULL DEFAULT '0',
    `Polyaramids` int(20) NOT NULL DEFAULT '0',
    `Polytextiles` int(20) NOT NULL DEFAULT '0',
    `Rocket_Fuel` int(20) NOT NULL DEFAULT '0',
    `Silicate_Glass` int(20) NOT NULL DEFAULT '0',
    `Superconductors` int(20) NOT NULL DEFAULT '0',
    `Synthetic_Oil` int(20) NOT NULL DEFAULT '0',
    `Test_Cultures` int(20) NOT NULL DEFAULT '0',
    `Transmitter` int(20) NOT NULL DEFAULT '0',
    `Viral_Agent` int(20) NOT NULL DEFAULT '0',
    `Water-Cooled_CPU` int(20) NOT NULL DEFAULT '0',
    PRIMARY KEY (`ContractNum`),
    UNIQUE KEY `ContractNum` (`ContractNum`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;


--
-- Table structure for table 'PiT3ContractContents`
--

CREATE TABLE IF NOT EXISTS `PiT3ContractContents` (
    `ContractNum` int(11) NOT NULL,
    `ContractTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `QuoteTime` timestamp NOT NULL,
    `Biotech_Research_Reports` int(20) NOT NULL DEFAULT '0',
    `Camera_Drones` int(20) NOT NULL DEFAULT '0',
    `Cryprotectant_Solution` int(20) NOT NULL DEFAULT '0',
    `Data_Chips` int(20) NOT NULL DEFAULT '0',
    `Gel-Matrix_Biopaste` int(20) NOT NULL DEFAULT '0',
    `Guidance_Systems` int(20) NOT NULL DEFAULT '0',
    `Hazmat_Detection_Systems` int(20) NOT NULL DEFAULT '0',
    `Hermetic_Membranes` int(20) NOT NULL DEFAULT '0',
    `High-Tech_Transmitters` int(20) NOT NULL DEFAULT '0',
    `Industrial_Explosives` int(20) NOT NULL DEFAULT '0',
    `Necoms` int(20) NOT NULL DEFAULT '0',
    `Nuclear_Reactors` int(20) NOT NULL DEFAULT '0',
    `Planetary_Vehicles` int(20) NOT NULL DEFAULT '0',
    `Robotics` int(20) NOT NULL DEFAULT '0',
    `Smartfab_Units` int(20) NOT NULL DEFAULT '0',
    `Supercomputers` int(20) NOT NULL DEFAULT '0',
    `Synthetic_Synapses` int(20) NOT NULL DEFAULT '0',
    `Transcranial_Microcontrollers` int(20) NOT NULL DEFAULT '0',
    `Ukomi_Superconductors` int(20) NOT NULL DEFAULT '0',
    `Vaccines` int(20) NOT NULL DEFAULT '0',
    PRIMARY KEY (`ContractNum`),
    UNIQUE KEY `ContractNum` (`ContractNum`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;


--
-- Table structure for table 'PiT4ContractContents`
--

CREATE TABLE IF NOT EXISTS `PiT4ContractContents` (
    `ContractNum` int(11) NOT NULL,
    `ContractTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `QuoteTime` timestamp NOT NULL,
    `Broadcast_Node` int(20) NOT NULL DEFAULT '0',
    `Integrity_Response_Drones` int(20) NOT NULL DEFAULT '0',
    `Nanofactory` int(20) NOT NULL DEFAULT '0',
    `Organic_Mortar_Applicator` int(20) NOT NULL DEFAULT '0',
    `Recursive_Computing_Module` int(20) NOT NULL DEFAULT '0',
    `Self-Harmonizing_Power_Core` int(20) NOT NULL DEFAULT '0',
    `Sterile_Conduits` int(20) NOT NULL DEFAULT '0',
    `Wetware_Mainframe` int(20) NOT NULL DEFAULT '0',
    PRIMARY KEY (`ContractNum`),
    UNIQUE KEY `ContractNum` (`ContractNum`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

--
-- Table structure for table `CorporationPayouts`
-- Type = 0 for adding, and Type = 1 for subtracting
--

CREATE TABLE IF NOT EXISTS `CorporationPayouts` (
    `index` int(11) NOT NULL AUTO_INCREMENT,
    `CorpName` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
    `Amount` decimal(12,2) DEFAULT '0.00',
    `Type` tinyint(1) NOT NULL DEFAULT '0',
    PRIMARY KEY (`index`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Table structure for table `AlliancePayouts`
-- Type = 0 for adding, and Type = 1 for subtracting
--

CREATE TABLE IF NOT EXISTS `AlliancePayouts` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `ContractNum` int(12) NOT NULL,
    `CorpName` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
    `Amount` decimal(12,2) DEFAULT '0.00',
    `Type` tinyint(1) NOT NULL DEFAULT '0',
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Table structure for table `itemComposition`
--

CREATE TABLE IF NOT EXISTS `itemComposition` (
  `Name` varchar(31) DEFAULT NULL,
  `ItemId` int(10) NOT NULL,
  `BatchSize` int(12) NOT NULL DEFAULT '100',
  `TritaniumNum` int(12) DEFAULT '0',
  `PyeriteNum` int(12) DEFAULT '0',
  `MexallonNum` int(12) DEFAULT '0',
  `IsogenNum` int(12) DEFAULT '0',
  `NocxiumNum` int(12) DEFAULT '0',
  `ZydrineNum` int(12) DEFAULT '0',
  `MegacyteNum` int(12) DEFAULT '0',
  `MorphiteNum` int(12) DEFAULT '0',
  `HeavyWaterNum` int(11) NOT NULL DEFAULT '0',
  `LiquidOzoneNum` int(11) NOT NULL DEFAULT '0',
  `NitrogenIsotopesNum` int(11) NOT NULL DEFAULT '0',
  `HeliumIsotopesNum` int(11) NOT NULL DEFAULT '0',
  `HydrogenIsotopesNum` int(11) NOT NULL DEFAULT '0',
  `OxygenIsotopesNum` int(11) NOT NULL DEFAULT '0',
  `StrontiumClathratesNum` int(11) NOT NULL DEFAULT '0',
  UNIQUE KEY `oreName` (`Name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `itemComposition`
--

INSERT INTO `itemComposition` (`Name`, `ItemId`, `BatchSize`, `TritaniumNum`, `PyeriteNum`, `MexallonNum`, `IsogenNum`, `NocxiumNum`, `ZydrineNum`, `MegacyteNum`, `MorphiteNum`, `HeavyWaterNum`, `LiquidOzoneNum`, `NitrogenIsotopesNum`, `HeliumIsotopesNum`, `HydrogenIsotopesNum`, `OxygenIsotopesNum`, `StrontiumClathratesNum`) VALUES
('Veldspar', 1230, 100, 415, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('Concentrated Veldpsar', 17470, 100, 436, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('Dense Veldspar', 17471, 100, 457, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('Scordite', 1228, 100, 346, 173, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('Condensed Scordite', 17463, 100, 363, 182, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('Massive Scordite', 17464, 100, 380, 190, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('Pyroxeres', 1224, 100, 351, 25, 50, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('Solid Pyroxeres', 17459, 100, 368, 26, 53, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('Viscous Pyroxeres', 17460, 100, 385, 27, 55, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('Plagioclase', 18, 100, 107, 213, 107, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('Azure Plagioclase', 17455, 100, 112, 224, 112, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('Rich Plagioclase', 17456, 100, 117, 234, 117, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('Omber', 1227, 100, 85, 34, 0, 85, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('Silvery Omber', 17867, 100, 89, 36, 0, 89, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('Golden Omber', 17868, 100, 94, 38, 0, 94, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('Kernite', 20, 100, 134, 0, 267, 134, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('Luminous Kernite', 17452, 100, 140, 0, 281, 140, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('Fiery Kernite', 17453, 100, 147, 0, 294, 147, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('Jaspet', 1226, 100, 0, 0, 350, 0, 75, 8, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('Pure Jaspet', 17448, 100, 0, 0, 367, 0, 78, 8, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('Pristine Jaspet', 17449, 100, 0, 0, 385, 0, 82, 8, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('Hemorphite', 1231, 100, 2200, 0, 0, 100, 120, 15, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('Vivid Hemorphite', 17444, 100, 2310, 1155, 0, 210, 105, 20, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('Radiant Hemorphite', 17445, 100, 2420, 0, 0, 110, 132, 17, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('Hedbergite', 21, 100, 0, 1100, 0, 200, 100, 19, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('Vitric Hedbergite', 17440, 100, 0, 1155, 0, 210, 105, 20, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('Glazed Hedbergite', 17441, 100, 0, 1270, 0, 220, 110, 21, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('Gneiss', 1229, 100, 0, 2200, 2400, 300, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('Iridescent Gneiss', 17865, 100, 0, 2310, 2520, 315, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('Prismatic Gneiss', 17866, 100, 0, 2420, 2640, 330, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('Dark Ochre', 1232, 100, 10000, 0, 0, 1600, 120, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('Onyx Ochre', 17436, 100, 10500, 0, 0, 1680, 126, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('Obsidian Ochre', 17437, 100, 11000, 0, 0, 1760, 132, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('Spodumain', 19, 100, 56000, 12050, 2100, 450, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('Bright Spodumain', 17466, 100, 58800, 12652, 2205, 472, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('Gleaming Spodumain', 17467, 100, 61600, 13255, 2310, 495, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('Crokite', 1225, 100, 21000, 0, 0, 0, 760, 135, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('Sharp Crokite', 17432, 100, 22050, 0, 0, 0, 798, 141, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('Crystalline Crokite', 17433, 100, 23100, 0, 0, 0, 836, 148, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('Bistot', 1223, 100, 0, 12000, 0, 0, 0, 450, 100, 0, 0, 0, 0, 0, 0, 0, 0),
('Triclinic Bistot', 17428, 100, 0, 12600, 0, 0, 0, 472, 105, 0, 0, 0, 0, 0, 0, 0, 0),
('Monoclinic Bistot', 17429, 100, 0, 13200, 0, 0, 0, 495, 110, 0, 0, 0, 0, 0, 0, 0, 0),
('Arkonor', 22, 100, 22000, 0, 2500, 0, 0, 0, 320, 0, 0, 0, 0, 0, 0, 0, 0),
('Crimson Arkonor', 17425, 100, 23100, 0, 2625, 0, 0, 0, 336, 0, 0, 0, 0, 0, 0, 0, 0),
('Prime Arkonor', 17426, 100, 24200, 0, 2750, 0, 0, 0, 352, 0, 0, 0, 0, 0, 0, 0, 0),
('Mercoxit', 11396, 100, 0, 0, 0, 0, 0, 0, 0, 300, 0, 0, 0, 0, 0, 0, 0),
('Magma Mercoxit', 17869, 100, 0, 0, 0, 0, 0, 0, 0, 315, 0, 0, 0, 0, 0, 0, 0),
('Vitreous Mercoxit', 17870, 100, 0, 0, 0, 0, 0, 0, 0, 330, 0, 0, 0, 0, 0, 0, 0),
('Blue Ice', 16264, 1, 0, 0, 0, 0, 0, 0, 0, 0, 69, 35, 0, 0, 0, 414, 1),
('Thick Blue Ice', 17975, 1, 0, 0, 0, 0, 0, 0, 0, 0, 104, 55, 0, 0, 0, 483, 1),
('Glacial Mass', 16263, 1, 0, 0, 0, 0, 0, 0, 0, 0, 69, 35, 0, 0, 414, 0, 1),
('Smooth Glacial Mass', 17977, 1, 0, 0, 0, 0, 0, 0, 0, 0, 104, 55, 0, 0, 483, 0, 0),
('White Glaze', 16265, 1, 0, 0, 0, 0, 0, 0, 0, 0, 69, 35, 414, 0, 0, 0, 1),
('Pristine White Glaze', 17976, 1, 0, 0, 0, 0, 0, 0, 0, 0, 104, 55, 483, 0, 0, 0, 1),
('Clear Icicle', 16262, 1, 0, 0, 0, 0, 0, 0, 0, 0, 69, 35, 0, 414, 0, 0, 1),
('Enriched Clear Icicle', 17978, 1, 0, 0, 0, 0, 0, 0, 0, 0, 104, 55, 0, 483, 0, 0, 0),
('Glare Crust', 16266, 1, 0, 0, 0, 0, 0, 0, 0, 0, 1381, 691, 0, 0, 0, 0, 35),
('Dark Glitter', 16267, 1, 0, 0, 0, 0, 0, 0, 0, 0, 691, 1381, 0, 0, 0, 0, 69),
('Gelidus', 16268, 1, 0, 0, 0, 0, 0, 0, 0, 0, 345, 691, 0, 0, 0, 0, 104),
('Krystallos', 16269, 1, 0, 0, 0, 0, 0, 0, 0, 0, 173, 691, 0, 0, 0, 0, 173);

--
-- Table structure for table `IceProductPrices`
--

CREATE TABLE IF NOT EXISTS `IceProductPrices` (
  `index` int(11) NOT NULL AUTO_INCREMENT,
  `Time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ItemId` int(11) DEFAULT NULL,
  `Price` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`index`),
  UNIQUE KEY `index` (`index`),
  KEY `index_2` (`index`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

--
-- Table structure for table `MineralPrices`
--

CREATE TABLE IF NOT EXISTS `MineralPrices` (
  `index` int(11) NOT NULL AUTO_INCREMENT,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ItemId` int(11) NOT NULL,
  `Price` decimal(10,2) NOT NULL,
  PRIMARY KEY (`index`),
  UNIQUE KEY `index` (`index`),
  KEY `index_2` (`index`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

--
-- Table structure for table `OrePrices`
--

CREATE TABLE IF NOT EXISTS `OrePrices` (
  `index` int(11) NOT NULL AUTO_INCREMENT,
  `Time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ItemId` int(11) DEFAULT NULL,
  `Price` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`index`),
  UNIQUE KEY `index` (`index`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

--
-- Table structure for table `PiPrices`
--

CREATE TABLE IF NOT EXISTS `PiPrices` (
  `index` int(11) NOT NULL AUTO_INCREMENT,
  `Time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ItemId` int(11) DEFAULT NULL,
  `Price` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`index`),
  UNIQUE KEY `index` (`index`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

--
-- Table structure for table `SalvagePrices`
--

CREATE TABLE IF NOT EXISTS `SalvagePrices` (
  `index` int(11) NOT NULL AUTO_INCREMENT,
  `Time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ItemId` int(5) DEFAULT NULL,
  `Price` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`index`),
  UNIQUE KEY `index` (`index`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;