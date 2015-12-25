<?php

namespace App\Controller;



use App\Controller\AppController;
use Cake\ORM\TableRegistry;


/**
 * Products Controller
 *
 * @property \App\Model\Table\ProductsTable $Products
 */

class ProductsController extends AppController

{



    /**
     * index method
     *
     * @return void
     */

    public function index($id = null)

    {

        parent::loadData();

        $this->set('page_title', 'Sản phẩm');
        $this->set('page_title_en', 'Products');

        $products_loaded = TableRegistry::get('Products');

        if(isset($id)){
            $this->set('active_type', $id);
        }
        
        $types = TableRegistry::get('product_types')->find('all');
        $count = 1;
        foreach ($types as $type) {
            $productsByTypeId = $products_loaded->find('all')
                                    ->where(['Products.type_id' => $type->id]);
            $this->set('products' . $count, $productsByTypeId);
            $count++;
        }

        $this->paginate = [

            'contain' => ['ProductTypes']

        ];

        $this->set('products', $this->paginate($this->Products));

        $this->set('_serialize', ['products']);

    }



    /**
     * View method
     *
     * @param string|null $id Product id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */

    public function view($id = null)

    {
        parent::loadData();

        $this->set('page_title', 'Sản phẩm');
        $this->set('page_title_en', 'Products');

        $product = $this->Products->get($id, [

            'contain' => ['ProductTypes', 'OrderDetail']

        ]);

        $this->set('product', $product);

        $this->set('_serialize', ['product']);

    }



    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */

    public function add()

    {

        $product = $this->Products->newEntity();

        if ($this->request->is('post')) {

            $product = $this->Products->patchEntity($product, $this->request->data);

            if ($this->Products->save($product)) {

                $this->Flash->success(__('The product has been saved.'));

                return $this->redirect(['action' => 'index']);

            } else {

                $this->Flash->error(__('The product could not be saved. Please, try again.'));

            }

        }

        $productTypes = $this->Products->ProductTypes->find('list', ['limit' => 200]);

        $this->set(compact('product', 'productTypes'));

        $this->set('_serialize', ['product']);

    }



    /*
     *
     * Edit method
     *
     * @param string|null $id Product id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */

    public function edit($id = null)

    {

        $product = $this->Products->get($id, [

            'contain' => []

        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {

            $product = $this->Products->patchEntity($product, $this->request->data);

            if ($this->Products->save($product)) {

                $this->Flash->success(__('The product has been saved.'));

                return $this->redirect(['action' => 'index']);

            } else {

                $this->Flash->error(__('The product could not be saved. Please, try again.'));

            }

        }

        $productTypes = $this->Products->ProductTypes->find('list', ['limit' => 200]);

        $this->set(compact('product', 'productTypes'));

        $this->set('_serialize', ['product']);

    }



    /*
     *
     * Delete method
     *
     * @param string|null $id Product id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */

    public function delete($id = null)

    {

        $this->request->allowMethod(['post', 'delete']);

        $product = $this->Products->get($id);

        if ($this->Products->delete($product)) {

            $this->Flash->success(__('The product has been deleted.'));

        } else {

            $this->Flash->error(__('The product could not be deleted. Please, try again.'));

        }

        return $this->redirect(['action' => 'index']);

    }

    public function type($id = null) {
        parent::loadData();
        $products_loaded = TableRegistry::get('Products');
        $productsByTypeId = $products_loaded->find('all')
                                    ->where(['Products.type_id' => $id]);
        $types = TableRegistry::get('product_types')->find('all')->where(['product_types.id' => $id]);
        foreach ($types as $type) {
            $this->set('page_title', $type->name);
        }
        $this->set('products_type', $productsByTypeId);
        $this->set(compact('products_type'));
    } 

}

