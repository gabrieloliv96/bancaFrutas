<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Classificacaos Controller
 *
 * @property \App\Model\Table\ClassificacaosTable $Classificacaos
 * @method \App\Model\Entity\Classificacao[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ClassificacaosController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $classificacaos = $this->paginate($this->Classificacaos);

        $this->set(compact('classificacaos'));
    }

    /**
     * View method
     *
     * @param string|null $id Classificacao id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $classificacao = $this->Classificacaos->get($id, [
            'contain' => ['Frutas'],
        ]);

        $this->set(compact('classificacao'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $classificacao = $this->Classificacaos->newEmptyEntity();
        if ($this->request->is('post')) {
            $classificacao = $this->Classificacaos->patchEntity($classificacao, $this->request->getData());
            if ($this->Classificacaos->save($classificacao)) {
                $this->Flash->success(__('The classificacao has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The classificacao could not be saved. Please, try again.'));
        }
        $this->set(compact('classificacao'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Classificacao id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $classificacao = $this->Classificacaos->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $classificacao = $this->Classificacaos->patchEntity($classificacao, $this->request->getData());
            if ($this->Classificacaos->save($classificacao)) {
                $this->Flash->success(__('The classificacao has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The classificacao could not be saved. Please, try again.'));
        }
        $this->set(compact('classificacao'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Classificacao id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $classificacao = $this->Classificacaos->get($id);
        if ($this->Classificacaos->delete($classificacao)) {
            $this->Flash->success(__('The classificacao has been deleted.'));
        } else {
            $this->Flash->error(__('The classificacao could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
