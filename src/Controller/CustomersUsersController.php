<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * CustomersUsers Controller
 *
 * @property \App\Model\Table\CustomersUsersTable $CustomersUsers
 *
 * @method \App\Model\Entity\CustomersUser[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CustomersUsersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Customers', 'Users'],
        ];
        $customersUsers = $this->paginate($this->CustomersUsers);

        $this->set(compact('customersUsers'));
    }

    /**
     * View method
     *
     * @param string|null $id Customers User id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $customersUser = $this->CustomersUsers->get($id, [
            'contain' => ['Customers', 'Users'],
        ]);

        $this->set('customersUser', $customersUser);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $customersUser = $this->CustomersUsers->newEmptyEntity();
        if ($this->request->is('post')) {
            $customersUser = $this->CustomersUsers->patchEntity($customersUser, $this->request->getData());
            if ($this->CustomersUsers->save($customersUser)) {
                $this->Flash->success(__('The customers user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The customers user could not be saved. Please, try again.'));
        }
        $customers = $this->CustomersUsers->Customers->find('list', ['limit' => 200]);
        $users = $this->CustomersUsers->Users->find('list', ['limit' => 200]);
        $this->set(compact('customersUser', 'customers', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Customers User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $customersUser = $this->CustomersUsers->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $customersUser = $this->CustomersUsers->patchEntity($customersUser, $this->request->getData());
            if ($this->CustomersUsers->save($customersUser)) {
                $this->Flash->success(__('The customers user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The customers user could not be saved. Please, try again.'));
        }
        $customers = $this->CustomersUsers->Customers->find('list', ['limit' => 200]);
        $users = $this->CustomersUsers->Users->find('list', ['limit' => 200]);
        $this->set(compact('customersUser', 'customers', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Customers User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $customersUser = $this->CustomersUsers->get($id);
        if ($this->CustomersUsers->delete($customersUser)) {
            $this->Flash->success(__('The customers user has been deleted.'));
        } else {
            $this->Flash->error(__('The customers user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
