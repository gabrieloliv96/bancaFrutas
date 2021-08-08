<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Vendas Controller
 *
 * @property \App\Model\Table\VendasTable $Vendas
 * @method \App\Model\Entity\Venda[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class VendasController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Frutas', 'Usuarios'],
        ];
        $vendas = $this->paginate($this->Vendas);

        $this->set(compact('vendas'));
    }

    /**
     * View method
     *
     * @param string|null $id Venda id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $venda = $this->Vendas->get($id, [
            'contain' => ['Frutas', 'Usuarios'],
        ]);

        $this->set(compact('venda'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {   
        $this->loadModel('Frutas');
        // $frutas = $this->Frutas->find()->where(['qtd_disponivel<='vendas.qtd_vendida']);       
        // debug($frutas->toArray());exit;
        
        $venda = $this->Vendas->newEmptyEntity();

        if ($this->request->is('post')) {
            
            $venda = $this->Vendas->patchEntity($venda, $this->request->getData());
            // debug($venda->toArray());exit;
            $fruta =  $this->Frutas->find("all")->select('qtd_disponivel')->where(['id_fruta'=>$venda->fruta_id]);
            $qtd_frutas = $fruta->qtd_disponivel;
            // debug($fruta->toArray());exit;
            // debug($venda->toArray());exit;


            if($venda->qtd_vendida<=($qtd_frutas)){

                if ($this->Vendas->save($venda)) {

                    $this->Flash->success(__('The venda has been saved.'));
                    
                    

                    return $this->redirect(['action' => 'index']);
                }
                
            }else
            {
                $this->Flash->error(__('The venda could not be saved. Please, try again.'));
            }
        }
        $frutas = $this->Vendas->Frutas->find('list', ['limit' => 200]);
        $usuarios = $this->Vendas->Usuarios->find('list', ['limit' => 200]);
        $this->set(compact('venda', 'frutas', 'usuarios'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Venda id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $venda = $this->Vendas->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $venda = $this->Vendas->patchEntity($venda, $this->request->getData());
            if ($this->Vendas->save($venda)) {
                $this->Flash->success(__('The venda has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The venda could not be saved. Please, try again.'));
        }
        $frutas = $this->Vendas->Frutas->find('list', ['limit' => 200]);
        $usuarios = $this->Vendas->Usuarios->find('list', ['limit' => 200]);
        $this->set(compact('venda', 'frutas', 'usuarios'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Venda id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $venda = $this->Vendas->get($id);
        if ($this->Vendas->delete($venda)) {
            $this->Flash->success(__('The venda has been deleted.'));
        } else {
            $this->Flash->error(__('The venda could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
