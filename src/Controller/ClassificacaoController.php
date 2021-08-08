<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Classificacao Controller
 *
 * @property \App\Model\Table\ClassificacaoTable $Classificacao
 * @method \App\Model\Entity\Classificacao[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ClassificacaoController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $classificacao = $this->paginate($this->Classificacao);

        $this->set(compact('classificacao'));
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
        $classificacao = $this->Classificacao->get($id, [
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
        $classificacao = $this->Classificacao->newEmptyEntity();
        if ($this->request->is('post')) {
            $classificacao = $this->Classificacao->patchEntity($classificacao, $this->request->getData());
            if ($this->Classificacao->save($classificacao)) {
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
        $classificacao = $this->Classificacao->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $classificacao = $this->Classificacao->patchEntity($classificacao, $this->request->getData());
            if ($this->Classificacao->save($classificacao)) {
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
        $classificacao = $this->Classificacao->get($id);
        if ($this->Classificacao->delete($classificacao)) {
            $this->Flash->success(__('The classificacao has been deleted.'));
        } else {
            $this->Flash->error(__('The classificacao could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
