<?php
set_time_limit(0);
date_default_timezone_set('UTC');
require __DIR__.'/../vendor/autoload.php';
/////// CONFIG ///////
$username = '';
$password = '';
$debug = true;
$truncatedDebug = false;
$videoFilename = '';
$captionText = '';
//////////////////////
$ig = new \InstagramAPI\Instagram($debug, $truncatedDebug);
try {
    $ig->login($username, $password);
} catch (\Exception $e) {
    echo '������: '.$e->getMessage()."\n";
    exit(0);
}
try {

    $video = new \InstagramAPI\Media\Video\InstagramVideo($videoFilename);
    $ig->timeline->uploadVideo($video->getFile(), ['caption' => $captionText]);
} catch (\Exception $e) {
    echo '������: '.$e->getMessage()."\n";
}