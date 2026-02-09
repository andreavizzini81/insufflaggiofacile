<?php

class AgencyController extends RestController {

    public function setData() :Response {

        $agencyData = $this->request->getInputParams();

        if (!filter_var($agencyData['email'], FILTER_VALIDATE_EMAIL)) {
            return $this->returnErrorMessage('Indirizzo email formalmente non valido', 400);
        }

        if (!$this->validateKeyParams($agencyData['id'] ?? null, $agencyData['email'])) {
            return $this->returnErrorMessage('L\'indirizzo email specificato risulta gi&agrave; registrato.', 400);
        }
        if (isset($agencyData['holder_user_id']) && $agencyData['holder_user_id'] == '') {
            $agencyData['holder_user_id'] = null;
        }

        if (isset($agencyData['default_responsible_id']) && $agencyData['default_responsible_id'] == '') {
            $agencyData['default_responsible_id'] = null;
        }

        $agency = new Agency($agencyData['id'] ?? null);
        $agencyId = $agency->import((object)$agencyData)->save();

        return $agencyId === false ?
            $this->returnErrorMessage('Impossibile salvare l&rsquo;agenzia.') :
            $this->returnResult(['id' => $agencyId]);
    }

    public function delete() :Response {
        $id = $this->request->getQueryParam('id');
        if (is_null($id)) {
            return $this->returnErrorMessage('Riferimento agenzia non valido', 400);
        }
        $agency = new Agency($id);
        if (!$agency->exists()) {
            return $this->returnErrorMessage('Agenzia non trovata', 404);
        }
        $result = $agency->delete();
        if ($result) {
            return $this->returnResult(null);
        } else {
            return $this->returnErrorMessage('Impossibile eliminare l\'agenzia.');
        }
    }

    public function checkUniqueness() :Response {
        $id = $this->request->getInputParam('id');
        $email = $this->request->getInputParam('email');
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return $this->returnErrorMessage('Indirizzo email formalmente non valido');
        }
        if ($this->validateKeyParams($id, $email)) {
            return $this->returnResult(null);
        } else {
            return $this->returnErrorMessage('L\'indirizzo email specificato risulta gi&agrave; registrato.');
        }
    }

    private function validateKeyParams($id, $email) {
        $agencyId = $this->db->selectOne(
            'agency', 
            ['id'], 
            sprintf('email = \'%s\'', $this->db->escape(strtolower(trim($email))))
        );
        if (is_null($agencyId) || $agencyId == $id) {
            return true;
        }
        return false;
    }

    public function getList(): Response {
        $filterParams = $this->request->getInputParams();
        $agencyList = new AgencyList($filterParams, true, PublicAgency::class); 
        $agencyList->setPageLength(3);
        $list = $agencyList->getPage((int) $filterParams['page'] ?? 1);
        $pagination = $agencyList->getPagination();
        return $this->returnResult([
            'list' => array_map(fn($agency) => $agency->withHolderUser(true), $list),
            'pagination' => $pagination,
            'page' => $filterParams['page']
        ]);

    }

}