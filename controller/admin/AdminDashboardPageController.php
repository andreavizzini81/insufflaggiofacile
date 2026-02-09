<?php

class AdminDashboardPageController extends BackendController {

    protected string $view = 'dashboard';
	/*
	$this->data['list'] = $eventList->getPage($this->request->getQueryParam('page') ?? 1);
	$this->data['pagination_obj'] = $eventList->getPagination();
	$this->data['pagination'] = Utils::generatePagination($eventList->getPagination(), $this->request);
	
	$this->data['actions'] = [
		new TopbarAction([
			'attributes' => [
				'class' => 'create-contact info',
				'href' => sprintf('%scontact', $this->path)
			],
			'label' => 'INSERISCI ANAGRAFICA',
			'icon' => 'plus'
		])
	]; 
	*/
	
	public function __invoke(): Response {
		$eventList = new CalendarEventList($this->request->getQueryParams(), true, CalendarEvent::class);
		$list = $eventList->getAll();
		$this->data['list'] = $list;
		$this->data['status'] = $this->request->getQueryParams();
        return $this->render();
    }

}