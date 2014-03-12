// app/Controller/UsersController.php

<?php
class UsersController extends AppController {

    public function beforeFilter() {  // New function inside this code. INheriting from the AppController.
        parent::beforeFilter();			//
        $this->Auth->allow('add', 'logout');	//Auth component called allowed which means it will allows certain user from accessing the actions.
    } //It also means it allows/add the user to use the functions.  
    //Also inside the bracket we can put more actions like 'index', 'edit' for more executions.

public function login() {
    if ($this->request->is('post')) {
        if ($this->Auth->login()) {
            return $this->redirect($this->Auth->redirect());
        }
        $this->Session->setFlash(__('Invalid username or password, try again'));
    }
}

public function logout() {
    return $this->redirect($this->Auth->logout());
}
    public function index() {		//This index function saying this 'user' (User of the model).
        $this->User->recursive = 0;		//This number represent the one layer up to show the post from which user's no.
        $this->set('users', $this->paginate());		//The set passing the 'user's ' post to the view. 		
    }												//Paginate means defining which number of pages in view.

    public function view($id = null) { 	//This will search for the user's ID in the page. 
        $this->User->id = $id;
        if (!$this->User->exists()) {		//If the user is not exist throw an error. 
            throw new NotFoundException(__('Invalid user'));
        }
        $this->set('user', $this->User->read(null, $id)); 	// If the user is found then it will hand over to us teh request.
    }

    public function add() {
        if ($this->request->is('post')) {	//Post request typically go thru the forum. 
            $this->User->create();	//Initializing the model.
            if ($this->User->save($this->request->data)) {		//What happen here is the request trying to validating, editing 
            													//behind the background and sending everything as a bag.
                $this->Session->setFlash(__('The user has been saved'));	
                return $this->redirect(array('action' => 'index'));	//
            }
            $this->Session->setFlash(
                __('The user could not be saved. Please, try again.')
            );
        }
    }

    public function edit($id = null) {	//This argument will send to database to find user's ID.
        $this->User->id = $id;			//
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been updated'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(
                __('The user could not be saved. Please, try again.')
            );
        } else {
            $this->request->data = $this->User->read(null, $id);
            unset($this->request->data['User']['password']);
        }
    }

    public function delete($id = null) { //this will only allow to delete application.
        $this->request->onlyAllow('post');

        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->User->delete()) {
            $this->Session->setFlash(__('User deleted'));
            return $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('User was not deleted'));
        return $this->redirect(array('action' => 'index'));
    }

}
