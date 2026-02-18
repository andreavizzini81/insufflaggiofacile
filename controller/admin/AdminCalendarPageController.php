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

        $googleCalendarService = new GoogleCalendarService();

        $this->data['responsible_id'] = $this->user->getId();
        $this->data['google_calendar_connection'] = $googleCalendarService->getConnectionData($this->user->getId());
        $this->data['actions'] = [
            new TopbarAction([
                'attributes' => [
                    'href' => sprintf('%scalendar-activity', $this->path),
                    'class' => 'info'
                ],
                'label' => 'GESTISCI ATTIVITÀ',
                'icon' => 'list'
            ])
        ];

        return $this->render();
    }

}
