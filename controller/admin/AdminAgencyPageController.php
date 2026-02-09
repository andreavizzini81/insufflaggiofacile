<?php

class AdminAgencyPageController extends BackendController {

    protected string $view = 'agency';

    public function __invoke(): Response {

        $id = $this->request->getQueryParam('id');
        $agency = new Agency($id);

        if (!is_null($id) && !$agency->exists()) {
            $this->response->setStatusCode(404);
            $this->view = '404';
            $this->loadPage();
        }

        $this->data['agency'] = $agency;
        $this->data['region'] = $this->db->getCol(
            'SELECT 
                DISTINCT regione 
            FROM 
                cappario 
            ORDER BY 
                regione ASC;'
        );
        
        $this->data['state'] = $this->db->getResults(
            sprintf(
                'SELECT 
                    DISTINCT provincia, 
                    nome_provincia 
                FROM 
                    cappario 
                WHERE 
                    LOWER(regione) = LOWER(TRIM(\'%s\')) 
                ORDER BY 
                    provincia ASC;', 
                $this->db->escape($agency->getRegion())
            )
        );

        $this->data['city'] = $this->db->getCol(
            sprintf(
                'SELECT DISTINCT 
                    localita
                FROM 
                    cappario 
                WHERE 
                    LOWER(provincia) = LOWER(TRIM(\'%s\')) 
                ORDER BY 
                    localita ASC;', 
                $this->db->escape($agency->getState())
            )
        );

        $this->data['zipcode'] = $this->db->getCol(
            sprintf(
                'SELECT DISTINCT 
                    cap
                FROM 
                    cappario 
                WHERE 
                    LOWER(localita) = LOWER(TRIM(\'%s\')) 
                ORDER BY 
                    cap ASC', 
                $this->db->escape($agency->getCity())
            ));
        
        $this->data['actions'] = [
            new TopbarAction([
                'attributes' => [
                    'class' => 'save-agency success'
                ],
                'label' => 'SALVA AGENZIA',
                'icon' => 'check'
            ])
        ];   
        return $this->render();
    }

}