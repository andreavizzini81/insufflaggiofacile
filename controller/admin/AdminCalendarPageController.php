<?php

class AdminCalendarPageController extends BackendController {

    protected string $view = 'calendar';

    public function __invoke(): Response {

        $this->addScript((object)[
            'src' => 'https://cdn.jsdelivr.net/npm/fullcalendar@6.1.10/index.global.min.js'
        ]);

        $this->addScript((object)[
            'src' => 'https://cdn.jsdelivr.net/npm/@fullcalendar/core@6.1.10/locales/it.global.js'
        ]);

        $this->data['responsible_id'] = $this->user->getId();

        return $this->render();
    }

}