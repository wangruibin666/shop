<?php 
	//验证码函数
	function vcode(){
		
		
     session_start();
 
    //默认返回的是黑色的照片
    $image = imagecreatetruecolor(214, 30);
    //将背景设置为白色的
    $bgcolor = imagecolorallocate($image, 255, 255, 255);
    //将白色铺满地图
    imagefill($image, 0, 0, $bgcolor);
 
    //空字符串，每循环一次，追加到字符串后面  
    $captch_code='';
 
   //验证码为随机四个数字
    for ($i=0; $i < 4; $i++) { 
    	$fontsize=6;
    	$fontcolor=imagecolorallocate($image,rand(0,120),rand(0,120),rand(0,120));
    	
        //产生随机数字0-9
    	$fontcontent = rand(0,9);
    	$captch_code.= $fontcontent;
       //数字的位置，0，0是左上角。不能重合显示不完全
    	$x=($i*214/4)+rand(5,10);
    	$y=rand(5,10);
     	imagestring($image,$fontsize,$x,$y,$fontcontent,$fontcolor);
    }
      
 
  
   $_SESSION['authcode'] = $captch_code;
//为验证码增加干扰元素，控制好颜色，
//点   
    for ($i=0; $i < 200; $i++) { 
    	$pointcolor = imagecolorallocate($image,rand(50,200),rand(50,200),rand(50,200));
    	imagesetpixel($image, rand(1,213), rand(1,29), $pointcolor);
    }
 
//为验证码增加干扰元素
//线   
    for ($i=0; $i < 3; $i++) { 
    	$linecolor = imagecolorallocate($image,rand(80,220),rand(80,220),rand(80,220));
    	imageline($image, rand(1,213), rand(1,29),rand(1,213), rand(1,29) ,$linecolor);
    }
 
    header('content-type:image/png');
	imagepng($image);
 
    //销毁
    imagedestroy($image);


	}



    //图片缩放函数
    function thumb($simg,$dw,$dh){
        //原图大小
        $arr = getimagesize($simg);
        $sw = $arr[0];
        $sh = $arr[1];
        $st = $arr[2];
        $sm = $arr['mime'];

        switch($st){
            case 1;
                $imagecreate = "imagecreatefromgif";
                $imageout = "imagegif";
                break;
            case 2;
                $imagecreate = "imagecreatefromjpeg";
                $imageout = "imagejpeg";
                break;
            case 3;
                $imagecreate = "imagecreatefrompng";
                $imageout = "imagepng";
                break;

        }

        //原图和目标图片资源
         $simgr = $imagecreate($simg);

         //等比例计算
         if($sw/$dw/$sh/$dh){
            $b = $sw/$dw;

         }else{
            $b = $sh/$dh;
         }

         $dw2 = floor($sw/$b);
         $dh2 = floor($sh/$b);

         //目标图片资源
         $dimgr = imagecreatetruecolor($dw2, $dh2);

         //开始缩放
         imagecopyresampled($dimgr, $simgr, 0, 0, 0, 0, $dw2, $dh2, $sw, $sh);

        //保存到与原图同一个目录下
         $dir = dirname($simg);

         $file = basename($simg);
         $save = $dir.'/'.'thumb_'.$file;
         $imageout($dimgr,$save);

    }
 ?>