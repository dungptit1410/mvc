<?php

namespace Vendor\Models;

use Vendor\Core\ResourceModel;

class TaskResourceModel extends ResourceModel
{


    public function __construct()
    {
        $this->_init('tasks', 'id', 'Task');
    }  
}
