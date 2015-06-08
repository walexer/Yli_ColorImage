<?php
/** @var Mage_Core_Model_Resource_Setup */
$installer = $this;

$installer->run("
    CREATE TABLE `color_image` (
    	`color` VARCHAR(20) NOT NULL,
    	`image` VARCHAR(200) NOT NULL,
    	PRIMARY KEY (`color`)
    )
    COLLATE='utf8_general_ci'
    ENGINE=InnoDB
    ;
");

$installer->endSetup();