<?php
namespace Home\Controller;

use Think\Controller;

class TranslateController extends Controller{
    public function translate(){
        $content = $_POST['content'];
        if($content != NULL){
        
            $keyfrom = 'yyzscs';
            $key = '715345783';
            $doctype = 'json';

            $content = urlencode($content);   

            $url = "http://fanyi.youdao.com/openapi.do?keyfrom=".$keyfrom."&key=".$key."&type=data&doctype=".$doctype."&version=1.1&q=".$content;

            $list = file_get_contents($url);
            $new_content = json_decode($list,true);
            $this->ajaxReturn($new_content,'JSON');
        }else{
            echo "Nothing!";
        }
    }
}