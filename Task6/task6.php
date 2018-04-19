<?php

include('./config.php');

Class Task6 extends Config {

    public $data;

    public function action($data) {
        $this->data = $data;
        extract($data);
        $response = $this->$method($params);
        return $response;
    }

    function addition($params) {
        $result = $flag = 0;
        $negative_values = [];
        if (strlen($params)) {
            $data = explode('\\\\', $params);
            $delimiter = $data[1];
            $res = explode($delimiter, $data[2]);
            foreach ($res as $value) {
                if ($value < 0) {
                    $negative_values[] = $value;
                }
            }
            if (count($negative_values) > 0) {
                $flag = 1;
            } else {
                $result = array_sum($res);
            }
        }
        if ($flag == 0) {
            return $result;
        } else {
            $neg_str = implode(',', $negative_values);
            return "Error: Negative numbers {" . $neg_str . "} not allowed.";
        }
    }

}

$task6 = new Task6();
$result = $task6->action($data);
echo $result;
