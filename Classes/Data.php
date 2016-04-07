<?php
/**
 * Created by PhpStorm.
 * User: bilyk
 * Date: 07.04.2016
 *
 */


namespace Classes;

class Data
{


    public $file;

    static $file1 = 'data_set.txt';
    static $file2 = 'data_set_2.txt';


    public function __construct($file)
    {
        $this->file = $file;

    }

    public function get()
    {
        $result = [];
        foreach ($this->readData() as $one) {
            $result[] = (float)$one;
        }

        return $result;
    }

    private function readData()
    {

        if (file_exists($this->file)) {
            return file($this->file);
        } else {
            return [];
        }

    }


}