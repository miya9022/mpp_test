<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link http://book.cakephp.org/3.0/en/controllers.html#the-app-controller
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

        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
    }

    // public function beforeFilter() {
    //     parent::beforeFilter();

    //     if(in_array($this->action, array('export'))) {
    //         $this->Components->unload('DebugKit.Toolbar');
    //     }
    // }

    /**
     * Before render callback.
     *
     * @param \Cake\Event\Event $event The beforeRender event.
     * @return void
     */
    public function beforeRender(Event $event)
    {
        if (!array_key_exists('_serialize', $this->viewVars) &&
            in_array($this->response->type(), ['application/json', 'application/xml'])
        ) {
            $this->set('_serialize', true);
        }
    }

    protected function loadData()
    {
        $this->loadProducts();
        $this->loadServices();
        $this->loadAreas();
    }

    protected function loadServices()
    {
        $services_loaded = TableRegistry::get('Services');
        $services = $services_loaded->find();
        $this->set('services', $services);
        $this->set(compact('services'));
    }

    protected function loadProducts()
    {
        $types_product_loaded = TableRegistry::get('Product_types');
        $types_product = $types_product_loaded->find();
        $this->set('types_product', $types_product);
        $this->set(compact('types_product'));
    }

    protected function loadAreas()
    {
        $area_loaded = TableRegistry::get('area_distribution');
        $areas = $area_loaded->find();
        $this->set('areas', $areas);
        $this->set(compact('areas')); 
    }
}
