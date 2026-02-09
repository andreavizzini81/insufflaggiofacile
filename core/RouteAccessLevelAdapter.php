<?php

trait RouteAccessLevelAdapter {

    private ?AccessLevel $accessLevel;

    public function withAccessLevel(AccessLevel $accessLevel) :self {
        $this->accessLevel = $accessLevel;
        return $this;
    }

    public function getAccessLevel() :?AccessLevel {
        return $this->accessLevel;
    }

}