<?php

$fakeOpenHours->day = "Monday";
$fakeOpenHours->openfrom = 1458;
$fakeOpenHours->opento = 1558;

$fakeAddress->name = "Standing Stone";
$fakeAddress->street = "1229 Mifflin";
$fakeAddress->city = "Huntingdon";
$fakeAddress->state = "Pennsylvania";
$fakeAddress->zip = "16652";

$fakeLocation->address = $fakeAddress;
$fakeLocation->name = "Standing Stone";
$fakeLocation->longitude = 40.4936;
$fakeLocation->latitude = 78.0169;
$fakeLocation->openhours = $fakeOpenHours;

$fakePrice->pricegroup = "Admission";
$fakePrice->value = 10.99;

$fakeContact->firstname = "Jo";
$fakeContact->lastname = "Smith";
$fakeContact->email = "JoSmith@email.com";
$fakeContact->fax = "322-505-6767";
$fakeContact->phone = array("669-221-6251","444-555-6565");
$fakeContact->address = array($fakeAddress,$fakeAddress);

$fakeSocial->medianame = "Facebook";
$fakeSocial->link = "https://www.facebook.com/";

$fakeImage->filetype = "png";
$fakeImage->file = "imgs/pic.png";



?>