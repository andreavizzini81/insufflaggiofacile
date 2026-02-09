<?php

class BackgroundTaskList extends EntityList {

    protected const ENTITY = 'background_task';
    protected $orderParam = 'priority ASC, created_at ASC';
    
}