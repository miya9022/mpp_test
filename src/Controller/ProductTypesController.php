<?php
namespace App\Controller;



use App\Controller\AppController;



/**

 * ProductTypes Controller

 *

 * @property \App\Model\Table\ProductTypesTable $ProductTypes

 */

class ProductTypesController extends AppController

{



    /**

     * Index method

     *

     * @return void

     */

    public function index()

    {

        $this->set('productTypes', $this->paginate($this->ProductTypes));

        $this->set('_serialize', ['productTypes']);

    }



    /**

     * View method

     *

     * @param string|null $id Product Type id.

     * @return void

     * @throws \Cake\Network\Exception\NotFoundException When record not found.

     */

    public function view($id = null)

    {

        $productType = $this->ProductTypes->get($id, [

            'contain' => []

        ]);

        parent::loadData();

        $this->set('productType', $productType);

        $this->set('_serialize', ['productType']);

    }

    /**

     * Add method

     *

     * @return void Redirects on successful add, renders view otherwise.

     */

    public function add()

    {

        $productType = $this->ProductTypes->newEntity();

        if ($this->request->is('post')) {

            $productType = $this->ProductTypes->patchEntity($productType, $this->request->data);

            if ($this->ProductTypes->save($productType)) {

                $this->Flash->success(__('The product type has been saved.'));

                return $this->redirect(['action' => 'index']);

            } else {

                $this->Flash->error(__('The product type could not be saved. Please, try again.'));

            }

        }

        $this->set(compact('productType'));

        $this->set('_serialize', ['productType']);

    }



    /**

     * Edit method

     *

     * @param string|null $id Product Type id.

     * @return void Redirects on successful edit, renders view otherwise.

     * @throws \Cake\Network\Exception\NotFoundException When record not found.

     */

    public function edit($id = null)

    {

        $productType = $this->ProductTypes->get($id, [

            'contain' => []

        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {

            $productType = $this->ProductTypes->patchEntity($productType, $this->request->data);

            if ($this->ProductTypes->save($productType)) {

                $this->Flash->success(__('The product type has been saved.'));

                return $this->redirect(['action' => 'index']);

            } else {

                $this->Flash->error(__('The product type could not be saved. Please, try again.'));

            }

        }

        $this->set(compact('productType'));

        $this->set('_serialize', ['productType']);

    }



    /**

     * Delete method

     *

     * @param string|null $id Product Type id.

     * @return \Cake\Network\Response|null Redirects to index.

     * @throws \Cake\Network\Exception\NotFoundException When record not found.

     */

    public function delete($id = null)

    {

        $this->request->allowMethod(['post', 'delete']);

        $productType = $this->ProductTypes->get($id);

        if ($this->ProductTypes->delete($productType)) {

            $this->Flash->success(__('The product type has been deleted.'));

        } else {

            $this->Flash->error(__('The product type could not be deleted. Please, try again.'));

        }

        return $this->redirect(['action' => 'index']);

    }

}