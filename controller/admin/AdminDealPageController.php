<?php

class AdminDealPageController extends BackendController {

    protected string $view = 'deal';

    public function __invoke(): Response {

        $deal = new Deal($this->request->getQueryParam('id'));

        if (!$deal->exists() || !$deal->canBeManagedByUser($this->user)) {
            return $this->response->setHeader('Location', '/admin/404')->setStatusCode(301);
        }

        if (is_null($deal->getAgencyId())) {
            $deal->setAgencyId(
                $this->user->getDefaultAgencyId() ?? $this->user->getAuthorizedAgenciesId()[0]
            );
        }

        $agency = new Agency($deal->getAgencyId());
        
        $this->page->setName(
            $deal->getTitle()
        );

        $contact = new Contact($deal->getContactId());
        $sanitizedPhone = Utils::isItalianMobilePhoneNumber($contact->getPhone());

        $this->data['agencies'] = array_map(fn($agencyId) => new Agency($agencyId), $this->user->getAuthorizedAgenciesId());
        $this->data['deal'] = $deal;
        $this->data['contact'] = $contact;
        $this->data['responsibleList'] = $agency->getUsers();
        $this->data['notes'] = $deal->getNotes();

        $this->data['actions'] = [];

        $this->data['actions'][] = new TopbarAction([
            'attributes' => [
                'class' => 'delete-deal danger',
                'title' => 'ELIMINA'
            ],
            'label' => 'ELIMINA',
            'icon' => 'trash'
        ]);

        if ($agency->smtpIsEnabled()) {
            $this->data['actions'][] = new TopbarAction([
                'attributes' => [
                    'class' => 'send-email-modal muted',
                    'data-email' => $contact->getEmail()
                ],
                'label' => 'EMAIL',
                'icon' => 'envelope'
            ]);
        }

        if ($sanitizedPhone) {
            $this->data['actions'][] = (new TopbarAction([
                'attributes' => [
                    'class' => 'whatsapp',
                    'href' => sprintf('https://wa.me/%s', $sanitizedPhone),
                    'target' => '_blank'
                ],
                'label' => 'WHATSAPP',
                'icon' => 'whatsapp'
            ]))->setIconType('brands');
        }

        $this->data['actions'][] = new TopbarAction([
            'attributes' => [
                'class' => 'save-deal success'
            ],
            'label' => 'SALVA',
            'icon' => 'check'
        ]);

        return $this->render();
    }

}
