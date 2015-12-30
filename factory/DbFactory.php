<?php

    /**
     * Created by yijie wang on 2015-11-13 18:03:09
     *
     * Db工厂
     */
    class DbFactory
    {
        private $dbName;

        public function __construct($dbName)
        {
            $this->dbName = $dbName;
        }

        public function getDb()
        {
            try
            {
                if(include_once($this->dbName . '.php'))
                {

                    return call_user_func($this->dbName . '::' . getIns());
                }
                else
                {
                    throw new Exception();
                }
            }
            catch(Exception $e)
            {
                echo "error";
            }
        }
    }

 ?>
