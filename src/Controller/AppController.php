<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\I18n\I18n;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('RequestHandler', [
            'enableBeforeRedirect' => false,
        ]);
        $this->loadComponent('Flash');

        /*
         * Enable the following component for recommended CakePHP security settings.
         * see https://book.cakephp.org/3.0/en/controllers/components/security.html
         */
        //$this->loadComponent('Security');

       $this->loadComponent('Auth', [
            'authorize'=> 'Controller',
            'authenticate' => [
                'Form' => [
                    'fields' => [
                        'username' => 'user_correo',
                        'password' => 'user_contraseña'
                    ]
                ]
            ],
            'loginAction' => [
                'controller' => 'Users',
                'action' => 'login'
            ],
                        
            // If unauthorized, return them to page they were just on
            'unauthorizedRedirect' => $this->referer()
        ]);        

        $this->Auth->allow(['display', 'view', 'index','changeLanguage']);
    }

    public function isAuthorized($user)
    {
        if (isset($user['user_role']) && $user['user_role'] === 'admin') {
            return true;
        }
        if(isset($user['user_correo']) && $user['user_correo'] === 'user_correo'){
            return true;
        }
        // By default deny access.
        return false;
    }

    public function changeLanguage($language=null)
    {
        if($language!=null && in_array($language, ['en_US','es_PE','pt_BR']))
        {
            $this->request->session()->write('Config.language',$language);
            return $this->redirect( $this->referer());
        }
        else
        {
            $this->request->session()->write('Config.language',$I18n::locale());
            return $this->redirect( $this->referer());
        }
    }
    public function beforeFilter(Event $event)
    {
        if( $this->request->session()->check('Config.language'))
        {
            I18n::setLocale($this->request->session()->read('Config.language'));
        }
        else
        {
            $this->request->session()->write('Config.language',I18n::locale());
        }
    }
}
