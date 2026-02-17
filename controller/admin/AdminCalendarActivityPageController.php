<?php

class AdminCalendarActivityPageController extends BackendController {

    protected string $view = 'calendar_activity';

    public function __invoke(): Response {

        $activityList = new CalendarActivityList($this->request->getQueryParams(), true, CalendarActivity::class);
        $activityList->setPageLength(25);

        $this->data['list'] = $activityList->getPage($this->request->getQueryParam('page') ?? 1);
        $this->data['pagination_obj'] = $activityList->getPagination();
        $this->data['pagination'] = Utils::generatePagination($activityList->getPagination(), $this->request);
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
