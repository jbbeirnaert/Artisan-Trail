<?php

//BASE CLASSES
//These are used to recreate the chunks of JSON that are presumabley used in the server
//fake generic openhours object
function getOpenHours(){
    $fakeOpenHours = new StdClass();
    $fakeOpenHours->day = "Monday";
    $fakeOpenHours->openfrom = strtotime('2011-01-01T15:03:01.012345Z');
    $fakeOpenHours->opento = strtotime('2011-01-01T15:03:01.012345Z');
    return $fakeOpenHours;
}
//fake generic address object
function getAddress(){
    $fakeAddress = new StdClass();
    $fakeAddress->name = "Standing Stone";
    $fakeAddress->street = "1229 Mifflin";
    $fakeAddress->city = "Huntingdon";
    $fakeAddress->state = "Pennsylvania";
    $fakeAddress->zip = "16652";
    return $fakeAddress;
}
//fake generic location object
function getLocation(){
    $fakeLocation = new StdClass();
    $fakeLocation->address = getAddress();
    $fakeLocation->name = "Standing Stone";
    $fakeLocation->latitude = 40.493856;
    $fakeLocation->longitude = -78.016890;
    $fakeLocation->openhours = getOpenHours();
    return $fakeLocation;
}
//fake generic price object
function getPrice(){
    $fakePrice = new StdClass();
    $fakePrice->pricegroup = "Admission";
    $fakePrice->value = 10.99;
    return $fakePrice;
}
//fake generic contact object
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
//fake generic social object
function getSocial(){
    $fakeSocial = new StdClass();
    $fakeSocial->medianame = "Facebook";
    $fakeSocial->link = "https://www.facebook.com/";
    return $fakeSocial;
}
//fake generic image object
//note that this goes largely unused because the docs state that
//the database is not currently equipped to handle images
function getImage(){
    $fakeImage = new StdClass();
    $fakeImage->filetype = "png";
    $fakeImage->file = "imgs/pic.png";
    return $fakeImage;
}
//END BASE CLASSES

//STANDIN//
//These are standins for the functions that will access the server
//GET
function getPublicMemberInfo($id){
    $fakeMemberInfo = new StdClass();
    $fakeMemberInfo->memberid = $id;
    $fakeMemberInfo->name = "Pat";
    $fakeMemberInfo->description = "generic person";
    $fakeMemberInfo->image = getImage();
    $fakeMemberInfo->category = array("cat1", "cat2", "cat3");
    $fakeMemberInfo->social = array(getSocial(), getSocial());
    $fakeMemberInfo->contact = array(getContact(), getContact());
    switch($id){
        case 6:
        case 42:
        case 43:
            return json_encode($fakeMemberInfo);
        default:
            return null;
            break;
    }
}

function getPrivateMemberInfo($id){
    $fakePrivateMember = new StdClass();
    //This call was a shortcut
    $fakePrivateMember = json_decode(getPublicMemberInfo($id));
    $fakePrivateMember->email = "pat@patmail.com";
    $fakePrivateMember->subscription = false;
        switch($id){
        case 6:
        case 43:
            return json_encode($fakePrivateMember);
            break;
        case 42:
            $fakePrivateMember->memberid = 42;
            return json_encode($fakePrivateMember);
        default:
            return null;
            break;
    }
}
//The ids were used so we could simulate multiple events
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
            $fakeEvent2->name = "concert";
            return json_encode($fakeEvent2);
            break;
        default:
            return null;
    }
}
//returns list of event IDs
function getEventList(){
    $fakeEventList = new StdClass();
    $fakeEventList->eventlist = array(12, 13);
    return json_encode($fakeEventList);
}

//POST
//takes object from CreateNewUser and turns into JSON for server
//each function has a direct argument version and a from PHP object version
function createNewMemberFromObject($fakeMemberObject){
    if($fakeMemberObject->password == null
        ||$fakeMemberObject->email == null
        ||$fakeMemberObject->member == null
        ||$fakeMemberObject->member->name == null
        ||$fakeMemberObject->member->description == null
    ){
        return "error";
    }else {
    $fakeMemberObject->memberid = 6;    //This would actually be generated by the server
    $fakeMemberObject = json_encode($fakeMemberObject);
    //SEVER STUFF:
    return getPrivateMemberInfo(json_decode($fakeMemberObject)->memberid);
    }
}

function createNewMember($email, $password, $name, $description,
 $subscription=null, $coverimage=null, $cats=null, $social=null,
 $social=null, $contact=null){
    $tempMember = new StdClass();
    $tempMember->email = $email;
    $tempMember->password = $password;
    $tempMember->member = new StdClass();
    $tempMember->member->name = $name;
    $tempMember->member->description = $description;
    $tempMember->member->subscription = $subscription;
    $tempMember->member->category = $cats;
    $tempMember->member->social = $social;
    $tempMember->member->contact = $contact;

    createNewMemberFromObject($tempMember);
}

function createNewEventFromObject($event){
    //none of these should be null in the final version
    if($event->name == null
        ||$event->location == null
        ||$event->startdatetime == null
        ||$event->enddatetime == null
        ||$event->description == null
        //||$event->agefrom == null
        //||$event->ageto == null
    ){
        return "error";
    }else {
        $event->eventid = 12; //the server would do this
        $event = json_encode($event);
        //SEVER STUFF:
        return getEvent(json_decode($event)->eventid);
    }
}

//none of these should be null in the final code
//with the exception of $price which is optional
//note that email and password need to come from somewhere
//but password cannot be retrieved from the database 
//We did not want to save the password in a cookie or session
//Therefore the only option is to have the user reenter their email
//and password as they enter a new event
function createNewEvent($email=null, $password=null, $name,
    $addrName=null, $street=null, $city=null, $state=null, $zip=null,
    $locName, $longitude, $latitude, $day=null,
    $openfrom=null, $opento=null, $start, $end, $description,
    $agefrom=null, $ageto=null, $price){

    $tempEvent = new StdClass();
    $tempEvent->name = $name;
    $tempEvent->location = new StdClass();
    $tempEvent->location->address = new StdClass();
    $tempEvent->location->address->name = $addrName;
    $tempEvent->location->address->longitude = $longitude;
    $tempEvent->location->address->latitude = $latitude;
    $tempEvent->location->address->openhours = new StdClass();
    $tempEvent->location->address->openhours->day = $day;
    $tempEvent->location->address->openhours->openfrom = $openfrom;
    $tempEvent->location->address->openhours->opento = $opento;
    $tempEvent->startdatetime = $start;
    $tempEvent->enddatetime = $end;
    $tempEvent->description = $description;
    $tempEvent->agefrom = $agefrom;
    $tempEvent->ageto = $ageto;
    $tempEvent->price = new StdClass();
    $tempEvent->price->value = $price;

    createNewEventFromObject($tempEvent);
}
?>