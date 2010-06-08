<?php
/**
 * IntrafacePublic_CMS_HTML_Parser
 *
 * Parses the content of the array returned from the XML-RPC Server
 * to valid XHTML 1.0.
 *
 * Never rewrite the main class, as it would be much harder to upgrade to a new
 * one, when we make new functions in the cms system.
 *
 * PHP version 4 and 5
 *
 * @category  IntrafacePublic
 * @package   IntrafacePublic_CMS_HTML
 * @author    Lars Olesen <lars@legestue.net>
 * @copyright 2007 Lars Olesen
 * @license   Creative Commons / Share A Like license http://creativecommons.org/licenses/by-sa/2.5/legalcode
 * @version   @package-version@
 * @link      http://public.intraface.dk/index.php?package=IntrafacePublic_CMS_HTML
 */

/**
 * IntrafacePublic_CMS_HTML_Parser
 *
 * Parses the content of the array returned from the XML-RPC Server
 * to valid XHTML 1.0.
 *
 * Example:
 *
 * <code>
 * // getting the array from your XML-RPC-client
 * $page_array = $client->getPage();
 *
 * // putting the array into the parser
 * $html = new IntrafacePublic_CMS_HTML_Parser($page_array);
 * $head = $html->parseMeta();
 * $navigation = $html->parseNavigation('toplevel');
 * $content = $html->parseContent();
 * </code>
 *
 * If you are not satisfied with the returned result from the class, you
 * can make your own parser-functions by extending this class with your own custom
 * methods:
 *
 * Example:
 *
 * <code>
 * class MyHTMLParser extends IntrafacePublic_CMS_HTML_Parser {
 *      function parseHtmltextElement($element) {
 *          return '<div class="my-own-class">' . $element['html'] . '</div>;
 *      }
 * }
 * </code>
 *
 * @category  IntrafacePublic
 * @package   IntrafacePublic_CMS_HTML
 * @author    Lars Olesen <lars@legestue.net>
 * @copyright 2007 Lars Olesen
 * @license   Creative Commons / Share A Like license http://creativecommons.org/licenses/by-sa/2.5/legalcode
 * @version   @package-version@
 * @link      http://public.intraface.dk/index.php?package=IntrafacePublic_CMS_HTML
 */
class IntrafacePublic_CMS_HTML_Parser
{
    /**
     * @var array $sections containing parsed sections
     */
    private $sections;
    
    /**
     * Constructor
     *
     * @param array $page_array Array with information about a page
     *
     * @return void
     */
    public function __construct($page_array)
    {
        if (!is_array($page_array)) {
            trigger_error('CMS_HTML_Parser::__construct: $page_array is not an array', E_USER_ERROR);
        }
        $this->page_array = $page_array;
    }

    //////////////////////////////////////////////////////////////////////////////
    // Page headers
    //////////////////////////////////////////////////////////////////////////////

    /**
     * Sets headers
     * Notice: Make sure that this is used before outputting any data
     *
     * @return void
     */
    function httpHeaders()
    {
        header($this->page_array['http_header_status']);
        // the encoding should also be set
    }

    //////////////////////////////////////////////////////////////////////////////
    // Standard HTML outline
    //////////////////////////////////////////////////////////////////////////////

    /**
     * Parses page
     *
     * @return string HTML output of an entire page
     */
    function parsePage()
    {
        $output  = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">';
        $output .= '<html xml:lang="'.$this->escape($this->page_array['language']).'" xmlns="http://www.w3.org/1999/xhtml">';
        $output .= '    <head>';
        $output .=          $this->parseMeta();
        $output .=          $this->parseCSS();
        $output .= '    </head>';
        $output .= '    <body>';
        $output .= '        <div id="container">';
        $output .= '            <div id="branding">';
        $output .= '                <h1>'.$this->escape($this->page_array['title']).'</h1>';
        $output .= '            </div>';
        $output .=              $this->parseNavigation('toplevel');
        $output .=              $this->parseNavigation('sublevel');
        $output .= '            <div id="content">';
        $output .= '                <div id="content-main">';
        $output .=                      $this->parseSections();
        $output .= '                </div>';
        $output .= '            </div>';
        $output .= '            <div id="siteinfo">';
        // her kunne vi outputte licensen
        $output .= '            </div>';
        $output .= '        </div>';
        $output .= '    </body>';
        $output .= '</html>';

        return $output;
    }

    //////////////////////////////////////////////////////////////////////////////
    // Metadata
    //////////////////////////////////////////////////////////////////////////////

    /**
     * Parses meta information
     * - title
     * - metatags
     * - encoding
     * - language
     *
     * @return string Meta information
     */
    function parseMeta()
    {
        $output  = '<title>'.$this->page_array['title'].'</title>';
        $output .= '<meta http-equiv="content-type" content="'.$this->escape($this->page_array['content_type']).'" />';
        $output .= '<meta name="description" content="'.$this->escape($this->page_array['description']).'" />';
        $output .= '<meta name="keywords" content="'.$this->escape($this->page_array['keywords']).'" />';
        return $output;
    }

    /**
     * Parse css tag for placing elements
     * Adds a <style> tag where it places the csss
     * @return string css tag
     */
    function parseCSS()
    {
        $output  = '<style type="text/css">';
        $output .=  $this->page_array['css'];
        $output .= '</style>';
        return $output;

    }

    //////////////////////////////////////////////////////////////////////////////
    // Navigation
    //////////////////////////////////////////////////////////////////////////////

    /**
     * Parses navigation to an unordered list
     *
     * @param string $level Level to write navigation for
     *
     * @return string An unordered list
     */
    function parseNavigation($level = 'toplevel')
    {
        $first = true;
        $pages = $this->page_array['navigation_'.$level];
        $output  = '<ul id="navigation-'.$level.'">';
        if (!is_array($pages) OR count($pages) == 0) {
            return '';
        }
        foreach ($pages AS $page) {
            $output .= '<li';
            $id = '';
            if (!empty($this->page_array['id']) AND !empty($this->page['id']) AND $this->page_array['id'] == $page['id']) {
                $output .= ' id="navigation-current"';
            }
            if ($first) {
                $output .= ' class="navigation-first-item"';
            }

            $output .= '><a href="'.$page['url'] .'">'.$this->escape($page['navigation_name']).'</a>';
            $output .= '</li>';
            $first = false;
        }
        $output .= '</ul>';

        return $output;
    }

    /****************************************************************************
     * Pagelist
     ****************************************************************************/

    //////////////////////////////////////////////////////////////////////////////
    // Elements
    //////////////////////////////////////////////////////////////////////////////

    /**
     * Gets a section
     *
     * @param string $identifier Section to be returned
     *
     * @return string HTML parsed elements
     */
    function getSection($identifier)
    {
        $sections = $this->getSections();
        
        if(isset($sections[$identifier])) {
            return $sections[$identifier];
        }
        
        throw new Exception('Invalid section identifier '.$identifier);
    }
    
    /**
     * Return array of sections with identifier as key
     * @return array of sections with identifier as key
     */
    public function getSections()
    {
        
        if(empty($this->sections)) {
        
            if (!is_array($this->page_array['sections'])) {
                throw new Exception('No sections found');
            }
            
            $return = array();
            foreach ($this->page_array['sections'] AS $section) {
                $this->sections[$section['section_identifier']] = $section;
                if (!empty($section['type']) AND $section['type'] == 'mixed' AND !empty($section['elements'])) {
                    $this->sections[$section['section_identifier']]['html'] = $this->parseElements($section['elements']);
                }
            }
        }
        
        return $this->sections;
    }

    /**
     * Parses all sections
     *
     * @return string A parsed section
     */
    function parseSections()
    {
        if (!isset($this->page_array['sections']) OR !is_array($this->page_array['sections']) OR count($this->page_array['sections']) == 0) {
            return 0;
        }

        $output = '';

        foreach ($this->page_array['sections'] AS $section) {
            $function = 'parse' . $section['type'] . 'Section';
            $output .= $this->$function($section);
        }

        return $output;
    }

    /**
     * Parses ShortText Section
     *
     * @param array $section Section array
     *
     * @return string A parsed section
     */
    function parseShortTextSection($section)
    {
        return '<h2>' . $section['text'] . '</h2>';
    }

    /**
     * Parses LongText Section
     *
     * @param array $section Section array
     *
     * @return string A parsed section
     */
    function parseLongTextSection($section)
    {
        return $section['html'];
    }

    /**
     * Parses Picture Section
     *
     * @param array $section Section array
     *
     * @return string A parsed section
     */
    function parsePictureSection($section)
    {
        return '<img src="'.$section['picture']['file_uri'].'" alt="'.$this->escape($section['pic_text']).'" width="'.intval($section['picture']['width']).'" height="'.intval($section['picture']['height']).'" />';
    }

    /**
     * Parses Mixed Section
     *
     * @param array $section Section array
     *
     * @return string A parsed section
     */
    function parseMixedSection($section)
    {
        return $this->parseElements($section['elements']);
    }

    //////////////////////////////////////////////////////////////////////////////
    // Elements
    //////////////////////////////////////////////////////////////////////////////

    /**
     * Parses all elements
     *
     * @param array $elements All elements
     *
     * @return string Parsed elements
     */
    function parseElements($elements)
    {
        if (!is_array($elements) OR count($elements) == 0) {
            return '';
        }

        $output = '';
        foreach ($elements AS $element) {
            $extra_class = '';
            $extra_style = '';

            if (!empty($element['extra_class'])) {
                $extra_class = ' class="'.$element['extra_class'].'"';
            }
            if (!empty($element['extra_style'])) {
                $extra_style = ' style="'.$element['extra_style'].'"';
            }

            $function = 'parse' .  $element['type'] . 'Element';
            $output .= '<div'.$extra_class.$extra_style.'>';
            $output .= $this->$function($element);
            $output .= '</div>';
        }
        return $output;
    }

    /**
     * Parses del.icio.us element
     *
     * @param array $element One element
     *
     * @return string Parsed element
     */
    function parseDeliciousElement($element)
    {
        if (empty($element)) {
            return '';
        }

        $links = '<ul class="cms-delicious">';
        foreach ($element['items'] AS $item) {

            $links .=  '<li><a href="' . $this->parseUrl($item['link']) . '" title="' . htmlentities($item['description']). '">' . htmlentities($item['title']) . '</a></li>';
        }
        $links .= '</ul>';

        return $links;
    }

    /**
     * Parses Flickr element
     *
     * You got different possibilities for showing your Flickr-pictures. We recommend
     * that you just return the $element['pictobrowser'], which is a great free
     * little piece of software, which will show your pictures:
     *
     * Example:
     * <code>
     * return $element['pictobrowser'];
     * </code>
     *
     * If you wish to show your pictures on your own page using Flickr's own
     * slideshow possibilites, here is some tips:
     * http://www.lifehacker.com/software/flickr/how-to-embed-flickr-slideshows-210683.php
     *
     * @param array $element One element
     *
     * @return string Parsed element
     */
    function parseFlickrElement($element)
    {
        if (!empty($element['pictobrowser'])) {
            return $element['pictobrowser'];
        }

        return '
            <p style="background: #eee; border: 2px solid #ccc; padding: 1em;">
                <a href="' . $element['set']['url'] . '">'.$element['set']['info']['title'].'</a>
            </p>';

            /*
            if (!is_array($photos) AND count($photos) == 0) {
                $output = '<p>Ingen photos p� Flickr-s�gningen</p>';
            }
            else {
                $ouput = '<div class="flickr-photos">';
                foreach ($photos as $photo) {
                    //echo $photo;
                    $owner = $f->people_getInfo($photo['owner']);
                    $output .= '<div class="flickr-photo">';
                    $output .= '    <a href="' . $photos_url . $photo['id'] . '/">';
                    $output .= '        <img src="'.$f->buildPhotoURL($photo, $this->parameter->get('size')).'" alt="'.$photo['title'].'" />';
                    $output .= '    </a>';
                    //$output .= '&copy; <a href="http://www.flickr.com/people/' . $photo['owner'] . '/">';
                    //$output .= $owner['username'];
                    //$output .= "</a>';
                    $output .= '</div>';
                }
                $ouput .= '</div>';
            }
        }
        else {
            $output = '<p>Flickrkoden er forkert</p>';
        }

        return $output;
        */
    }

    /**
     * Parses Gallery element
     *
     * TODO Might be a good idea, if it was possible to choose sizes here.
     *
     * @param array $element One element
     *
     * @return string Parsed element
     */
    function parseGalleryElement($element)
    {
        $output  = '<div class="cms-gallery">';
        foreach ($element['pictures'] AS $file) {
            $output .= '<div class="cms-gallery-item">';
            $output .= '    <a href="'.$file['instances'][$element['popup_size']]['file_uri'] .'" rel="lightbox['.$element['id'].']" title="'.htmlentities($file['description']).'">';
            $output .= '        <img src="'.$file['instances'][$element['thumbnail_size']]['file_uri'].'" alt="" id="gallery_'.$file['id'].'" />';
            $output .= '    </a>';
            if (!empty($element['show_description']) AND $element['show_description'] == 'show') {
                $output .= '<p>' . $file['description'] . '</p>';
            }
            $output .= '</div>';

        }

        $output .= '</div>';

        return $output;

    }

    /**
     * Parses HtmlText element
     *
     * @param array $element One element
     *
     * @return string Parsed element
     */
    function parseHtmltextElement($element)
    {
        return $element['html'];
    }

    /**
     * Parses WikiText element
     *
     * @param array $element One element
     *
     * @return string Parsed element
     */
    function parseWikitextElement($element)
    {
        return $element['html'];
    }

    /**
     * Parses a PageList element
     *
     * This function supports permalinks which is the following addition to a link:
     * <a rel="bookmark" ...>Tekst</a>
     *
     * Should consider keywords, lifetime, type etc.
     *
     * @param array $element One element
     *
     * @return string Parsed element
     */
    function parsePageListElement($element)
    {
        $output  = '<div class="pagelist">';
        if ($element['headline']) {
            $output .= '<h2>'.$element['headline'].'</h2>';
        }

        if (empty($element['pages']) OR !is_array($element['pages']) OR count($element['pages']) == 0) {
            $output .= '<p>'.$element['no_results_text'].'</p>';
            $output .= '</div>';
            return $output;
        }

        $output .= '<dl class="pagelist">';

        foreach ($element['pages'] AS $page) {
            $output .= '<dt><a rel="bookmark" href="'.$page['url'] .'">'.$page['title'].'</a></dt>';
            if ($element['show'] == 'description') {
                $output .= '<dd>'.$page['description'].' <a href="'.$page['url'].'">'.$element['read_more_text'].'</a></dd>';
            }
        }
        $output .= '<dl>';
        $output .= '</div>';
        return $output;
    }

    /**
     * Parses a Picture element
     *
     * @param array $element One element
     *
     * @return string Parsed element
     */
    function parsePictureElement($element)
    {
        if (empty($element['picture'])) {
            return '';
        }

        if (empty($element['picture']['width']) OR empty($element['picture']['height'])) {
            $pic_html = '<img src="'.$element['picture']['file_uri'].'" alt="" />';
        } else {
            $pic_html = '<img width="'.$element['picture']['width'].'" height="'.$element['picture']['height'].'" src="' . $element['picture']['file_uri'] . '" alt="'.$element['pic_text'].'" border="0" />';
        }

        if (empty($element['picture']['width']) OR empty($element['picture']['height'])) {
            $output = '<div class="image">';
        } else {
            $output = '<div class="image" style="width: '.$element['picture']['width'].'px;">';
        }

        if($element['pic_url'] != '') {
             $output .= '<a href="'.$element['pic_url'].'">';
        }

        $output .= $pic_html;

        if($element['pic_url'] != '') {
             $output .= '</a>';
        }

        $output .= '<p>' . $element['pic_text'] . '</p>';

        $output .= '</div>';

        return $output;
    }

    /**
     * Parses a Map element
     *
     * @param array $element One element
     *
     * @return string Parsed element
     */
    function parseMapElement($element)
    {
        return $element['map'];
    }

    /**
     * Parses a Video element
     *
     * TODO This should maybe contain the actual output of the video element
     *
     * @param array $element One element
     *
     * @return string Parsed element
     */
    function parseVideoElement($element)
    {
        return $element['player'];
    }

    /**
     * Parses a FileList element
     *
     * @param array $element One element
     *
     * @return string Parsed element
     */
    function parseFileListElement($element)
    {
        if (empty($element['files'])) {
            return '';
        }

        $output = '';

        if (!empty($element['caption'])) {
            $output .= '<h2>'.$element['caption'].'</h2>';
        }

        $output .= '<ul class="filelist">';
        foreach ($element['files'] AS $file) {
            $output .= '    <li>'.$file['description'].': <a href="'.$file['file_uri'].'">'.$file['file_name'].'</a> (<em>'.$file['file_type']['mime_type'].', '.$file['dk_file_size'].'</em>)</li>';
        }
        $output .= '</ul>';

        /*
        // Old implementation
        $output  = '<table summary="" class="filelist-table">';
        if (!empty($element['caption'])) {
            $output .= '    <caption>'.$element['caption'].'</caption>';
        }
        $output .= '    <colgroup>';
        $output .= '        <col class="filename"></col>';
        $output .= '        <col class="filedescription"></col>';
        $output .= '        <col class="filetype"></col>';
        $output .= '        <col class="filesize"></col>';
        $output .= '    </colgroup>';
        $output .= '    <tr>';
        $output .= '        <th scope="col">Filbeskrivelse</th>';
        $output .= '        <th scope="col">Filnavn</th>';
        $output .= '        <th scope="col">Filtype</th>';
        $output .= '        <th scope="col">Filst�rrelse</th>';
        $output .= '    </tr>';

        foreach ($element['files'] AS $file) {
            $output .= '<tr>';
            $output .= '    <td>'.$file['description'].'</td>';
            $output .= '    <td><a href="'.$file['file_uri'].'">'.$file['file_name'].'</a></td>';
            $output .= '    <td>' . $file['file_type']['mime_type'] . '</td>';
            $output .= '    <td>' . $file['dk_file_size'] . '</td>';
            $output .= '</tr>';
        }

        $output .= '</table>';
        */
        return $output;
    }

    //////////////////////////////////////////////////////////////////////////////
    // Utility methods
    //////////////////////////////////////////////////////////////////////////////

    /**
     * Escapes output
     *
     * @param string $string String to escape
     *
     * @return string Escaped string
     */
    function escape($string)
    {
        return htmlentities($string);
    }
}
