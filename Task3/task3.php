<?php

include('./config.php');

Class Task3 extends Config {

    public $data;

    public function action($data) {
        $this->data = $data;
        extract($data);
        $response = $this->$method($params);
        return $response;
    }

    public function addition($params) {
        $result = 0;
        $params = str_replace('\n', ',', $params);
        $params = str_replace('n', ',', $params);
        if (strlen($params)) {
            $res = explode(',', $params);
            $result = array_sum($res);
        }
        
        return $result;
    }

}

$task3 = new Task3();
$result = $task3->action($data);
echo $result;
