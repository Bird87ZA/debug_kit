<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @license       https://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace DebugKit\Controller;

use Cake\Event\Event;

/**
 * Provides access to panel data.
 *
 * @property \DebugKit\Model\Table\RequestsTable $Requests
 */
class RequestsController extends DebugKitController
{
    /**
     * Before filter handler.
     *
     * @param \Cake\Event\Event $event The event.
     * @return void
     */
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);

        $this->response = $this->response->withHeader('Content-Security-Policy', '');
    }

    /**
     * Before render handler.
     *
     * @param \Cake\Event\Event $event The event.
     * @return void
     */
    public function beforeRender(Event $event)
    {
        $this->viewBuilder()
            ->setLayout('DebugKit.toolbar')
            ->setClassName('DebugKit.Ajax');
    }

    /**
     * View a request's data.
     *
     * @param string $id The id.
     * @return void
     */
    public function view($id = null)
    {
        $toolbar = $this->Requests->get($id, ['contain' => 'Panels']);
        $this->set('toolbar', $toolbar);
    }
}
