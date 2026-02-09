<?php

class AdminTestPageController extends BackendController {

    protected string $view = 'test';

    public function __invoke(): Response {

        $list = $this->db->getResults(
            'SELECT
                deal.id AS dealId
            FROM
                deal
            WHERE
                deal.id < 322 AND deal.stage_id = 1
                '
        );
        
        foreach($list as $data) {
            $deal = new Deal($data->dealId);
            $deal->setStageId(6)->save();
        }
        /**/
        $this->data['tabella'] = $list;


        return $this->render();
    }

}