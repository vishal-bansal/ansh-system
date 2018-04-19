<?php

include('./config.php');

Class Task5 extends Config {

    public $data;

    public function action($data) {
        $this->data = $data;
        extract($data);
        $response = $this->$method($params);
        return $response;
    }

    function addition($params) {
        $result = $flag = 0;
        if (strlen($params)) {
            $data = explode('\\\\', $params);
            $delimiter = $data[1];
            $res = explode($delimiter, $data[2]);
            if (min($res) < 0) {
                $flag = 1;
            } else {
                $result = array_sum($res);
            }
        }
        if ($flag == 0) {
            return $result;
        } else {
            return "Error: Negative numbers not allowed.";
        }
    }

}

$task5 = new Task5();
$result = $task5->action($data);
echo $result;
