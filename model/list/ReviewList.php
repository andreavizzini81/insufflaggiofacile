<?php

class ReviewList extends EntityList {

    protected const ENTITY = 'review';

    public function _nameParam($value) {
        $name = (string)$value;
        if($name == null || $name == ''){
            return '0 = 1';
        }
        return sprintf('name  = \'%s\' ', $this->db->escape($name));
    }

    public function _cityParam($value) {
        $city = (string)$value;
        if($city == null || $city == ''){
            return '0 = 1';
        }
        return sprintf('city  = \'%s\' ', $this->db->escape($city));
    }

    public function _dateParam($value) {
        $date = Utils::normalizeDate($value);
        if($date == ''){
            return '0 = 1';
        }
        return sprintf('date  = \'%s\' ', $this->db->escape($date));
    }

    public function _channelParam($value) {
        $channel = (int)$value;
        if ($channel <= 0) {
            return '0 = 1';
        }
        return sprintf('channel = %d ', $channel);
    }

    public function _scoreParam($value) {
        $score = (int)$value;
        if ($score <= 0) {
            return '0 = 1';
        }
        return sprintf('score = %d ', $score);
    }

}