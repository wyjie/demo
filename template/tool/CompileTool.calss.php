<?php

    /**
     * Create by yijie wang in 2015-11-20 17:22:33
     *
     * 编译器类
     * {= data} --> <?php echo $data; ?>
     */

    class CompileTool
    {
        private $template;          //待编译的文件
        private $content;           //要替换的文本
        private $comfile;           //编译后的文件
        private $left  = '{= ';     //左界定符
        private $right = '}';       //右界定符
        private $value = array();   //栈值

        //构造函数
        public function __construct($temp, $comp, $value)
        {
            $this->template = $temp;
            $this->comfile = $comp;
            $this->value = $value;
            $this->content = file_get_contents($this->template);
        }

        /**
         * 将模版内容写入到编译文件
         * @param  string $temp 模版文件
         * @param  [type] $comp 编译文件
         * @return void
         */
        public function compile()
        {
            $this->c_var();
            file_put_contents($this->comfile, $this->content);
        }

        public function c_var()
        {
            $patten = "#\{= ([a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*)\}#";

            if(strpos($this->content, $this->left) !== false)
            {
                $this->content = preg_replace($patten, "<?php echo \$this->value['\\1']; ?>", $this->content);
            }
        }

    }



 ?>
