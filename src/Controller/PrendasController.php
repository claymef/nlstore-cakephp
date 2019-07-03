<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Prendas Controller
 *
 * @property \App\Model\Table\PrendasTable $Prendas
 *
 * @method \App\Model\Entity\Prenda[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PrendasController extends AppController
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
            'contain' => ['Modelos']
        ];
        $prendas = $this->paginate($this->Prendas);

        $this->set(compact('prendas'));
    }

    /**
     * View method
     *
     * @param string|null $id Prenda id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $prenda = $this->Prendas->get($id, [
            'contain' => ['Modelos']
        ]);

        $this->set('prenda', $prenda);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $prenda = $this->Prendas->newEntity();
        if ($this->request->is('post')) {
            $prenda = $this->Prendas->patchEntity($prenda, $this->request->getData());
            $prenda->user_id = $this->Auth->user('user_id');
            if ($this->Prendas->save($prenda)) {
                $this->Flash->success(__('The prenda has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The prenda could not be saved. Please, try again.'));
        }
        $modelos = $this->Prendas->Modelos->find('list', ['keyField' => 'modelo_id', 'valueField' => 'modelo_nombre']);
        $this->set(compact('prenda', 'modelos'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Prenda id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id)
    {
        $prenda = $this->Prendas->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $prenda = $this->Prendas->patchEntity($prenda, $this->request->getData());
            if ($this->Prendas->save($prenda)) {
                $this->Flash->success(__('The prenda has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The prenda could not be saved. Please, try again.'));
        }
        $modelos = $this->Prendas->Modelos->find('list', ['keyField' => 'modelo_id', 'valueField' => 'modelo_nombre']);
        $this->set(compact('prenda', 'modelos'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Prenda id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id)
    {
        $this->request->allowMethod(['post', 'delete']);
        $prenda = $this->Prendas->get($id);
        if ($this->Prendas->delete($prenda)) {
            $this->Flash->success(__('The prenda has been deleted.'));
        } else {
            $this->Flash->error(__('The prenda could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

}
