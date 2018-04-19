<?php

include('./config.php');

Class Task1 extends Config {

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
            $res = explode(',', $params);
            $result = array_sum($res);
        }
        
        return $result;
    }

}

$task1 = new Task1();
$result = $task1->action($data);
echo $result;
