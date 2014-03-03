<!-- File: /app/View/Posts/add.ctp -->
// this form helper create the form tag for us. 
//
<h1>Add Post</h1>
<?php
echo $this->Form->create('Post');
echo $this->Form->input('title');
echo $this->Form->input('body', array('rows' => '3')); // size of boxed of body
echo $this->Form->end('Save Post');
?>