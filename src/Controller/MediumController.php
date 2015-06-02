<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Medium Controller
 *
 * @property \App\Model\Table\MediumTable $Medium
 */
class MediumController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Article']
        ];
        $this->set('medium', $this->paginate($this->Medium));
        $this->set('_serialize', ['medium']);
    }

    /**
     * View method
     *
     * @param string|null $id Medium id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $medium = $this->Medium->get($id, [
            'contain' => ['Article']
        ]);
        $this->set('medium', $medium);
        $this->set('_serialize', ['medium']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $medium = $this->Medium->newEntity();
        if ($this->request->is('post')) {
            $medium = $this->Medium->patchEntity($medium, $this->request->data);
            if ($this->Medium->save($medium)) {
                $this->Flash->success(__('The medium has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The medium could not be saved. Please, try again.'));
            }
        }
//        $webs = $this->Medium->find('list', ['limit' => 200]);
        $this->set(compact('medium'));
        $this->set('_serialize', ['medium']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Medium id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $medium = $this->Medium->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $medium = $this->Medium->patchEntity($medium, $this->request->data);
            if ($this->Medium->save($medium)) {
                $this->Flash->success(__('The medium has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The medium could not be saved. Please, try again.'));
            }
        }
        $webs = $this->Medium->find('list', ['limit' => 200]);
        $this->set(compact('medium'));
        $this->set('_serialize', ['medium']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Medium id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $medium = $this->Medium->get($id);
        if ($this->Medium->delete($medium)) {
            $this->Flash->success(__('The medium has been deleted.'));
        } else {
            $this->Flash->error(__('The medium could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
