<?php
session_start();
include './config.php';
require_once '../aliyun-php-sdk/aliyun-php-sdk-core/Config.php';
use vod\Request\V20170321 as vod;
function initVodClient($accessKeyId, $accessKeySecret) {
    $regionId = $_SESSION["region"];
    $profile = DefaultProfile::getProfile($regionId, $accessKeyId, $accessKeySecret);
    return new DefaultAcsClient($profile);
}
function getPlayAuth($client, $videoId) {
    $request = new vod\GetVideoPlayAuthRequest();
    $request->setVideoId($videoId);
    $request->setAuthInfoTimeout(120);
    $request->setAcceptFormat('JSON');
    $response = $client->getAcsResponse($request);
    return $response;
}
try {
    $client = initVodClient($accessKeyId, $accessKeySecret);
    $playAuth = getPlayAuth($client, $_POST['vid']);
    print($playAuth->PlayAuth);
    //print_r($playAuth->VideoMeta);
} catch (Exception $e) {
    print $e->getMessage()."\n";
}