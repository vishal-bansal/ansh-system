<?php

include('./config.php');

Class Task7 extends Config {

    public $data;

    public function action($data) {
        $this->data = $data;
        extract($data);
        $response = $this->$method($params);
        return $response;
    }

    public function addition($params) {
        $result = 0;
        $res = [];
        if (strlen($params)) {
            $data = explode(',', $params);
            foreach ($data as $value) {
                if ($value < 1000) {
                    $res[] = $value;
                }
            }
            if (count($res) > 0) {
                $result = array_sum($res);
            }
        }
        
        return $result;
    }

}

$task7 = new Task7();
$result = $task7->action($data);
echo $result;
