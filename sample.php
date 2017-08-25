<?php

require_once __DIR__ . '/index.php';
use QcloudImage\CIClient;

$bucket = 'YOUR_BUCKET';

$client = new CIClient($bucket);
//可以直接在Conf.php中设置
$client->setTimeout(30);

//图片鉴黄
//单个或多个图片Url
var_dump ($client->pornDetect(array('urls'=>array('http://img3.a0bi.com/upload/ttq/20160814/1471155260063.png',"http://jiangsu.china.com.cn/uploadfile/2015/1102/1446443026382534.jpg"))));
//单个或多个图片File
var_dump ($client->pornDetect(array('files'=>array('F:\pic\你好.jpg','G:\pic\test2.jpg'))));

//图片标签
//单个图片url
var_dump ($client->tagDetect(array('url'=>'http://img3.a0bi.com/upload/ttq/20160814/1471155260063.png')));
//单个图片file
var_dump ($client->tagDetect(array('file'=>'G:\pic\hot1.jpg')));
//单个图片内容
var_dump ($client->tagDetect(array('buffer'=>file_get_contents('G:\pic\hot1.jpg'))));

//身份证识别
//单个或多个图片Url,识别身份证正面
var_dump ($client->idcardDetect(array('urls'=>array('http://imgs.focus.cn/upload/sz/5876/a_58758051.jpg', 'http://img5.iqilu.com/c/u/2013/0530/1369896921237.jpg')), 0));
//单个或多个图片file,识别身份证正面
var_dump ($client->idcardDetect(array('files'=>array('F:\pic\id6_zheng.jpg', 'F:\pic\id2_zheng.jpg')), 0));
//单个或多个图片内容,识别身份证正面
var_dump ($client->idcardDetect(array('buffers'=>array(file_get_contents('F:\pic\id6_zheng.jpg'), file_get_contents('F:\pic\id2_zheng.jpg'))), 0));

//单个或多个图片Url,识别身份证反面
var_dump ($client->idcardDetect(array('urls'=>array('http://www.csx.gov.cn/cwfw/bszn/201403/W020121030349825312574.jpg', 'http://www.4009951551.com/upload/image/20151026/1445831136187479.png')), 1));
//单个或多个图片file,识别身份证反面
var_dump ($client->idcardDetect(array('files'=>array('F:\pic\id5_fan.jpg', 'F:\pic\id7_fan.png')), 1));
//单个或多个图片内容,识别身份证反面
var_dump ($client->idcardDetect(array('buffers'=>array(file_get_contents('F:\pic\id5_fan.jpg'), file_get_contents('F:\pic\id7_fan.png'))), 1));

//名片识别
//单个或多个图片Url
var_dump ($client->namecardDetect(array('urls'=>array('http://pic1.nipic.com/2008-12-03/2008123181119306_2.jpg', 'http://pic.58pic.com/58pic/12/49/04/80k58PICzYP.jpg')), 0));
//单个或多个图片file,
var_dump ($client->namecardDetect(array('files'=>array('F:\pic\r.jpg', 'F:\pic\name2.jpg')), 1));
//单个或多个图片内容
var_dump ($client->namecardDetect(array('buffers'=>array(file_get_contents('F:\pic\name1.jpg'), file_get_contents('F:\pic\name2.jpg'))), 0));

//人脸检测
//单个图片Url, mode:1为检测最大的人脸 , 0为检测所有人脸
var_dump ($client->faceDetect(array('url'=>'http://img3.a0bi.com/upload/ttq/20160814/1471155260063.png'), 1));
//单个图片file,mode:1为检测最大的人脸 , 0为检测所有人脸
var_dump ($client->faceDetect(array('file'=>'F:\pic\face1.jpg'),0));
//单个图片内容,mode:1为检测最大的人脸 , 0为检测所有人脸
var_dump ($client->faceDetect(array('buffer'=>file_get_contents('F:\pic\face1.jpg')), 1));

//五官定位
//单个图片Url,检测最大的人脸
var_dump ($client->faceShape(array('url'=>'http://img3.a0bi.com/upload/ttq/20160814/1471155260063.png'),1));
//单个图片Url,检测所有人脸
var_dump ($client->faceShape(array('file'=>'F:\pic\face1.jpg'),0));
//单个图片Url,检测所有人脸
var_dump ($client->faceShape(array('buffer'=>file_get_contents('F:\pic\face1.jpg')), 1));


//创建一个Person，并将Person放置到group_ids指定的组当中, 使用图片url
var_dump ($client->faceNewPerson('person1111', array('group11',), array('url'=>'http://img3.a0bi.com/upload/ttq/20160814/1471155260063.png'), 'xiaoxin'));
//创建一个Person，并将Person放置到group_ids指定的组当中, 使用图片file
var_dump ($client->faceNewPerson('person2111', array('group11',), array('file'=>'F:\pic\hot1.jpg')));
//创建一个Person，并将Person放置到group_ids指定的组当中, 使用图片内容
var_dump ($client->faceNewPerson('person3111', array('group11',), array('buffer'=>file_get_contents('F:\pic\zhao1.jpg'))));


//增加人脸,将单个或者多个Face的url加入到一个Person中.注意，一个Face只能被加入到一个Person中。 一个Person最多允许包含20个Face
var_dump ($client->faceAddFace('person1111', array('urls'=>array('http://jiangsu.china.com.cn/uploadfile/2015/1102/1446443026382534.jpg','http://n.sinaimg.cn/fashion/transform/20160704/flgG-fxtspsa6612705.jpg'))));
//增加人脸,将单个或者多个Face的file加入到一个Person中.注意，一个Face只能被加入到一个Person中。 一个Person最多允许包含20个Face
var_dump ($client->faceAddFace('person2111', array('files'=>array('F:\pic\yang.jpg','F:\pic\yang2.jpg'))));
//增加人脸,将单个或者多个Face的文件内容加入到一个Person中.注意，一个Face只能被加入到一个Person中。 一个Person最多允许包含20个Face
var_dump ($client->faceAddFace('person3111', array('buffers'=>array(file_get_contents('F:\pic\yang.jpg'),file_get_contents('F:\pic\yang2.jpg')))));

//删除人脸
var_dump ($client->faceDelFace('person1', array('12346',)));
//设置信息
var_dump ($client->faceSetInfo('person1', 'fanbing'));
//获取信息
var_dump ($client->faceGetInfo('person1'));
//获取组列表
var_dump ($client->faceGetGroupIds());
//获取人列表
var_dump ($client->faceGetPersonIds('group1'));
//获取人脸列表
var_dump ($client->faceGetFaceIds('person1'));
//获取人脸信息
var_dump ($client->faceGetFaceInfo('1704147773393235686'));
//删除个人
var_dump ($client->faceDelPerson('person11'));

//人脸验证
//单个图片Url
var_dump ($client->faceVerify('person1', array('url'=>'http://img3.a0bi.com/upload/ttq/20160814/1471155260063.png')));
//单个图片file
var_dump ($client->faceVerify('person3111', array('file'=>'F:\pic\yang3.jpg')));
//单个图片内容
var_dump ($client->faceVerify('person3111', array('buffer'=>file_get_contents('F:\pic\yang3.jpg'))));

//人脸检索
//单个文件url
var_dump ($client->faceIdentify('group1', array('url'=>'http://www.5djiaren.com/uploads/2016-07/22-141354_227.jpg')));
//单个文件file
var_dump ($client->faceIdentify('group11', array('file'=>'F:\pic\yang3.jpg')));
//单个文件内容
var_dump ($client->faceIdentify('group11', array('buffer'=>file_get_contents('F:\pic\yang3.jpg'))));

//人脸对比
//两个对比图片的文件url
var_dump ($client->faceCompare(array('url'=>"http://imgsrc.baidu.com/baike/pic/item/5fdf8db1cb134954a4d833a0534e9258d0094a34.jpg"), array('url'=>'http://a-ssl.duitang.com/uploads/item/201610/29/20161029215753_5cMTX.jpeg')));
//两个对比图片的文件file
var_dump ($client->faceCompare(array('file'=>'F:\pic\yang.jpg'), array('file'=>'F:\pic\yang2.jpg')));
//两个对比图片的文件内容
var_dump ($client->faceCompare( array('buffer'=>file_get_contents('F:\pic\yang.jpg')), array('buffer'=>file_get_contents('F:\pic\yang3.jpg'))));


//身份证识别对比
//身份证url
var_dump ($client->faceIdCardCompare('330782198802084329', '季锦锦', array('url'=>'http://docs.ebdoor.com/Image/CompanyCertificate/1/16844.jpg')));
//身份证文件file
var_dump ($client->faceIdCardCompare('330782198802084329', '季锦锦', array('file'=>'F:\pic\idcard.jpg')));
//身份证文件内容
var_dump ($client->faceIdCardCompare('330782198802084329', '季锦锦', array('buffer'=>file_get_contents('F:\pic\idcard.jpg'))));


//人脸核身
//活体检测第一步：获取唇语（验证码）
$obj = $client->faceLiveGetFour();
var_dump ($obj);
$faceObj = json_decode($obj, true);
var_dump ($faceObj);
$validate_data = '';
if ($faceObj && isset($faceObj['data']['validate_data'])) {
    $validate_data = $faceObj['data']['validate_data'];
}
var_dump ($validate_data);

//活体检测第二步：检测
var_dump ($client->faceLiveDetectFour($validate_data, array('file'=>'F:\pic\ZOE_0171.mp4'), False, array('F:\pic\idcard.jpg')));
//活体检测第二步：检测--对比指定身份信息
var_dump ($client->faceIdCardLiveDetectFour($validate_data, array('file'=>'F:\pic\ZOE_0171.mp4'), '330782198802084329', '季锦锦'));

