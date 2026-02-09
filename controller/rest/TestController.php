<?php

class TestController extends RestController {

    public function __invoke(): Response {

        $tabella = $this->db->getResults("SELECT deal.id, contact.email FROM deal, contact WHERE deal.contact_id = contact.id ORDER BY deal.id");

        return $this->returnResult([
            'tabella' => $tabella
        ]);
    }

}