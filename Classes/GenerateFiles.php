<?php
/**
 * Created by PhpStorm.
 * User: bilyk
 * Date: 07.04.2016
 *
 */

namespace Classes;


class GenerateFiles
{

    static $file1 = 'data_set.txt';
    static $file2 = 'data_set_2.txt';

    public function __construct()
    {
        $this->createDataSetFile();
        $this->createDataSet2File();

        if (!file_exists(self::$file1) OR !file_exists(self::$file2)) {
            die("Файлы не созданы, проверьте прова на директорию");
        }
    }

    private function createDataSetFile($records = 1000)
    {
        @unlink(self::$file1);
        $dataSet = '';
        for ($i = 0; $i < $records; $i++) {
            $dataSet .= rand(0, 99999999) / 100 . "\n";
        }
        file_put_contents(self::$file1, $dataSet);
    }

    private function createDataSet2File($records = 1000)
    {
        @unlink(self::$file2);
        $dataSet = '';
        for ($i = 0; $i < $records; $i++) {
            $dataSet .= rand(0, (99999999 + rand(1, 9999))) / 100 . "\n";
        }
        file_put_contents(self::$file2, $dataSet);
    }


}