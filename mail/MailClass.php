<?php

    //socket 发送邮件
    class Mail
    {
        private $host;
        private $port;
        private $user;
        private $pass;
        private $debug       = false;   //是否调试模式, 默认否
        private $sock;                  //保存socket连接的句柄
        private $mail_format = 0;       //发送的邮件格式

        /**
         * Mail constructor.
         * @param $host
         * @param $port
         * @param $user
         * @param $pass
         * @param int $format
         * @param bool|false $debug
         */
        function mail($host, $port, $user, $pass, $format = 1, $debug = false)
        {
            $this->host        = $host;
            $this->port        = $port;
            $this->user        = base64_encode($user);
            $this->pass        = base64_encode($pass);
            $this->debug       = $debug;
            $this->mail_format = $format;

            $this->sock = fsockopen($this->host, $this->port, $errno, $errstr, 10);

            if(!$this->sock)
            {
                exit("获取连接失败");
            }

            $response = fgetc($this->sock);

            if(strstr($response, "220") === false)       //判断返回信息中是否存在220
            {
                exit('连接服务器失败');
            }
        }

        //debug
        private function show_debug($message)
        {
            if($this->debug)
            {
                echo "<p>DEBUG: ". $message ."</p>";
            }
        }

        //把命令发送到服务器
        private function do_command($cmd, $return_code)
        {
            //向打开的socket连接中写命令
            fwrite($this->sock, $cmd);

            $response = fgetc($this->sock);

            if(strstr($response, "$return_code") === false)
            {
                $this->show_debug($response);

                return false;
            }

            return true;
        }

        //验证邮箱的合法性
        private function is_email($email)
        {
            $pattren = "/^[^_][\w]*@[\w.]+[\w]*[^_]$/";
            if(preg_match($pattren, $email, $matches))
            {
                return true;
            }
            else
            {
                return false;
            }
        }

        /**
         * 发送邮件
         * @param $from [String]    [发件人]
         * @param $to [String]    [收件人]
         * @param $subject [String]    [主题]
         * @param $body [String]    [邮件内容]
         * @return bool
         */
        public function send_mail($from, $to, $subject, $body)
        {
            //判断邮箱是否合法
            if(!$this->is_email($from) OR !$this->is_email($to))
            {
                $this->show_debug("请检查邮箱格式是否正确");

                return false;
            }

            if(empty($subject) or empty($body))
            {
                $this->show_debug("主题或邮件内容不合法");

                return false;
            }

            $detail  = "From:".$from."\r\n";
            $detail .= "To:".$to."\r\n";
            $detail .= "Subject:".$subject."\r\n";

            if($this->mail_format == 1)
            {
                $detail .= "Content-Type: text/html; \r\n";
            }
            else
            {
                $detail .= "Content-Type: text/plain; \r\n";
            }

            $detail .= "charset=gb2312\r\n\r\n";
            $detail .= $body;

            //发送命令
            $this->do_command("HELO smtp.qq.com\r\n", 250);
            $this->do_command("AUTH LOGIN\r\n", 334);
            $this->do_command($this->user."\r\n", 334);
            $this->do_command($this->pass."\r\n", 235);
            $this->do_command("MAIL FROM:<" . $from . ">\r\n", 250);
            $this->do_command("RCPT TO:<". $to .">\r\n", 250);
            $this->do_command("DATA\r\n", 354);
            $this->do_command($detail."\r\n\r\n", 250);
            $this->do_command("QUIT\r\n", 221);

            return true;
        }

    }

    //@Test
    $host    = "smtp.qq.com";
    $port    = "25";
    $user    = "863979265";
    $pass    = "flzx_3QC";

    $from    = "863979265@qq.com";
    $to      = "world_er@hotmail.com";

    $subject = "hello";
    $body    = "world";

    $mail    = new Mail($host, $port, $user, $pass);
    $mail->send_mail($from, $to, $subject, $body);

 ?>
