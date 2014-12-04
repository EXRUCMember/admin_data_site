<?php
class ProductsController extends AppController {
    public $uses = array('Product', 'Category','User');
    public $helpers = array('Html', 'Form');
    public function index() {
        if ($this->Auth->login()) {

              //  $data = $this->set('products', $this->Product->find('all'));
                $data = $this->Product->query("SELECT * FROM products INNER JOIN categories ON cate_id=categories.id");
                // pr($data);



            $this->set('products', $data);
            $this->set('categorys', $this->Category->find('all'));
        }
        else{
            return $this->redirect(array('controller' => 'users','action' => 'login'));
        }

    }
    public function view_category($id=null){
        $dataCategory = $this->Product->query("SELECT * FROM products WHERE cate_id=".$id);
      // $dataCategory = $this->Category->findByID($id);
        $this->set('products', $dataCategory);
        $this->set('categorys', $this->Category->find('all'));
    }
    public function view($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid product'));
        }

        $product = $this->Product->findById($id);
        if (!$product) {
            throw new NotFoundException(__('Invalid product'));
        }
        $this->set('product', $product);
    }
    public function add() {
        $this->set('categorys', $this->Category->find('all'));
        if ($this->request->is('post')) {
            $this->Product->create();
            $this->request->data['Product']['user_id'] = $this->Auth->user('id');
           // $this->request->data['Product']['cate_id'] = 2;

            if(!empty($this->request->data['Product']['product_image']['name']))
            {
                $file = $this->request->data['Product']['product_image']; //put the data into a var for easy use
                $ext = substr(strtolower(strrchr($file['name'], '.')), 1); //get the extension
                $arr_ext = array('jpg', 'jpeg', 'gif' , 'png'); //set allowed extensions
                //only process if the extension is valid
                if(in_array($ext, $arr_ext))
                {
                    //do the actual uploading of the file. First arg is the tmp name, second arg is
                    //where we are putting it
                    move_uploaded_file($file['tmp_name'], WWW_ROOT . 'img/uploads/' . $file['name']);

                    //prepare the filename for database entry
                    $this->request->data['Product']['product_image'] = $file['name'];
                }
            }
            else{
                $this->request->data['Product']['product_image'] = null;
            }

            if ($this->Product->save($this->request->data)) {
                $this->Session->setFlash(__('Your product has been saved.'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('Unable to add your product.'));
        }
    }
    public function edit($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid Product'));
        }

        $product = $this->Product->findById($id);
        if (!$product) {
            throw new NotFoundException(__('Invalid post'));
        }

        if ($this->request->is(array('post', 'put'))) {
            $this->Product->id = $id;
            if ($this->Product->save($this->request->data)) {
                $this->Session->setFlash(__('Your product has been updated.'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('Unable to update your post.'));
        }

        if (!$this->request->data) {
            $this->request->data = $product;
        }
    }
    public function delete($id) {
        if ($this->request->is('get')) {
            throw new MethodNotAllowedException();
        }

        if ($this->Product->delete($id)) {
            $this->Session->setFlash(
                __('The product with id: %s has been deleted.', h($id))
            );
            return $this->redirect(array('action' => 'index'));
        }
    }
    public function isAuthorized($user) {
        // All registered users can add posts
        if ($this->action === 'add') {
            return true;
        }

        // The owner of a post can edit and delete it
        if (in_array($this->action, array('edit', 'delete'))) {
            $productId = (int) $this->request->params['pass'][0];
            if ($this->Product->isOwnedBy($productId, $user['id'])) {
                return true;
            }
        }

        return parent::isAuthorized($user);
    }
}