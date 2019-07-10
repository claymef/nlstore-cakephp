<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Detalleventa Controller
 *
 * @property \App\Model\Table\DetalleventaTable $Detalleventa
 *
 * @method \App\Model\Entity\Detalleventum[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DetalleventaController extends AppController
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
        $this->paginate = [
            'contain' => ['Facturas', 'Prendas']
        ];
        $detalleventa = $this->paginate($this->Detalleventa);

        $this->set(compact('detalleventa'));
    }

    /**
     * View method
     *
     * @param string|null $id Detalleventum id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $detalleventum = $this->Detalleventa->get($id, [
            'contain' => ['Facturas', 'Prendas']
        ]);

        $this->set('detalleventum', $detalleventum);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $detalleventum = $this->Detalleventa->newEntity();
        if ($this->request->is('post')) {
            $detalleventum = $this->Detalleventa->patchEntity($detalleventum, $this->request->getData());
            $detalleventum->user_id = $this->Auth->user('user_id');
            if ($this->Detalleventa->save($detalleventum)) {
                $this->Flash->success(__('The detalleventum has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The detalleventum could not be saved. Please, try again.'));
        }
        $facturas = $this->Detalleventa->Facturas->find('list', ['limit' => 200]);
        $prendas = $this->Detalleventa->Prendas->find('list', ['keyField' => 'prenda_id', 'valueField' => 'prenda_nombre']);
        $this->set(compact('detalleventum', 'facturas', 'prendas'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Detalleventum id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $detalleventum = $this->Detalleventa->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $detalleventum = $this->Detalleventa->patchEntity($detalleventum, $this->request->getData());
            if ($this->Detalleventa->save($detalleventum)) {
                $this->Flash->success(__('The detalleventum has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The detalleventum could not be saved. Please, try again.'));
        }
        $facturas = $this->Detalleventa->Facturas->find('list', ['limit' => 200]);
        $prendas = $this->Detalleventa->Prendas->find('list', ['keyField' => 'prenda_id', 'valueField' => 'prenda_nombre']);
        $this->set(compact('detalleventum', 'facturas', 'prendas'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Detalleventum id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $detalleventum = $this->Detalleventa->get($id);
        if ($this->Detalleventa->delete($detalleventum)) {
            $this->Flash->success(__('The detalleventum has been deleted.'));
        } else {
            $this->Flash->error(__('The detalleventum could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function isAuthorized($detalleventa)
    {
        if ($this->request->getParam('action') === 'add') {
            return true;
        }

        if (in_array($this->request->getParam('action'), ['edit', 'delete'])) {
            $detalleId = (int)$this->request->getParam('pass.0');
            if ($this->Detalleventa->isOwnedBy($detalleId)) {
                return true;
            }            
        }

        return parent::isAuthorized($detalleventa);
    }
}
