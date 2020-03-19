<?php


namespace Step\Core;

use Smarty;

class RenderEngine extends Smarty
{
    protected static $instance;
    public function __construct()
    {
        parent::__construct();
        $path = config('app.views_path');
        $this->setTemplateDir($path);
        $this->setCompileDir($path . DIRECTORY_SEPARATOR . '_compiled');

    }

    static function instance(): self{
        if(!static::$instance instanceof self)
            static::$instance=new self();
        return self::$instance;
    }
}