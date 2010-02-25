<?php
/**
 * Controller for the stylesheet
 */
class VIES_Stylesheet extends k_Controller
{
    function GET()
    {
        $color = array('body' => 'black',
                       'caption' => '#ddd',
                       'container' => 'black',
                       'navigation_main' => '#D61031');

        $margin['default'] = '30px';
        $margin['left']    = '40px';

        $pics = array(
            $this->url('/gfx/images/widepics/hangingout1.jpg')
        );

        $data = array('color' => $color,
                      'margin' => $margin,
                      'image_url' => $this->url('/gfx/') . '/',
                      'pics' => $pics);

        $data = $this->render(dirname(__FILE__) . '/templates/css.tpl.php', $data);

        $response = new k_http_Response(200, $data);
        $response->setEncoding(NULL);
        $response->setContentType('text/css');
        $response->setHeader('Content-Length', strlen($data));
        $response->setHeader('Content-Transfer-Encoding', 'binary');
        $response->setHeader('Cache-Control', 'Public');
        $response->setHeader('Pragma', 'public');
        throw $response;
    }
}