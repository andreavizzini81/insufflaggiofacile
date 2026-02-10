<?php
require __DIR__.'/bootstrap.php';
 
$app = new App();

/* ROTTE /ADMIN ACCESSIBILI DA ACCOUNT CON PRIVILEGI DI UTENTE SEMPLICE */

$app->router->group('/admin', function(&$group) {

    /* REST ENDPOINTS */

    $group->get('\/session\/?')
        ->setController('Session')
        ->setAction('getInfo')
        ->withAccessLevel(AccessLevel::PUBLIC);
    
    $group->put('\/session\/?')
        ->setController('Session')
        ->setAction('login')
        ->withAccessLevel(AccessLevel::PUBLIC);

    $group->delete('\/session\/?')
        ->setController('Session')
        ->setAction('logout');

    $group->post('\/user\/?')
        ->setController('User')
        ->setAction('setData');

    $group->post('\/user\/validate\/?')
        ->setController('User')
        ->setAction('checkUniqueness');

    $group->delete('\/user\/?(\d+)?')
        ->setParams(['id' => '@1'])
        ->setController('User')
        ->setAction('delete');
    
    $group->post('\/user\/password\-restore\-request\/?')
        ->setController('User')
        ->setAction('sendPasswordRestoreToken');

    $group->patch('\/user\/new\-password\/?')
        ->setController('User')
        ->setAction('setNewPassword');

    $group->post('\/agency\/?')
        ->setController('Agency')
        ->setAction('setData');

    $group->post('\/agency\/validate\/?')
        ->setController('Agency')
        ->setAction('checkUniqueness');

    $group->delete('\/agency\/?(\d+)?')
        ->setParams(['id' => '@1'])
        ->setController('Agency')
        ->setAction('delete');

    $group->post('\/attachment\/?')
        ->setController('Attachment')
        ->setAction('setData');

    $group->delete('\/attachment\/([a-fA-F0-9\-]+)')
        ->setParams(['uuid' => '@1'])
        ->setController('Attachment')
        ->setAction('delete');

    /* HTML ENDPOINTS */

    $group->get('\/?(dashboard\/?)?')
        ->setController('AdminDealListPage')
        /* ->setController('AdminDashboardPage') */
        ->setParams(['status' => 'pending']);

    $group->get('\/login\/?')
        ->setController('AdminLoginPage')
        ->withAccessLevel(AccessLevel::PUBLIC);

    $group->post('\/admin\-page\-category\/set\/?')
        ->setController('AdminPageCategory')
        ->setAction('setData');
    
    $group->post('\/admin\-page\-category\/order\/?')
        ->setController('AdminPageCategory')
        ->setAction('setOrder');
    
    $group->delete('\/admin\-page\-category\/(\d+)\/?')
        ->setParams(['id' => '@1'])
        ->setController('AdminPageCategory')
        ->setAction('delete');
    
    $group->post('\/admin\-page\/?')
        ->setController('AdminPage')
        ->setAction('setData');

    $group->post('\/admin\-page\/order\/?')
        ->setController('AdminPage')
        ->setAction('setOrder');

    $group->get('\/administrators\/?')
        ->setController('AdministratorsPage');

    $group->get('\/administrator\/?(\d+)?')
        ->setParams(['id' => '@1'])
        ->setController('AdministratorPage');

    $group->get('\/admin\-page\-categories\/?')
        ->setController('AdminPageCategoriesPage');

    $group->get('\/admin\-page\-category\/?(\d+)?')
        ->setParams(['id' => '@1'])
        ->setController('AdminPageCategoryPage');

    $group->get('\/admin\-pages\/(\d+)\/?')
        ->setParams(['id' => '@1'])
        ->setController('AdminPagesPage');
    
    $group->get('\/admin\-page\/?(\d+)?')
        ->setParams(['id' => '@1'])
        ->setController('AdminPagePage');

    $group->get('\/permissions\/(\d+)')
        ->setParams(['id' => '@1'])
        ->setController('PermissionsPage');

    $group->get('\/contact\/?(\d+)?')
        ->setParams(['id' => '@1'])
        ->setController('AdminContactPage');

    $group->get('\/contact\-list\/?')
        ->setController('AdminContactListPage');

    $group->get('\/faq\/?(\d+)?')
        ->setParams(['id' => '@1'])
        ->setController('AdminFaqPage');

    $group->get('\/faq\-list\/?')
        ->setController('AdminFaqListPage');
		
	$group->get('\/product\/?(\d+)?')
        ->setParams(['id' => '@1'])
        ->setController('AdminProductPage');

    $group->get('\/product\-list\/?')
        ->setController('AdminProductListPage');

    $group->get('\/insufflaggio\/?(\d+)?')
        ->setParams(['id' => '@1'])
        ->setController('AdminInsufflaggioPage');

    $group->get('\/insufflaggio\-list\/?')
        ->setController('AdminInsufflaggioListPage');

    $group->get('\/user\-manager\/?(\d+)?\/?')
        ->setParams(['id' => '@1'])
        ->setController('AdminUserPage');

    $group->get('\/user\-list\/?')
        ->setController('AdminUserListPage');

    $group->get('\/agency\-manager\/?(\d+)?\/?')
        ->setParams(['id' => '@1'])
        ->setController('AdminAgencyPage');

    $group->get('\/agency\-list\/?')
        ->setController('AdminAgencyListPage');

    $group->get('\/vehicle\-manager\/?(\d+)?\/?')
        ->setParams(['id' => '@1'])
        ->setController('AdminVehiclePage');

    $group->get('\/vehicle\-list\/?')
        ->setController('AdminVehicleListPage');

    $group->get('\/quotation\-list\/?')
        ->setController('AdminQuotationListPage');

    $group->get('\/review\-manager\/?(\d+)?\/?')
        ->setParams(['id' => '@1'])
        ->setController('AdminReviewPage');

    $group->get('\/review\-list\/?')
        ->setController('AdminReviewListPage');

    $group->get('\/deals\/?')
        ->setController('AdminDealListPage');

    $group->get('\/deals\/kanban\-manager\/?')
        ->setController('AdminDealListPage')
        ->setParams([
            'mode' => 'kanban-manager'
        ]);

    $group->get('\/deal\/?(\d+)?\/?')
        ->setController('AdminDealPage')
        ->setParams(['id' => '@1']);

    $group->get('\/training\/?')
        ->setController('AdminTrainingCategoryListPage');

    $group->get('\/training-category\/(\d+)\/?')
        ->setController('AdminTrainingCategoryPage')
        ->setParams([
            'id' => '@1'
        ]);

    $group->get('\/training-video\/(\d+)\/?')
        ->setController('AdminTrainingVideoPage')
        ->setParams([
            'id' => '@1'
        ]);
        

    $group->get('\/rent-offer-params\/?')
        ->setController('AdminRentOfferParamsPage');

    $group->get('\/calendar\/?')
        ->setController('AdminCalendarPage');
    
    /* UTILITY ENDPOINTS */

    $group->get('\/test-page\/?')
        ->setController('AdminTestPage');

    $group->get('\/404\/?')
        ->setController('RouteNotFound');

    $group->get('\/adminer')
        ->setController('Redirector')
        ->setParams(['destination' => 'resources/adminer']);

})->withAccessLevel(AccessLevel::USER)
  ->withMiddleware('AdminAuthenticationMiddleware');

$app->router->group('/admin', function(&$group) {

    $group->get('\/password\-restore\-form\/?')
        ->setController('AdminPasswordRestorePage');

});

/* ROTTE REST ACCESSIBILI DA ACCOUNT CON PRIVILEGI DI UTENTE SEMPLICE */

$app->router->group('/api', function(&$group) {

    $group->get('\/model\/([0-9]+)\/gallery\/?')
        ->setController('Model')
        ->setAction('getModelAvailableImages')
        ->setParams([
            'id' => '@1'
        ]);

    $group->post('\/model\/([0-9]+)\/cover\/?')
        ->setController('Model')
        ->setAction('setCoverImageId')
        ->setParams([
            'id' => '@1'
        ]);

    $group->put('\/multiselection\/([A-Za-z0-9]+)\/(\d+)\/?')
        ->setController('Multiselection')
        ->setParams([
            'entity' => '@1',
            'id' => '@2'
        ]);

    $group->delete('\/multiselection\/([A-Za-z0-9]+)\/(\d+)\/?')
        ->setController('Multiselection')
        ->setParams([
            'entity' => '@1',
            'id' => '@2'
        ]);
    
    $group->get('\/multiselection\/([A-Za-z0-9]+)\/?')
        ->setController('Multiselection')
        ->setAction('getList')
        ->setParams([
            'entity' => '@1'
        ]);

    $group->get('\/multiselection\/([A-Za-z0-9]+)\/count\/?')
        ->setController('Multiselection')
        ->setAction('getCount')
        ->setParams([
            'entity' => '@1'
        ]);

    $group->put('\/multiselection\/([A-Za-z0-9]+)\/?')
        ->setController('Multiselection')
        ->setAction('listToggle')
        ->setParams([
            'entity' => '@1'
        ]);

    $group->delete('\/multiselection\/([A-Za-z0-9]+)\/?')
        ->setController('Multiselection')
        ->setAction('listToggle')
        ->setParams([
            'entity' => '@1'
        ]);

    $group->patch('\/multiselection\/([A-Za-z0-9]+)\/?')
        ->setController('Multiselection')
        ->setAction('updateSelected')
        ->setParams([
            'entity' => '@1'
        ]);

    $group->patch('\/offer\/update-model-default-params\/?')
        ->setController('Offer')
        ->setAction('updateModelDefaultOfferParams');

    $group->get('\/deal\/(\d+)\/?(kanban)?')
        ->setController('Deal')
        ->setAction('get')
        ->setParams([
            'id' => '@1',
            'kanban' => '@2'
        ]);

    $group->put('\/deal\/?')
        ->setController('Deal')
        ->setAction('create');

    $group->patch('\/deal\/(\d+)\/?')
        ->setController('Deal')
        ->setAction('update')
        ->setParams([
            'id' => '@1'
        ]);

    $group->get('\/deal\/(\d+)\/attachment\/?')
        ->setController('Deal')
        ->setAction('getAttachments')
        ->setParams([
            'id' => '@1'
        ]);

    $group->post('\/deal\/(\d+)\/attachment\/?')
        ->setController('Deal')
        ->setAction('uploadAttachment')
        ->setParams([
            'id' => '@1'
        ]);

    $group->delete('\/deal\/(\d+)\/attachment\/([a-f0-9\-]{36})\/?')
        ->setController('Deal')
        ->setAction('deleteAttachment')
        ->setParams([
            'id' => '@1',
            'uuid' => '@2'
        ]);

    $group->get('\/deal\/(\d+)\/note\/?')
        ->setController('Deal')
        ->setAction('getNotes')
        ->setParams([
            'id' => '@1'
        ]);

    $group->post('\/deal\/(\d+)\/note\/?')
        ->setController('Deal')
        ->setAction('createNote')
        ->setParams([
            'id' => '@1'
        ]);

    $group->get('\/deal\/(\d+)\/note\/(\d+)\/?')
        ->setController('Deal')
        ->setAction('getNote')
        ->setParams([
            'id' => '@1',
            'noteId' => '@2'
        ]);

    $group->patch('\/deal\/(\d+)\/note\/(\d+)\/?')
        ->setController('Deal')
        ->setAction('updateNote')
        ->setParams([
            'id' => '@1',
            'noteId' => '@2'
        ]);

    $group->delete('\/deal\/(\d+)\/note\/(\d+)\/?')
        ->setController('Deal')
        ->setAction('deleteNote')
        ->setParams([
            'id' => '@1',
            'noteId' => '@2'
        ]);

    $group->put('\/deal\/(\d+)\/stage\/(\d+)\/?')
        ->setController('Deal')
        ->setAction('setStage')
        ->setParams([
            'id' => '@1',
            'stageId' => '@2'
        ]);

    $group->post('\/deals\/kanban\/?')
        ->setController('Deal')
        ->setAction('getKanbanInitData');

    $group->post('\/deals\/kanban(\/(\d+)?)?\/?')
        ->setController('Deal')
        ->setAction('getList')
        ->setParams([
            'page' => '@2',
            'kanban' => true
        ]);

    $group->get('\/crm\-stages\/?')
        ->setController('CrmStage')
        ->setAction('getList');

    $group->post('\/crm\-stage\/?')
        ->setController('CrmStage')
        ->setAction('setData');

    $group->post('\/crm\-stage\/order\/?')
        ->setController('CrmStage')
        ->setAction('setOrder');

    $group->delete('\/crm\-stage\/(\d+)\/?')
        ->setController('CrmStage')
        ->setAction('delete')
        ->setParams([
            'id' => '@1'
        ]);

    $group->post('\/deal\/(\d+)\/event\/?')
        ->setController('Deal')
        ->setAction('createEvent')
        ->setParams([
            'id' => '@1'
        ]);

    $group->patch('\/deal\/(\d+)\/event\/(\d+)?')
        ->setController('Deal')
        ->setAction('updateEvent')
        ->setParams([
            'id' => '@1',
            'eventId' => '@2'
        ]);

    $group->get('\/deal\/(\d+)\/event\/?')
        ->setController('Deal')
        ->setAction('getEvents')
        ->setParams([
            'id' => '@1'
        ]);

    $group->get('\/deal\/(\d+)\/event\/(\d+)\/?')
        ->setController('Deal')
        ->setAction('getEvent')
        ->setParams([
            'id' => '@1',
            'eventId' => '@2'
        ]);

    $group->delete('\/deal\/(\d+)\/event\/(\d+)\/?')
        ->setController('Deal')
        ->setAction('deleteEvent')
        ->setParams([
            'id' => '@1',
            'eventId' => '@2'
        ]);

	$group->patch('\/deal-build-sheet\/(\d+)\/?')
        ->setController('BuildSheet')
        ->setAction('update')
        ->setParams([
            'id' => '@1'
        ]);

    $group->get('\/contact\/(\d+)\/?')
        ->setController('Contact')
        ->setAction('getData')
        ->setParams([
            'id' => '@1'
        ]);
        
    $group->post('\/contact\/?')
        ->setController('Contact')
        ->setAction('setData');

    $group->post('\/contact\/validate\/?')
        ->setController('Contact')
        ->setAction('checkUniqueness');

    $group->delete('\/contact\/?(\d+)?')
        ->setController('Contact')
        ->setAction('delete')
        ->setParams(['id' => '@1']);

    $group->post('\/contact\/search\/?')
        ->setController('Contact')
        ->setAction('search');

    $group->get('\/contact\/list\/search\/?')
        ->setController('ContactList')
        ->setAction('getList');

    $group->post('\/contact\/getCity\/?')
        ->setController('Contact')
        ->setAction('getCity');

    $group->delete('\/faq\/(\d+)\/?')
        ->setController('Faq')
        ->setAction('delete')
        ->setParams(['id' => '@1']);
    
    $group->post('\/insufflaggio\/?')
        ->setController('Insufflaggio')
        ->setAction('setData');

    $group->delete('\/insufflaggio\/(\d+)\/?')
        ->setController('Insufflaggio')
        ->setAction('delete')
        ->setParams(['id' => '@1']);
    
    $group->post('\/faq\/?')
        ->setController('Faq')
        ->setAction('setData');
		
	$group->delete('\/product\/(\d+)\/?')
        ->setController('Product')
        ->setAction('delete')
        ->setParams(['id' => '@1']);
    
    $group->post('\/product\/?')
        ->setController('Product')
        ->setAction('setData');
    
    $group->get('\/product\/(\d+)\/attachment\/?')
        ->setController('Product')
        ->setAction('getAttachments')
        ->setParams([
            'id' => '@1'
        ]);

    $group->post('\/product\/(\d+)\/attachment\/?')
        ->setController('Product')
        ->setAction('uploadAttachment')
        ->setParams([
            'id' => '@1'
        ]);

    $group->delete('\/product\/(\d+)\/attachment\/([a-f0-9\-]{36})\/?')
        ->setController('Product')
        ->setAction('deleteAttachment')
        ->setParams([
            'id' => '@1',
            'uuid' => '@2'
        ]);

    $group->get('\/me\/siblings\/?')
        ->setController('User')
        ->setAction('getSiblingsUsers');

    $group->get('\/me\/agencies\/?')
        ->setController('User')
        ->setAction('getAuthorizedAgencies');

    $group->get('\/dashboardevents\/(\d+)\/([A-Za-z0-9]+)\/?')
        ->setController('Calendar')
        ->setAction('setStatusCalendar')
        ->setParams(['id' => '@1', 'statusEvent' => '@2']);

    $group->get('\/calendar\/?')
        ->setController('Calendar')
        ->setAction('getEvents');

    $group->get('\/calendar\/link\/?')
        ->setController('Calendar')
        ->setAction('getLink');

    $group->post('\/email\/?')
        ->setController('Email')
        ->setAction('sendFromModal');
    
    $group->get('\/test\/?')
        ->setController('Test');

    $group->get('\/training-category\/(\d+)\/attachment\/?')
        ->setController('TrainingCategory')
        ->setAction('getAttachments')
        ->setParams([
            'id' => '@1'
        ]);

})->withAccessLevel(AccessLevel::USER)
  ->withMiddleware('AdminAuthenticationMiddleware');

/* ROTTE REST ACCESSIBILI DA ACCOUNT CON PRIVILEGI DI AMMINISTRAZIONE */

$app->router->group('/api', function(&$group) {

    $group->post('\/vehicle\/(\d+)\/images\/?')
        ->setController('Vehicle')
        ->setAction('uploadImages')
        ->setParams([
            'id' => '@1'
        ]);

    $group->get('\/training-category\/(\d+)\/?')
        ->setController('TrainingCategory')
        ->setAction('get')
        ->setParams([
            'id' => '@1'
        ]);

    $group->post('\/training-category\/?')
        ->setController('TrainingCategory')
        ->setAction('create')
        ->setParams([
            'id' => '@1'
        ]);

    $group->patch('\/training-category\/(\d+)\/?')
        ->setController('TrainingCategory')
        ->setAction('update')
        ->setParams([
            'id' => '@1'
        ]);

    $group->delete('\/training-category\/(\d+)\/?')
        ->setController('TrainingCategory')
        ->setAction('delete')
        ->setParams([
            'id' => '@1'
        ]);

    $group->post('\/training-category\/sort\/?')
        ->setController('TrainingCategory')
        ->setAction('setCategoriesSort');

    $group->post('\/training-category\/(\d+)\/items-sort\/?')
        ->setController('TrainingCategory')
        ->setAction('setItemsSort')
        ->setParams([
            'id' => '@1'
        ]);

    $group->post('\/training\/loom-embed-info\/?')
        ->setController('TrainingItem')
        ->setAction('getLoomEmbedInfoFromUrl');

    $group->post('\/training\/create-loom-item\/?')
        ->setController('TrainingItem')
        ->setAction('createFromLoomEmbedInfo');

    $group->post('\/training-category\/(\d+)\/attachment\/?')
        ->setController('TrainingCategory')
        ->setAction('uploadAttachment')
        ->setParams([
            'id' => '@1'
        ]);

    $group->post('\/training-category\/(\d+)\/attachment\/sort\/?')
        ->setController('TrainingCategory')
        ->setAction('setAttachmentsSort')
        ->setParams([
            'id' => '@1'
        ]);

    $group->delete('\/training-category\/(\d+)\/attachment\/([a-f0-9\-]{36})\/?')
        ->setController('TrainingCategory')
        ->setAction('deleteAttachment')
        ->setParams([
            'id' => '@1',
            'uuid' => '@2'
        ]);

    $group->patch('\/training-item\/(\d+)\/title\/?')
        ->setController('TrainingItem')
        ->setAction('updateTitle')
        ->setParams([
            'id' => '@1'
        ]);

    $group->delete('\/training-item\/(\d+)\/?')
        ->setController('TrainingItem')
        ->setAction('delete')
        ->setParams([
            'id' => '@1'
        ]);

})->withAccessLevel(AccessLevel::ADMIN)
  ->withMiddleware('AdminAuthenticationMiddleware');


/* ROTTE REST ACCESSIBILI PUBBLICAMENTE */

$app->router->group('/api', function(&$group) {

    $group->post('\/models\/?')
        ->setController('FrontendModelsList')
        ->setAction('getList');

    $group->get('\/model\/(\d+)\/gearbox\/?')
        ->setController('Model')
        ->setAction('getAvailableGearType')
        ->setParams([
            'id' => '@1'
        ]);

    $group->post('\/variants\/?')
        ->setController('FrontendVariantsList')
        ->setAction('getList');

    $group->post('\/rent-custom-request\/?')
        ->setController('FrontendFormsGateway')
        ->setAction('registerRentCustomRequest')
        ->withMiddleware('GoogleRecaptchaMiddleware');

    $group->post('\/lead-request\/?')
        ->setController('FrontendFormsGateway')
        ->setAction('registerLeadRequest')
        ->withMiddleware('GoogleRecaptchaMiddleware');

    $group->get('\/agencies\/?')
        ->setController('AgencyList')
        ->setAction('getList');

    $group->post('\/map\/?')
        ->setController('Map')
        ->setAction('getList');
    
    $group->post('\/address\/state\/?')
        ->setController('Map')
        ->setAction('getState');

    $group->post('\/address\/city\/?')
        ->setController('Map')
        ->setAction('getCity');
    
    $group->post('\/address\/agency\/?')
        ->setController('Map')
        ->setAction('getAgency');

    $group->post('\/agency\/?')
        ->setController('Agency')
        ->setAction('getList');

    $group->post('\/address\/getState\/?')
        ->setController('Address')  
        ->setAction('getState');

    $group->post('\/address\/getCity\/?')
        ->setController('Address')
        ->setAction('getCity');

    $group->post('\/address\/getZipcode\/?')
        ->setController('Address')
        ->setAction('getZipcode');

    $group->post('\/address\/coordinates\/?')
        ->setController('Address')
        ->setAction('getLocationGeoCoordinates');

});

/* ROTTE DI FRONTEND */
$app->router->group('', function(&$group) {

    $group->get('\/?')
        ->setController('GenericPage')
        ->setParams([
            'language' => 'it',
            'uri' => 'home'
        ]); 
	
	$group->get('\/home\/?')
        ->setController('GenericPage')
        ->setParams([
            'language' => 'it',
            'uri' => 'home'
        ]); 
    
    $group->get('\/ok\/?')
        ->setController('GenericPage')
        ->setParams([
            'language' => 'it',
            'uri' => 'ok'
        ]); 
		
	$group->get('\/richiedi-preventivo\/?')
        ->setController('GenericPage')
        ->setParams([
            'language' => 'it',
            'uri' => 'richiedi-preventivo'
        ]);  
		
	$group->get('\/scheda-prodotto\/(\d+)\/?')
        ->setController('ProductPage')
        ->setParams([
            'language' => 'it',
            'uri' => 'scheda-prodotto',
            'id' => '@1'
        ]);

    $group->get('\/insufflaggio\/([a-zA-Z0-9]|%[0-9A-Fa-f]{2})+\/(\d+)\/?')
        ->setController('InsufflaggioPage')
        ->setParams([
            'language' => 'it',
            'uri' => 'insufflaggio',
            'id' => '@2'
        ]);
	
	$group->get('\/faq\/?')
        ->setController('FaqPage')
        ->setParams([
            'language' => 'it',
            'uri' => 'faq'
        ]);
        
    $group->get('\/404\/?')
        ->setController('PageNotFoundPage')
        ->setParams([
            'language' => 'it',
            'uri' => '404'
        ]);
	
	/* ---------------------------------------------- */
	
    $group->get('\/blog\/categoria\/[[:ascii:]]+\/(\d+)\/?')
        ->setController('FrontendBlogPage')
        ->setParams([
            'language' => 'it',
            'uri' => 'blog',
            'blog_category_id' => '@1'
        ]);

    $group->get('\/blog\/[[:ascii:]]+\/(\d+)\/?')
        ->setController('FrontendBlogArticlePage')
        ->setParams([
            'id' => '@1',
            'language' => 'it',
            'uri' => 'articolo-blog'
        ]);
    
    $group->get('\/veicoli\/?')
        ->setController('FrontendVehicleListPage')
        ->setParams([
            'language' => 'it',
            'uri' => 'veicoli'
        ]);
    
    $group->get('\/scegli-allestimento\/([0-9-]+)\/?')
        ->setController('FrontendVehicleSteps')
        ->setParams([
            'id' => '@1',
            'language' => 'it',
            'uri' => 'scegli-allestimento'
        ]);
    
    $group->get('\/cambia-allestimento\/([0-9-]+)\/?')
        ->setController('FrontendVehicleSteps')
        ->setParams([
            'id' => '@1',
            'language' => 'it',
            'uri' => 'scegli-allestimento'
        ]);
    
    $group->get('\/[A-Za-z0-9-]+\/[[:ascii:]]+\/[[:ascii:]]+\/(\d+)\/?')
        ->setController('FrontendVehiclePage')
        ->setParams([
            'id' => '@1',
            'language' => 'it',
            'uri' => 'veicolo'
        ]);
    
    $group->get('\/agenzia\/([0-9-]+)\/?')
        ->setController('FrontendAgencyPage')
        ->setParams([
            'id' => '@1',
            'language' => 'it',
            'uri' => 'agenzia'  
        ]);
    
    $group->get('\/agente\/([0-9-]+)\/?')
        ->setController('FrontendAgentPage')
        ->setParams([
            'id' => '@1',
            'language' => 'it',
            'uri' => 'agente'  
        ]);
    
    $group->get('\/faq-lungo-termine\/?')
        ->setController('FrontendNltFaq')
        ->setParams([
            'language' => 'it',
            'uri' => 'faq-lungo-termine'
        ]);
    
    $group->get('\/recensioni\/?')
        ->setController('FrontendReviewsPage')
        ->setParams([
            'language' => 'it',
            'uri' => 'recensioni'
        ]);
    
    $group->get('\/blog\/?')
        ->setController('FrontendBlogPage')
        ->setParams([
            'language' => 'it',
            'uri' => 'blog'
        ]);
    
    $group->get('\/test\/?')
        ->setController('FrontendTestPage')
        ->setParams([
            'language' => 'it',
            'uri' => 'test'
        ]);
    
    $group->get('\/([a-z0-9-]+)\/?')
        ->setController('FrontendHomePage')
        ->setParams([
            'language' => 'it',
            'uri' => '@1'
        ]);

}); //->withMiddleware('RentalnessSubdomainMiddleware')

$app->router->get('\/ical\/(.*)\/?')
    ->setController('IcalGenerator')
    ->setParams([
        'token' => '@1'
    ]);

$app->router->get('\/gc-logger\/?')
    ->setController('Logger');

$app->router->post('\/gc-logger\/?')
    ->setController('Logger');

$app->router->put('\/gc-logger\/?')
    ->setController('Logger');

$app->router->patch('\/gc-logger\/?')
    ->setController('Logger');

$app->router->delete('\/gc-logger\/?')
    ->setController('Logger');

/* ROTTE REST ACCESSIBILI PUBBLICAMENTE ANDREA */

$app->router->group('/api', function(&$group) {

    $group->post('\/facebook-lead-request\/?')
        ->setController('FacebookLeadFormsGateway')
        ->setAction('registerLeadRequest');

    $group->post('\/google-lead-request\/?')
        ->setController('GoogleLeadFormsGateway') 
        ->setAction('registerLeadRequest');

    $group->post('\/richiedi-preventivo\/?')
        ->setController('FacebookLeadFormsGateway')
        ->setAction('registerLeadRequest');

});

$app->run();