<?php

include('./config.php');

Class Task8 extends Config {

    public $data;

    public function action($data) {
        $this->data = $data;
        extract($data);
        $response = $this->$method($params);
        return $response;
    }

    public function multipication($params) {
        $result = $flag = 0;
        $delimiter = ',';
        $negative_values = [];
        if (strlen($params)) {
            $data = explode('\\\\', $params);
            if (count($data) > 1) {
                $delimiter = $data[1];
                if ($delimiter != '\n') {
                    $params = str_replace('\n', ',', $data[2]);
                } else {
                    $params = $data[2];
                }
            } else {
                $params = str_replace('\n', ',', $params);
            }

            $res = explode($delimiter, $params);
            foreach ($res as $value) {
                if ($value < 0) {
                    $negative_values[] = $value;
                }
            }
            if (count($negative_values) > 0) {
                $flag = 1;
            } else {
                foreach ($res as $key => $value) {
                    if ($value > 1000) {
                        unset($res[$key]);
                    }
                }
                $result = array_product($res);
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

$task8 = new Task8();
$result = $task8->action($data);
echo $result;
