<?php

    /**
     * Created by yijie wang in 2015-11-20 13:06:47
     *
     * 一个简单的模版引擎类
     */

    class TempLate
    {
        private $config      = array();             //配置信息
        private static $ins  = null;                //实例
        private $fileName    = '';                  //模版文件名
        private $errstr      = array();             //错误信息
        private $modelValue  = array();             //注入值
        private $compileTool = null;                //编译器


        /**
         * 构造函数
         */
        private final function tempLate()
        {
            define('ROOT', str_replace('\\', '/', dirname(__FILE__)) . '/');
            include(ROOT . 'tempConfig.ins');      //引入配置文件
            include(ROOT . 'tool/CompileTool.calss.php'); //引入编译器

            $this->config = $CFG;
            //实例化编译器
        }

        /**
         * 防止克隆
         */
        private function __clone()
        {

        }

        /**
         * 获取单例
         */
        public static function getIns()
        {
            if(!(self::$ins instanceof self))
            {
                self::$ins = new self();
            }

            return self::$ins;
        }

        /**
         * 设置配置,如果第一个参数是数组，键相同的会被覆盖
         */
        public function setConfig($key, $value = null)
        {
            if(is_array($key))      //如果是数组，合并
            {
                $this->config = array_merge($this->config, $key);
            }
            else
            {
                $this->config[$key] = $value;
            }
        }

        /**
         * 获取配置信息
         * @param  [String] $key [如果key == null 则取出所有配置]
         * @return [type]      [description]
         */
        public function getConfig($key = null)
        {
            //如果key != null 取出改键对应的信息，否则取出全部
            if($key)
            {
                //如果配置信息中存在改键，取出
                if(array_key_existe($key, $this->config))
                {
                    return $this->config[$key];
                }
                else
                {
                    $this->errstr['not found key'] = '不存在的key';
                }
            }
            else
            {
                return $this->config;
            }
        }

        /**
         * 注入单个变量
         * @param  string $k 模版变量名
         * @param  mixed $v 模版变量值
         * @return void
         */
        public function assign($k, $v)
        {
            $this->modelValue[$k] = $v;
        }

        /**
         * 注入数组
         * @param  array $arr
         * @return void
         */
        public function assignArray($arr)
        {
            //如果是数组，注入
            if(is_array($arr))
            {
                foreach ($arr as $key => $value)
                {
                    $this->modelValue[$key] = $value;
                }
            }
            else
            {
                $this->errstr['not found array'] = '不是一个数组';
            }
        }

        /**
         * 获取模版路径
         * @return string 模版文件绝对路径
         */
        private function path()
        {
            return ROOT . $this->config['tempLateDir'] . $this->fileName . $this->config['suffix'];
        }

        /**
         * 页面信息展示
         * @param  string $htmlName 模版文件名
         * @return void
         */
        public function display($htmlName)
        {
            //模版路径
            $this->fileName = $htmlName;

            //判断模板文件是否存在
            if(!is_file($this->path()))
            {
                $this->errstr['file not fount'] = '找不到文件';
            }
            else
            {
                //编译路径
                $compileDir = ROOT . $this->config['compileDir'] . md5($htmlName) . '.php';

                //如果文件不存在，创建之
                if(!is_file($compileDir))
                {
                    touch($compileDir);
                    //调用编译器
                    $this->compileTool = new CompileTool($this->path(), $compileDir, $this->modelValue);
                    $this->compileTool->compile();

                    //读取文件
                    readfile($compileDir);
                }
                else        //文件存在，直接读取
                {
                    readfile($compileDir);
                }
            }
        }
    }

 ?>
