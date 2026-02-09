<?php

class Preload extends BaseComponent {

    private array $makes = [];
    private array $models = [];
    private array $agencies = [];

    public function __construct() {
        parent::__construct();
    }

    public function getMakes() {
        if (empty($this->makes)) {
            $makes = (new MakeList([], true, Make::class))->getAll();
            foreach($makes as $make) {
                $this->makes[$make->getId()] = $make;
            }          
        }
        return $this->makes;
    }

    public function getModels() {
        if (empty($this->models)) {
            $models = (new ModelList([], true, Model::class))->getAll();
            foreach($models as $model) {
                $this->models[$model->getId()] = $model;
            }      
        }
        return $this->models;
    }

    public function getAvailableMakes(array $params = []) {
        $makesList = new MakeList(
            array_merge(['available' => true], $params), 
            true, 
            Make::class
        );
        return $makesList->getAll();
    }    

    public function getAvailableModels(array $params = []) {
        $modelsList = new ModelList(
            array_merge(['available' => true], $params),
            true,
            Model::class
        );
        return $modelsList->getAll();
    }

    public function getAgencies() {
        if (empty($this->agencies)) {
            $agencies = (new AgencyList([], true, Agency::class))->getAll();
            foreach($agencies as $agency) {
                $this->agencies[$agency->getId()] = $agency;
            }      
        }
        return $this->agencies;
    }

}