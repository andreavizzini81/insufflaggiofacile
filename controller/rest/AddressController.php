<?php

class AddressController extends RestController {

    
    public function getState() :Response {
		$prefix = (string)((bool)$this->request->getInputParam('isBusiness') === true) ? 'business_' : '';
        $region = $this->request->getInputParam(sprintf('%sregion',$prefix));
        $returnList = $this->db->getResults(sprintf(
                                                    'SELECT DISTINCT  
                                                        provincia AS _key, nome_provincia AS _value
                                                    FROM 
                                                        cappario 
                                                    WHERE 
                                                        LOWER(regione) = LOWER(TRIM(\'%s\')) 
                                                    ORDER BY provincia ASC', 
                                                    $this->db->escape($region)
                                                ));
        return $this->returnResult([
            'list' => $returnList,
            'region' => $region,
			'prefix' => $prefix,
			'isBusiness' => $this->request->getInputParam('isBusiness')
        ]);

    }

    public function getCity() :Response {
		$prefix = (string)((bool)$this->request->getInputParam('isBusiness') === true) ? 'business_' : '';
        $state = $this->request->getInputParam(sprintf('%sstate',$prefix));
        $returnList = $this->db->getResults(sprintf(
                                                    'SELECT DISTINCT 
                                                        localita AS _key, localita AS _value
                                                    FROM 
                                                        cappario 
                                                    WHERE 
                                                        LOWER(provincia) = LOWER(TRIM(\'%s\')) 
                                                    ORDER BY localita ASC', 
                                                    $this->db->escape($state)
                                                ));
        return $this->returnResult([
            'list' => $returnList
        ]);

    }

    public function getZipcode() :Response {
		$prefix = (string)((bool)$this->request->getInputParam('isBusiness') === true) ? 'business_' : '';
        $city = $this->request->getInputParam(sprintf('%scity',$prefix));
        $returnList = $this->db->getResults(sprintf(
                                                    'SELECT DISTINCT 
                                                        cap AS _key, cap AS _value
                                                    FROM 
                                                        cappario 
                                                    WHERE 
                                                        LOWER(localita) = LOWER(TRIM(\'%s\')) 
                                                    ORDER BY cap ASC', 
                                                    $this->db->escape($city)
                                                ));
        return $this->returnResult([
            'list' => $returnList
        ]);

    }

    public function getLocationGeoCoordinates(): Response {

        $region = strtolower($this->request->getInputParam('region'));
        $state = strtolower($this->request->getInputParam('state'));
        $city = strtolower($this->request->getInputParam('city'));

        $data = $this->db->getRow(
            sprintf(
                'SELECT DISTINCT 
                    latitudine AS lat, 
                    longitudine AS lng
                FROM 
                    cappario 
                WHERE 
                    LOWER(regione) = \'%s\' AND
                    LOWER(provincia) = \'%s\' AND
                    LOWER(localita) = \'%s\'
                ORDER BY 
                    cap ASC;', 
                $this->db->escape($region),
                $this->db->escape($state),
                $this->db->escape($city)
            )
        );

        if (is_null($data)) {
            return $this->returnErrorMessage('Coordinates not found', 404);
        }

        return $this->returnResult($data);
    }

}
