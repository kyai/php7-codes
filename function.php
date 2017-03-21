<?php

// 判断是否手机访问
function is_mobile_request(){
    $_SERVER['ALL_HTTP'] = isset($_SERVER['ALL_HTTP']) ? $_SERVER['ALL_HTTP'] : '';
    $mobile_browser = '0';
    if(preg_match('/(up.browser|up.link|mmp|symbian|smartphone|midp|wap|phone|iphone|ipad|ipod|android|xoom)/i',strtolower($_SERVER['HTTP_USER_AGENT'])))
    $mobile_browser++;
    if((isset($_SERVER['HTTP_ACCEPT'])) and (strpos(strtolower($_SERVER['HTTP_ACCEPT']),'application/vnd.wap.xhtml+xml') !== false))
    $mobile_browser++;
    if(isset($_SERVER['HTTP_X_WAP_PROFILE']))
    $mobile_browser++;
    if(isset($_SERVER['HTTP_PROFILE']))
    $mobile_browser++;
    $mobile_ua = strtolower(substr($_SERVER['HTTP_USER_AGENT'],0,4));
    $mobile_agents = array(
    'w3c ','acs-','alav','alca','amoi','audi','avan','benq','bird','blac',
    'blaz','brew','cell','cldc','cmd-','dang','doco','eric','hipt','inno',
    'ipaq','java','jigs','kddi','keji','leno','lg-c','lg-d','lg-g','lge-',
    'maui','maxo','midp','mits','mmef','mobi','mot-','moto','mwbp','nec-',
    'newt','noki','oper','palm','pana','pant','phil','play','port','prox',
    'qwap','sage','sams','sany','sch-','sec-','send','seri','sgh-','shar',
    'sie-','siem','smal','smar','sony','sph-','symb','t-mo','teli','tim-',
    'tosh','tsm-','upg1','upsi','vk-v','voda','wap-','wapa','wapi','wapp',
    'wapr','webc','winw','winw','xda','xda-'
    );
    if(in_array($mobile_ua, $mobile_agents))
    $mobile_browser++;
    if(strpos(strtolower($_SERVER['ALL_HTTP']), 'operamini') !== false)
    $mobile_browser++;
    // Pre-final check to reset everything if the user is on Windows
    if(strpos(strtolower($_SERVER['HTTP_USER_AGENT']), 'windows') !== false)
    $mobile_browser=0;
    // But WP7 is also Windows, with a slightly different characteristic
    if(strpos(strtolower($_SERVER['HTTP_USER_AGENT']), 'windows phone') !== false)
    $mobile_browser++;
    if($mobile_browser>0)
    return true;
    else
    return false;
}

//获取系统版本
function getOS(){
    $os='';
    $Agent=$_SERVER['HTTP_USER_AGENT'];
    if (eregi('win',$Agent)&&strpos($Agent, '95')){
        $os='Windows 95';
    }elseif(eregi('win 9x',$Agent)&&strpos($Agent, '4.90')){
        $os='Windows ME';
    }elseif(eregi('win',$Agent)&&ereg('98',$Agent)){
        $os='Windows 98';
    }elseif(eregi('win',$Agent)&&eregi('nt 5.0',$Agent)){
        $os='Windows 2000';
    }elseif(eregi('win',$Agent)&&eregi('nt 6.0',$Agent)){
        $os='Windows Vista';
    }elseif(eregi('win',$Agent)&&eregi('nt 6.1',$Agent)){
        $os='Windows 7';
    }elseif(eregi('win',$Agent)&&eregi('nt 5.1',$Agent)){
        $os='Windows XP';
    }elseif(eregi('win',$Agent)&&eregi('nt',$Agent)){
        $os='Windows NT';
    }elseif(eregi('win',$Agent)&&ereg('32',$Agent)){
        $os='Windows 32';
    }elseif(eregi('linux',$Agent)){
        $os='Linux';
    }elseif(eregi('unix',$Agent)){
        $os='Unix';
    }else if(eregi('sun',$Agent)&&eregi('os',$Agent)){
        $os='SunOS';
    }elseif(eregi('ibm',$Agent)&&eregi('os',$Agent)){
        $os='IBM OS/2';
    }elseif(eregi('Mac',$Agent)&&eregi('PC',$Agent)){
        $os='Macintosh';
    }elseif(eregi('PowerPC',$Agent)){
        $os='PowerPC';
    }elseif(eregi('AIX',$Agent)){
        $os='AIX';
    }elseif(eregi('HPUX',$Agent)){
        $os='HPUX';
    }elseif(eregi('NetBSD',$Agent)){
        $os='NetBSD';
    }elseif(eregi('BSD',$Agent)){
        $os='BSD';
    }elseif(ereg('OSF1',$Agent)){
        $os='OSF1';
    }elseif(ereg('IRIX',$Agent)){
        $os='IRIX';
    }elseif(eregi('FreeBSD',$Agent)){
        $os='FreeBSD';
    }elseif($os==''){
        $os='Unknown';
    }
    return $os;
}