<?php

    /**
     * Http工具类
     */
    class HttpUtils
    {
        /**
         * 抓取远程文件
         * @param  [string] $remote [远程文件路径]
         * @param  [string] $local  [本地保存路径]
         * @return mixed
         */
        static public function curlDownload($remote, $local)
        {
            //初始化，设置URL为$remote
            $cp = curl_init($remote);
            //设置头不输出
            curl_setopt($cp, CURLOPT_HEADER, 0);

            $optput = curl_exec($cp);

            //执行是否失败
            if($optput === false)
            {
                curl_close($cp);
                return false;
            }

            curl_close($cp);

            file_put_contents($local, $optput);

            //获取curl详细
            $info = curl_getinfo($cp);

            if(filesize($local) != $info['size_download'])
            {
                echo '数据抓取不完整';

                return false;
            }

            return true;
        }
    }

 ?>

 class Excel {

    /**
     * 读取一个excel并把内容放入到一个数组中
     * @param string $excel_file
     * @param integer $sheet_id
     * @param array $headers
     * @return array 
     */
    public function readExcel($excel_file, $sheet_id, $headers, $contain_all_column = true) {
        $excel_type = PHPExcel_IOFactory::identify($excel_file);
        $excel_reader = PHPExcel_IOFactory::createReader($excel_type);
        if(method_exists($excel_reader, "setReadDataOnly")) {
            $excel_reader->setReadDataOnly(true);
        }
        $excel = $excel_reader->load($excel_file);
        $count = $excel->getSheetCount();
        if($count< $sheet_id) {
            return "无效的excel，工作表个数不对";
        } else {
            $sheet = $excel->getSheet($sheet_id);
            $data = self::readSheet($sheet, $headers, $contain_all_column);
            return $data;
        }
    }
    
    private static function readSheet($sheet, $headers, $contain_all_column) {
        $contents = array();
        $index = 0;
        $header_seq = array();
        $column_seq = array();
        foreach ($sheet->getRowIterator() as $row) {
            $cellIterator = $row->getCellIterator();
            foreach ($cellIterator as $column => $cell) {
                if ($index == 0) {
                    $header = $cell->getValue();
                    
                    if(in_array($header, $headers)) {
                        $header_seq[] = $header;
                        $column_seq[] = $column;
                    } else {
                        if($contain_all_column == true) {
                            return "excel文件格式不对，无法识别的列" . $header;
                        } else {
                            continue;
                        }
                    }
                } else if(in_array($column, $column_seq)){
                    $contents[$index][] = $cell->getValue();
                }
            }
            $index++;
        }
        return array('headers' => $header_seq, 'contents' => $contents);
    }
}

