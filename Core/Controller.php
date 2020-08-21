<?php

namespace Vendor\Core;

class Controller
{
    var $vars = [];
    var $layout = "default";

    function set($d)
    {
        $this->vars = array_merge($this->vars, $d);
    }

    function render($filename)
    {
        extract($this->vars);

        ob_start();

        $url_view = str_replace('Vendor\Controllers', '', get_class($this));
        $url_view = substr($url_view, 1);
        require(ROOT . "Views/" . ucfirst(str_replace('Controller', '', $url_view)) . '/' . $filename . '.php');
        $content_for_layout = ob_get_clean();
        if ($this->layout == false) {
            $content_for_layout;
        } else {
            require(ROOT . "Views/Layouts/" . $this->layout . '.php');
        }
    }

    private function secure_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    protected function secure_form($form)
    {
        foreach ($form as $key => $value) {
            $form[$key] = $this->secure_input($value);
        }
    }
}
