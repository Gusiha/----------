<?php
require_once "./Device.php";
require_once "./ExportableAttribute.php";
require_once "./SchemaSerializable.php";
require_once "./CountableDevice.php";

$device = new CountableDevice(
    2,
    "cartridge",
    "HP",
    "MP-12",
    "MP-12",
    null,
    10
);

echo $device->getSchema();
