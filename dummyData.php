<?php

//base classes
//These are used to recreate the chunks of JSON that are presumabley used in the server
function getOpenHours(){
    $fakeOpenHours = new StdClass();
    $fakeOpenHours->day = "Monday";
    $fakeOpenHours->openfrom = strtotime('2011-01-01T15:03:01.012345Z');
    $fakeOpenHours->opento = strtotime('2011-01-01T15:03:01.012345Z');
    return $fakeOpenHours;
}

function getAddress(){
    $fakeAddress = new StdClass();
    $fakeAddress->name = "Standing Stone";
    $fakeAddress->street = "1229 Mifflin";
    $fakeAddress->city = "Huntingdon";
    $fakeAddress->state = "Pennsylvania";
    $fakeAddress->zip = "16652";
    return $fakeAddress;
}

function getLocation(){
    $fakeLocation = new StdClass();
    $fakeLocation->address = getAddress();
    $fakeLocation->name = "Standing Stone";
    $fakeLocation->longitude = 40.4936;
    $fakeLocation->latitude = 78.0169;
    $fakeLocation->openhours = getOpenHours();
    return $fakeLocation;
}

function getPrice(){
    $fakePrice = new StdClass();
    $fakePrice->pricegroup = "Admission";
    $fakePrice->value = 10.99;
    return $fakePrice;
}

function getContact(){
    $fakeContact = new StdClass();
    $fakeContact->firstname = "Jo";
    $fakeContact->lastname = "Smith";
    $fakeContact->email = "JoSmith@email.com";
    $fakeContact->fax = "322-505-6767";
    $fakeContact->phone = array("669-221-6251","444-555-6565");
    $fakeContact->address = array(getAddress(), getAddress());
    return $fakeContact;
}

function getSocial(){
    $fakeSocial = new StdClass();
    $fakeSocial->medianame = "Facebook";
    $fakeSocial->link = "https://www.facebook.com/";
    return $fakeSocial;
}

function getImage(){
    $fakeImage = new StdClass();
    $fakeImage->filetype = "png";
    $fakeImage->file = "imgs/pic.png";
    return $fakeImage;
}

//GET
//These are standins for the functions that will retrieve JSON objects from the server

function getPublicMemberInfo(){
    $fakeMemberInfo = new StdClass();
    $fakeMemberInfo->memberid = 1;
    $fakeMemberInfo->name = "Pat";
    $fakeMemberInfo->description = "generic person";
    $fakeMemberInfo->image->getImage();
    $fakeMemberInfo->category = array("cat1", "cat2", "cat3");
    $fakeMemberInfo->social = array(getSocial(), getSocial());
    $fakeMemberInfo->contact = array(getContact(), getContact());
    return json_encode($fakeMemberInfo);
}

function getPrivateMemberInfo(){
    $fakePrivateMember = json_decode(getPublicMemberInfo);
    $fakePrivateMember->email = "pat@patmail.com";
    $fakePrivateMember->subscription = false;
    return json_encode($fakePrivateMember);
}

function getEvent($id){
$fakeEvent = new StdClass();
$fakeEvent->eventid = 12;
$fakeEvent->name = "party";
$fakeEvent->hostname = "Jones";
$fakeEvent->hostid = 6;
$fakeEvent->location = getLocation();
$fakeEvent->startdatetime = strtotime('2011-01-01T15:03:01.012345Z');
$fakeEvent->enddatetime = strtotime('2011-01-01T15:03:01.012345Z');
$fakeEvent->description = "generic event";
$fakeEvent->agefrom = 18;
$fakeEvent->ageto = 81;
$fakeEvent->image = getImage();
$fakeEvent->price = array(getPrice(), getPrice());
$fakeEvent->category = array("cat4", "cat7", "cat8");
    switch($id){
        case 12:
            return json_encode($fakeEvent);
            break;
        case 13:
            $fakeEvent2 = new StdClass();
            $fakeEvent2 = $fakeEvent;
            $fakeEvent2->eventid = 13;
            return json_encode($fakeEvent2);
            break;
        default:
            return null;
    }
}

function getEventList(){
    $fakeEventList = new StdClass();
    $fakeEventList->eventlist = array(12, 13);
    return json_encode($fakeEventList);
}

?>