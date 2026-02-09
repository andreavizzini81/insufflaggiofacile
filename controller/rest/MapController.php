<?php

class MapController extends RestController {

    public function getList(): Response {
        $filterParams = $this->request->getInputParams();
        $agencyList = new AgencyList($filterParams, true, PublicAgency::class); 
        $list = $agencyList->getAll();

        return $this->returnResult([
            'list' => $list
        ]);

    }
    
    public function getState(): Response {
        $region = $this->request->getInputParam('region');
        $returnList = $this->db->getResults(
            sprintf(
                'SELECT DISTINCT 
                    agency.state AS _key, 
                    cappario.nome_provincia AS _value 
                FROM 
                    agency, 
                    cappario 
                WHERE 
                    agency.region = TRIM(\'%s\') 
                AND 
                    LOWER(agency.state) = LOWER(cappario.provincia) 
                ORDER by region ASC', 
                $region
            )
        );
        return $this->returnResult([
            'list' => $returnList,
            'region' => $region
        ]);

    }

    public function getCity() :Response {
        $region = $this->request->getInputParam('region');
        $state = $this->request->getInputParam('state');
        $returnList = $this->db->getResults(
            sprintf('
                SELECT DISTINCT 
                    city AS _key,
                    city AS _value
                FROM 
                    agency 
                WHERE 
                    region = TRIM(\'%s\') 
                AND 
                    state = TRIM(\'%s\') 
                ORDER by region ASC', 
            $region, 
            $state));
        return $this->returnResult([
            'list' => $returnList
        ]);
    }

    public function getAgency() :Response {
        $city = $this->request->getInputParam('city');
        $returnList = $this->db->getResults(
            sprintf('
                SELECT DISTINCT 
                    id AS _key,
                    description AS _value
                FROM 
                    agency 
                WHERE 
                    city = TRIM(\'%s\') 
                ORDER by region ASC', 
            $city));
        return $this->returnResult([
            'list' => $returnList
        ]);
    }

}