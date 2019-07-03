<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Facturas Controller
 *
 * @property \App\Model\Table\FacturasTable $Facturas
 *
 * @method \App\Model\Entity\Factura[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class FacturasController extends AppController
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
        $facturas = $this->paginate($this->Facturas->find());

        $this->set(compact('facturas'));
    }

    /**
     * View method
     *
     * @param string|null $id Factura id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $factura = $this->Facturas->get($id, [
            'contain' => ['Users', 'Detalleventa']
        ]);

        /**$users = $this->Facturas->Users->find('list', ['keyField' => 'user_id', 'valueField' => 'user_nombre']);
        $prendas = $this->Facturas->Detalleventa->find('list', ['keyField' => 'detalle_id', 'valueField' => 'prenda_nombre']);
        **/
        $this->set('factura', $factura);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $factura = $this->Facturas->newEntity();
        if ($this->request->is('post')) {
            $factura = $this->Facturas->patchEntity($factura, $this->request->getData());
            $factura->user_id = $this->Auth->user('user_id');
            if ($this->Facturas->save($factura)) {
                $this->Flash->success(__('The factura has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The factura could not be saved. Please, try again.'));
        }
        
        $this->set('factura', $factura);
    }

    /**
     * Edit method
     *
     * @param string|null $id Factura id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id)
    {
        $factura = $this->Facturas->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $this->Facturas->patchEntity($factura, $this->request->getData(), ['accessibleFields' => ['user_id' => false]]);
            if ($this->Facturas->save($factura)) {
                $this->Flash->success(__('The factura has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The factura could not be saved. Please, try again.'));
        }
        $users = $this->Facturas->Users->find('list', ['keyField' => 'user_id', 'valueField' => 'user_nombre']);
        $this->set(compact('factura', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Factura id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $factura = $this->Facturas->get($id);
        if ($this->Facturas->delete($factura)) {
            $this->Flash->success(__('The factura has been deleted.'));
        } else {
            $this->Flash->error(__('The factura could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function isAuthorized($user)
    {
        if ($this->request->getParam('action') === 'add') {
            return true;
        }

        if (in_array($this->request->getParam('action'), ['edit', 'delete'])) {
            $facturaId = (int)$this->request->getParam('pass.0');
            if ($this->Facturas->isOwnedBy($facturaId, $user['user_id'])) {
                return true;
            }            
        }

        return parent::isAuthorized($user);
    }
}
