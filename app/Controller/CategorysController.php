<?php
class CategorysController extends AppController {
    public $helpers = array('Html', 'Form');
    public function index() {
        $this->set('categorys', $this->Category->find('all'));
    }
    public function add(){
        if ($this->request->is('post')) {
            $this->Category->create();
          //  $this->request->data['Category']['user_id'] = $this->Auth->user('id');
            if ($this->Category->save($this->request->data)) {
                $this->Session->setFlash(__('Your Category has been saved.'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('Unable to add your Category.'));
        }
    }
    public function edit($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid Category'));
        }

        $category = $this->Category->findById($id);
        if (!$category) {
            throw new NotFoundException(__('Invalid Category'));
        }

        if ($this->request->is(array('post', 'put'))) {
            $this->Category->id = $id;
            if ($this->Category->save($this->request->data)) {
                $this->Session->setFlash(__('Your Category has been updated.'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('Unable to update your Category.'));
        }

        if (!$this->request->data) {
            $this->request->data = $category;
        }
    }
    public function delete($id) {
        if ($this->request->is('get')) {
            throw new MethodNotAllowedException();
        }

        if ($this->Category->delete($id)) {
            $this->Session->setFlash(
                __('The product with id: %s has been deleted.', h($id))
            );
            return $this->redirect(array('action' => 'index'));
        }
    }
}