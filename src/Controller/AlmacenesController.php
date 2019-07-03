<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Almacenes Controller
 *
 * @property \App\Model\Table\AlmacenesTable $Almacenes
 *
 * @method \App\Model\Entity\Almacene[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AlmacenesController extends AppController
{
    public function initialize() {
        parent::initialize();
        $this->loadComponent('Paginator');
        $this->loadComponent('Flash');
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->loadComponent('Paginator');
        $this->paginate = [
            'contain' => ['Users']
        ];
        $almacenes = $this->paginate($this->Almacenes->find());

        $this->set(compact('almacenes'));
    }

    /**
     * View method
     *
     * @param string|null $id Almacene id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $almacene = $this->Almacenes->get($id, [
            'contain' => ['Users', 'Modelos']
        ]);

        $this->set('almacene', $almacene);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $almacene = $this->Almacenes->newEntity();
        if ($this->request->is('post')) {
            $almacene = $this->Almacenes->patchEntity($almacene, $this->request->getData());
            $almacene->user_id = $this->Auth->user('user_id');
            if ($this->Almacenes->save($almacene)) {
                $this->Flash->success(__('The almacene has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The almacene could not be saved. Please, try again.'));
        }
        
        $this->set('almacene', $almacene);
    }

    /**
     * Edit method
     *
     * @param string|null $id Almacene id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id)
    {
        $almacene = $this->Almacenes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $this->Almacenes->patchEntity($almacene, $this->request->getData(), ['accessibleFields' => ['user_id' => false]]);
            if ($this->Almacenes->save($almacene)) {
                $this->Flash->success(__('The almacene has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The almacene could not be saved. Please, try again.'));
        }
        $users = $this->Almacenes->Users->find('list', ['keyField' => 'user_id', 'valueField' => 'user_nombre']);
        $this->set(compact('almacene', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Almacene id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $almacene = $this->Almacenes->get($id);
        if ($this->Almacenes->delete($almacene)) {
            $this->Flash->success(__('The almacene has been deleted.'));
        } else {
            $this->Flash->error(__('The almacene could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function isAuthorized($user)
    {
        if ($this->request->getParam('action') === 'add') {
            return true;
        }

        if (in_array($this->request->getParam('action'), ['edit', 'delete'])) {
            $almaceneId = (int)$this->request->getParam('pass.0');
            if ($this->Almacenes->isOwnedBy($almaceneId, $user['user_id'])) {
                return true;
            }            
        }

        return parent::isAuthorized($user);
    }
}
