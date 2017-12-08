<?php

//base classes

$fakeOpenHours->day = "Monday";
$fakeOpenHours->openfrom = DateTime('2011-01-01T15:03:01.012345Z');
$fakeOpenHours->opento = DateTime('2011-01-01T15:03:01.012345Z');

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

//GET

$fakeMemberInfo->memberid = 1;
$fakeMemberInfo->name = "Pat";
$fakeMemberInfo->description = "generic person";
$fakeMemberInfo->image->$fakeImage;
$fakeMemberInfo->category = array("cat1", "cat2", "cat3");
$fakeMemberInfo->social = array($fakeSocial, $fakeSocial);
$fakeMemberInfo->contact = array($fakeContact, $fakeContact);

function getPrivateMemberInfo(){
    $fakePrivateMember = $fakeMemberInfo;
    $fakePrivateMember->email = "pat@patmail.com";
    $fakePrivateMember->subscription = false;
    return json_encode($fakePrivateMember);
}

function getPublicMemberInfo(){
    return json_encode($fakeMemberInfo);
}

$fakeEvent->eventid = 12;
$fakeEvent->name = "party";
$fakeEvent->hostname = "Jones";
$fakeEvent->hostid = 6;
$fakeEvent->location = $fakeLocation;
$fakeEvent->startdatetime = DateTime('2011-01-01T15:03:01.012345Z');
$fakeEvent->enddatetime = DateTime('2011-01-01T15:03:01.012345Z');
$fakeEvent->description = "generic event";
$fakeEvent->agefrom = 18;
$fakeEvent->ageto = 81;
$fakeEvent->image = $fakeImage;
$fakeEvent->price = array($fakePrice, $fakePrice);
$fakeEvent->category = array("cat4", "cat7", "cat8");

function getEvent(){
    return json_encode($fakeEvent);
}

?>