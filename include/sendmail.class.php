<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2016/1/13
 * Time: 13:18
 */

/**
 * 发送邮件类
 *
 * @author         xingchao<1363688001@qq.com>
 * @since          1.0
 */
class SEND_EMAIL{

    public $smtpserver = "smtp.126.com";//SMTP服务器

    public $smtpserverport =25; //ssl               //SMTP服务器端口

//    public $smtpusermail = "1815824944@qq.com";//SMTP服务器的用户邮箱
    public $smtpusermail = "xing_chaohaohao@126.com";//SMTP服务器的用户邮箱

    public $smtpuser = "xing_chaohaohao@126.com";//SMTP服务器的用户帐号

    public $smtppass = "DB.cooper";    //SMTP服务器的用户密码

    public $mailtype = "HTML";                //邮件格式（HTML/TXT）,TXT为文本邮件

    public $smtpemailto;

    public $mailcontent;

    public $flag; //是否是测试

    public $mails;





    /**
     * send
     * 发送邮件     *
     * @access public
     * @since 1.0
     * @return string
     */
    public function send($DATA){

            $this -> mailcontent =  $DATA ;//邮件内容

            //************************ 配置信息 ****************************
            $smtp = new smtp($this -> smtpserver,$this -> smtpserverport,true,$this -> smtpuser,$this -> smtppass);//这里面的一个true是表示使用身份验证,否则不使用身份验证.

            $smtp->debug = false;   //是否显示发送的调试信息

            $state = $smtp->sendmail($this -> smtpemailto, $this ->smtpusermail, "报单通知", $this ->mailcontent, $this ->mailtype);

            if($state==""){

//                echo 'send failed'."对不起，邮件发送失败！请检查邮箱填写是否有误。". '<br>';

                exit();

            }

//            echo 'send sucess'.'恭喜！邮件发送给'.$this -> smtpemailto.'成功！！'. '<br>';

        }


}

?>