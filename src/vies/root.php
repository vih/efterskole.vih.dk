<?php
class VIES_Root extends k_Dispatcher
{
    public $debug = true;
    public $map = array('cms'        => 'IntrafacePublic_CMS_Controller_Index',
                        'stylesheet' => 'VIES_Stylesheet');

    function __construct()
    {
        parent::__construct();
        $this->document->template = dirname(__FILE__) . '/templates/main.tpl.php';
        $this->document->title = 'Vejle Idrætshøjskoles Elevforening';
        $this->document->styles[] = $this->url('/style.css');
        $this->document->navigation_section = array(
            array('url' => $this->url('http://vih.dk/'), 'navigation_name' => 'Vejle Idrætshøjskole')
        );
    }

    function execute()
    {
        throw new k_http_Redirect($this->url('cms'));
    }

    function handleRequest()
    {
        if ($this->context->getSubspace() == 'stylesheet') {
            $next = new VIES_Stylesheet($this);
            return $next->handleRequest();
        }

        $this->subspace = $this->context->getSubspace();
        $next = new IntrafacePublic_CMS_Controller_Index($this);

        return $this->render($this->document->template, array(
            'content' => $next->handleRequest(),
            'encoding' => $this->document->encoding,
            'title' => $this->document->title,
            'scripts' => $this->document->scripts,
            'styles' => $this->document->styles,
            ));
    }

    function getCMS()
    {
        return $this->registry->get('cms:client');
    }

    function getPathToTemplate($template)
    {
        return dirname(__FILE__) . '/templates/' . $template;
    }
}
