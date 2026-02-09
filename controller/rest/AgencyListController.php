<?php

class AgencyListController extends RestController {

    public function getList() :Response {
        $filterParams = $this->request->getQueryParams();
        $agencyList = new AgencyList($filterParams, true, Agency::class); 

        return $this->returnResult([
            'list' => $agencyList->getAll()
        ]);

    }

}