<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Http\Exception\NotFoundException;
use Cake\Mailer\Transport\MailTransport;
use Cake\Mailer\Email;
//use Cake\Network\Email\Email;
/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
  /**  public function correo(){
        $this->autoRender = false;
        Email::configTransport('mail',[
            'host' => 'ssl://smtp.gmail.com',
            'port' => 465,

            'username' => 'nl.store.aqp@gmail.com',
            'password' => 'nlstore123',

            'className' => 'Smtp',
        ]);

        $correo = new Email();
        $correo
            ->setTransport('mail')
            ->setTemplate('correo_plantilla')
            ->setEmailFormat('html')
            ->setTo($user->user_correo)
            ->setFrom('nl.store.aqp@gmail.com')
            ->setSubject('Bienvenido')
            ->setViewVars([
                'var1' => 'Gonzalo'
                'var2' => 'Fernandez'
                'var3' => 'http://localhost/proyectoweb2/users/'
            ]);
        if ($correo->send()) {
            echo "Correo enviado";
        }else{
            echo "Ups error man";
        }
    }**/
    public function initialize()
    {
        parent::initialize();
        $this->Auth->allow(['logout', 'add']);
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
        //$this->set('users', $this->Users->find('all'));
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id)
    {
        $user = $this->Users->get($id);

        //$factura = $this->Users->Facturas->find('list', ['keyField' => 'factura_id', 'valueField' => 'factura_id']);

        $this->set(compact('user'));
        /**if (!$id) {
            throw new NotFoundException(__('Invalid user'));
        }

        $user = $this->Users->get($id);
        $this->set(compact('user'));**/
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                /**$this->autoRender = false;
                Email::configTransport('mail',[
                    'host' => 'ssl://smtp.gmail.com',
                    'port' => 465,

                    'username' => 'nl.store.aqp@gmail.com',
                    'password' => 'nlstore123',

                    'className' => 'Smtp',
                ]);

                $correo = new Email();
                $correo
                    ->setTransport('mail')
                    ->setTemplate('correo_plantilla')
                    ->setEmailFormat('html')
                    ->setTo($user->user_correo)
                    ->setFrom('nl.store.aqp@gmail.com')
                    ->setSubject('Bienvenido')
                    ->setViewVars([
                        'var1' => $user->user_nombre,
                        'var2' => 'http://localhost/proyectoweb2/users/'
                    ]);
                if ($correo->send()) {
                    echo "Correo enviado";
                }else{
                    echo "Ups error man";
                }**/
                $correo=$this->request->getData('user_correo');
                $email = new Email('default');
                $email->from(['victorraulqq1@gmail.com' => 'NL Store'])
                    ->to($correo)
                    -> emailFormat ( 'html' ) 
                    ->subject('Your new account on NLStore')
                    ->send('<table style="max-width: 600px; padding: 10px; margin:0 auto; border-collapse: collapse;">
                    <tr>
                        <td style="padding: 0">
                            <img style="padding: 0; display: block" src="https://colorlib.com/preview/theme/cozastore/images/blog-04.jpg" width="100%">
                        </td>
                    </tr>
                    
                    <tr>
                        <td style="background-color: #ecf0f1">
                            <div style="color: #34495e; margin: 4% 10% 2%; text-align: justify;font-family: sans-serif">
                                <h2 style="color: #e67e22; margin: 0 0 7px">Welcome to NLStore!</h2>
                                <p style="margin: 2px; font-size: 15px">
                                Thank you for registering at NLStore, your account has been activated.</p>
                                <p style="margin: 2px; font-size: 15px">
                                We are always pleased that you send us your comments or requests to improve our services. We want you to enjoy our member services!</p>
                                <p style="margin: 2px; font-size: 15px">
                                Thanks and enjoy :)</p>
                                <div style="width: 100%;margin:20px 0; display: inline-block;text-align: center">
                                    <img style="padding: 0; width: 200px; margin: 5px" src="https://colorlib.com/preview/theme/cozastore/images/slide-05.jpg">
                                </div>
                                <div style="width: 100%; text-align: center">
                                    <a style="text-decoration: none; border-radius: 5px; padding: 11px 23px; color: white; background-color: #3498db" href="http://localhost/proyectoweb2/">Ir a la página</a> 
                                </div>
                                <p style="color: #b3b3b3; font-size: 12px; text-align: center;margin: 30px 0 0">Team NL Store 2019</p>
                            </div>
                        </td>
                    </tr>
                </table>');
                $this->Flash->success(__('The user has been saved.'.$correo));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set('user', $user);
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData(), ['accessibleFields' => ['user_id' => false]]);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    public function login()
    {
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error(__('Your username or password is incorrect.'));
        }
    }

    public function logout()
    {
        $this->Flash->success('You are now logged out.');
        return $this->redirect($this->Auth->logout());
    }
    public function isAuthorized($user)
    {
        if ($this->request->getParam('action') === 'add') {
            return true;
        }

        if (in_array($this->request->getParam('action'), ['edit', 'delete'])) {
            $userId = (int)$this->request->getParam('pass.0');
            if ($this->Users->isOwnedBy($userId)) {
                return true;
            }            
        }

        return parent::isAuthorized($user);
    }
}
