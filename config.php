<?php

abstract Class Config {

    public function __construct() {
        global $argv, $data;
        $data['file'] = $argv[0];
        $data['method'] = $argv[1];
        $data['params'] = isset($argv[2]) ? $argv[2] : '';
    }

    abstract public function action($data);

}
