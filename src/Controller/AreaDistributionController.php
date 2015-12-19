<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * AreaDistribution Controller
 *
 * @property \App\Model\Table\AreaDistributionTable $AreaDistribution
 */
class AreaDistributionController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('areaDistribution', $this->paginate($this->AreaDistribution));
        $this->set('_serialize', ['areaDistribution']);
    }

    /**
     * View method
     *
     * @param string|null $id Area Distribution id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $areaDistribution = $this->AreaDistribution->get($id, [
            'contain' => []
        ]);
        $this->set('areaDistribution', $areaDistribution);
        $this->set('_serialize', ['areaDistribution']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $areaDistribution = $this->AreaDistribution->newEntity();
        if ($this->request->is('post')) {
            $areaDistribution = $this->AreaDistribution->patchEntity($areaDistribution, $this->request->data);
            if ($this->AreaDistribution->save($areaDistribution)) {
                $this->Flash->success(__('The area distribution has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The area distribution could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('areaDistribution'));
        $this->set('_serialize', ['areaDistribution']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Area Distribution id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $areaDistribution = $this->AreaDistribution->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $areaDistribution = $this->AreaDistribution->patchEntity($areaDistribution, $this->request->data);
            if ($this->AreaDistribution->save($areaDistribution)) {
                $this->Flash->success(__('The area distribution has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The area distribution could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('areaDistribution'));
        $this->set('_serialize', ['areaDistribution']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Area Distribution id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $areaDistribution = $this->AreaDistribution->get($id);
        if ($this->AreaDistribution->delete($areaDistribution)) {
            $this->Flash->success(__('The area distribution has been deleted.'));
        } else {
            $this->Flash->error(__('The area distribution could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
