<?php
/**
 * Created by PhpStorm.
 * User: bilyk
 * Date: 07.04.2016
 *
 */


namespace Classes;


class Main
{

    protected $data = [];

    public function __construct(Data $data)
    {
        $this->data = $data->get();
    }

    public function getMin()
    {
        $data = $this->data;
        sort($data);
        return $data[0];
    }

    public function getMax()
    {
        $data = $this->data;
        asort($data);
        return $data[0];
    }

    public function getRange()
    {
        return $this->getMax() - $this->getMin();
    }


    //Ожидание
    public function getExpectation()
    {

        if (count($this->data)) {
            return array_sum($this->data) / count($this->data);
        } else {
            return FALSE;
        }

    }

    //Дисперсия
    public function getVariance()
    {

        $result = 0;
        $mean = $this->getExpectation();


        foreach ($this->data as $one) {
            $result += ($one - $mean) * ($one - $mean);
        }

        if (count($this->data)) {
            return $result / count($this->data);
        } else {
            return FALSE;
        }
    }

    //Медиана
    public function getMediana()
    {

        sort($this->data);

        if (count($this->data) % 2 != 0) {
            return $this->data[count($this->data) / 2];

        } else {
            $med = count($this->data) / 2;
            $two = $this->data[$med];
            $one = $this->data[$med - 1];
            return ($one + $two) / 2;
        }
    }

}