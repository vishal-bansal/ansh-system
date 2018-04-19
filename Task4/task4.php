<?php

include('./config.php');

Class Task4 extends Config {

    public $data;

    public function action($data) {
        $this->data = $data;
        extract($data);
        $response = $this->$method($params);
        return $response;
    }

    public function addition($params) {
        $result = 0;
        if (strlen($params)) {
            $values = explode('\\\\', $params);
            $delimiter = $values[1];
            $res = explode($delimiter, $values[2]);
            $result = array_sum($res);
        }
        
        return $result;
    }

}

$task4 = new Task4();
$result = $task4->action($data);
echo $result;
