<?php

namespace Jonassiewertsen\OhDear\Http\Controllers;

use Jonassiewertsen\OhDear\OhDear;

abstract class Controller {
    /**
     * @var OhDear|null
     */
    public $ohdear;

    public function __construct() {
        $this->ohdear = $this->fetchOhDear();
    }

    /**
     * Will return the OhDear instance, if the connection has been successfull
     *
     * @return OhDear|null
     */
    public function fetchOhDear() {
        $ohdear = new OhDear;

        if ($this->dataNull($ohdear)) {
            return null;
        }

        return $ohdear;
    }

    /**
     * Returning the default error view
     */
    public function errorView() {
        return response()->view('oh-dear::error.problem');
    }

    /**
     * Checking if the returned data is null
     *
     * @param $ohdear
     * @return bool
     */
    private function dataNull($ohdear) {
        return $ohdear->ohDear === null || $ohdear->site === null;
    }
}