<?php
include './config.php';
require_once '../aliyun-php-sdk/aliyun-php-sdk-core/Config.php';
use vod\Request\V20170321 as vod;
function initVodClient($accessKeyId, $accessKeySecret) {
    $regionId = 'cn-shanghai';
    $profile = DefaultProfile::getProfile($regionId, $accessKeyId, $accessKeySecret);
    return new DefaultAcsClient($profile);
}
function getPlayAuth($client, $videoId) {
    $request = new vod\GetVideoPlayAuthRequest();
    $request->setVideoId($videoId);
    $request->setAuthInfoTimeout(100);
    $request->setAcceptFormat('JSON');
    $response = $client->getAcsResponse($request);
    return $response;
}
try {
    $client = initVodClient('<AccessKeyId>', '<AccessKeySecret>');
    $playAuth = getPlayAuth($client, 'videoId');
    print($playAuth->PlayAuth."\n");
    print_r($playAuth->VideoMeta);
} catch (Exception $e) {
    print $e->getMessage()."\n";
}
$client=initVodClient($accessKeyId,$accessKeySecret);
$res=getPlayAuth($client,$_POST['vid']);
print($res);