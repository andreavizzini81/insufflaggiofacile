<?php

class AdminCalendarActivityPageController extends BackendController {

    protected string $view = 'calendar_activity';

    public function __invoke(): Response {

        $this->data['actions'] = [
            new TopbarAction([
                'attributes' => [
                    'class' => 'create-calendar-activity success'
                ],
                'label' => 'NUOVA ATTIVITÀ',
                'icon' => 'plus'
            ])
        ];

        return $this->render();
    }

}
