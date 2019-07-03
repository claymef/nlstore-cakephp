<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Modelos Controller
 *
 * @property \App\Model\Table\ModelosTable $Modelos
 *
 * @method \App\Model\Entity\Modelo[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ModelosController extends AppController
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
            'contain' => ['Almacenes', 'Prendas']
        ];
        $modelos = $this->paginate($this->Modelos->find());

        $this->set(compact('modelos'));
    }

    /**
     * View method
     *
     * @param string|null $id Modelo id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $modelo = $this->Modelos->get($id, [
            'contain' => ['Almacenes', 'Prendas']
        ]);

        $this->set('modelo', $modelo);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $modelo = $this->Modelos->newEntity();
        if ($this->request->is('post')) {
            $modelo = $this->Modelos->patchEntity($modelo, $this->request->getData());
            $modelo->user_id = $this->Auth->user('user_id');
            if ($this->Modelos->save($modelo)) {
                $this->Flash->success(__('The modelo has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The modelo could not be saved. Please, try again.'));
        }
        $almacenes = $this->Modelos->Almacenes->find('list', ['keyField' => 'almacen_id', 'valueField' => 'almacen_nombre']);
        $this->set(compact('modelo', 'almacenes'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Modelo id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $modelo = $this->Modelos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $modelo = $this->Modelos->patchEntity($modelo, $this->request->getData());
            if ($this->Modelos->save($modelo)) {
                $this->Flash->success(__('The modelo has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The modelo could not be saved. Please, try again.'));
        }
        $almacenes = $this->Modelos->Almacenes->find('list', ['keyField' => 'almacen_id', 'valueField' => 'almacen_nombre']);
        $this->set(compact('modelo', 'almacenes'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Modelo id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $modelo = $this->Modelos->get($id);
        if ($this->Modelos->delete($modelo)) {
            $this->Flash->success(__('The modelo has been deleted.'));
        } else {
            $this->Flash->error(__('The modelo could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    
}
