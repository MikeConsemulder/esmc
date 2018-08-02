<?php
/* Template Name: ical-template1 */
/**
 * Created by PhpStorm.
 * User: Mike
 * Date: 05-Dec-16
 * Time: 15:19
 */

//generate Ical for the activiteiten

// Variables used in this script:
//   $summary     - text title of the event
//   $datestart   - the starting date (in seconds since unix epoch)
//   $dateend     - the ending date (in seconds since unix epoch)
//   $address     - the event's address
//   $uri         - the URL of the event (add http://)
//   $description - text description of the event
//   $filename    - the name of this file for saving (e.g. my-event-name.ics)
//
// Notes:
//  - the UID should be unique to the event, so in this case I'm just using
//    uniqid to create a uid, but you could do whatever you'd like.
//
//  - iCal requires a date format of "yyyymmddThhiissZ". The "T" and "Z"
//    characters are not placeholders, just plain ol' characters. The "T"
//    character acts as a delimeter between the date (yyyymmdd) and the time
//    (hhiiss), and the "Z" states that the date is in UTC time. Note that if
//    you don't want to use UTC time, you must prepend your date-time values
//    with a TZID property. See RFC 5545 section 3.3.5
//
//  - The Content-Disposition: attachment; header tells the browser to save/open
//    the file. The filename param sets the name of the file, so you could set
//    it as "my-event-name.ics" or something similar.
//
//  - Read up on RFC 5545, the iCalendar specification. There is a lot of helpful
//    info in there, such as formatting rules. There are also many more options
//    to set, including alarms, invitees, busy status, etc.
//
//      https://www.ietf.org/rfc/rfc5545.txt
// 1. Set the correct headers for this file
$summary = "samenvatting";
$datestart = 1481036400;
$dateend = 1481045400;
$address = "Schietbergen 97";
$uri = "www.esmc.nl";
$description = "Uitleg shizzle";
$filename = "evenementKalender";
header('Content-type: text/calendar; charset=utf-8');
header('Content-Disposition: attachment; filename=' . $filename . ".ics");
// 2. Define helper functions
// Converts a unix timestamp to an ics-friendly format
// NOTE: "Z" means that this timestamp is a UTC timestamp. If you need
// to set a locale, remove the "\Z" and modify DTEND, DTSTAMP and DTSTART
// with TZID properties (see RFC 5545 section 3.3.5 for info)
//
// Also note that we are using "H" instead of "g" because iCalendar's Time format
// requires 24-hour time (see RFC 5545 section 3.3.12 for info).
function dateToCal($timestamp){

	return date('Ymd\THis\Z', $timestamp);
}

// Escapes a string of characters
function escapeString($string){

	return preg_replace('/([\,;])/', '\\\$1', $string);
}

// 3. Echo out the ics file's contents
?>

BEGIN:VCALENDAR
VERSION:2.0
PRODID:-//hacksw/handcal//NONSGML v1.0//EN
CALSCALE:GREGORIAN
BEGIN:VEVENT
DTEND:<?= dateToCal($dateend) ?>
UID:<?= uniqid() ?>
DTSTAMP:<?= dateToCal(time()) ?>
LOCATION:<?= escapeString($address) ?>
DESCRIPTION:<?= escapeString($description) ?>
URL;VALUE=URI:<?= escapeString($uri) ?>
SUMMARY:<?= escapeString($summary) ?>
DTSTART:<?= dateToCal($datestart) ?>
END:VEVENT
END:VCALENDAR

BEGIN:VCALENDAR
PRODID:-//Google Inc//Google Calendar 70.9054//EN
VERSION:2.0
CALSCALE:GREGORIAN
METHOD:PUBLISH
X-WR-CALNAME:ESMC Activiteiten
X-WR-TIMEZONE:Europe/Amsterdam
X-WR-CALDESC:Alle activiteiten met betrekking tot ESMC!
BEGIN:VTIMEZONE
TZID:Europe/Amsterdam
X-LIC-LOCATION:Europe/Amsterdam
BEGIN:DAYLIGHT
TZOFFSETFROM:+0100
TZOFFSETTO:+0200
TZNAME:CEST
DTSTART:19700329T020000
RRULE:FREQ=YEARLY;BYMONTH=3;BYDAY=-1SU
END:DAYLIGHT
BEGIN:STANDARD
TZOFFSETFROM:+0200
TZOFFSETTO:+0100
TZNAME:CET
DTSTART:19701025T030000
RRULE:FREQ=YEARLY;BYMONTH=10;BYDAY=-1SU
END:STANDARD
END:VTIMEZONE
BEGIN:VEVENT
DTSTART:20161220T000000Z
DTSTAMP:20161206T095435Z
UID:3k239m8q4e33sb4h74prkqeojg@google.com
CREATED:20161128T100804Z
DESCRIPTION:Hallo ESMC-ers\,\n\nBen jij een adrenaline-junkie en hou je er
van om lijpe dingen te doen? Dan ben je een echte ESMC-er en is dit het eve
nement voor jou!\n\nOp dinsdag! 20-12-16 gaan we Bounceballen bij het ijssp
ortcentrum Eindhoven\, op het ijs! Omdat iedereen hier natuurlijk superveel
zin in heeft melden we ons massaal aan zodat we het minimaal aantal inschr
ijvingen meteen halen 😉\n\nZodra het X aantal is behaald kunnen we pas res
erveren dus de exacte tijd op de avond krijgen jullie nog te horen.\n\nGraa
g tot dan\,\n\nDe organisatie\n\n \n\nPS.\nZie https://ijssportcentrum.nl/b
ounceball voor informatie\nprijs per persoon -> 12\,50 per uur
LAST-MODIFIED:20161128T100804Z
LOCATION:IJssportcentrum Eindhoven\, Antoon Coolenlaan 3\, 5644 RX Eindhove
n\, Nederland
SEQUENCE:0
STATUS:CONFIRMED
SUMMARY:Bounceball on ice
TRANSP:OPAQUE
END:VEVENT
END:VCALENDAR