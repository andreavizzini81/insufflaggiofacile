<?php

class InsufflaggioPageController extends FrontendController {

    public function __invoke() :Response {
        $selected = new StaticPage($this->request->getQueryParam('id'));
        $this->data['staticPage'] = $selected;
        if ($selected->getViewName() === 'home') {
            $this->title = 'Insufflaggio cellulosa Sicilia | Isolamento termico casa senza lavori invasivi';
            $this->description = 'Insufflaggio di cellulosa in Sicilia per isolamento termico casa e coibentazione pareti senza demolizioni. Richiedi preventivo gratuito a Palermo, Catania, Messina e in tutta la Sicilia.';
        } else {
            $this->description = $selected->getMetaDescription();
        }
        return $this->render();
    }

}