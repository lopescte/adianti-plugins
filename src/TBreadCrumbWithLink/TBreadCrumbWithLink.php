<?php
namespace Lopescte\AdiantiPlugins;

use Adianti\Widget\Util\TBreadCrumb;
use Adianti\Widget\Base\TElement;
use Adianti\Widget\Base\TStyle;
/**
 * TBreadCrumbWithLink
 *
 * @version    1.0.4
 * @author     Marcelo Lopes
 * @copyright  Copyright (c) 2019  Reis & Lopes Assessoria e Sistemas. (https://www.reiselopes.com.br)
 * @license    https://www.reiselopes.com.br/software-license
 */
class TBreadCrumbWithLink extends TBreadCrumb
{
    protected static $homeController;
    protected $container;
    protected $items;
    
    /**
     * Handle paths from a XML file
     * @param $xml_file path for the file
     */
    public function __construct()
    {
        parent::__construct('div');
        $this->{'id'} = 'div_breadcrumbs';
        
        $this->container = new TElement('ol');
        $this->container->{'class'} = 'tbreadcrumbwithlink';
        parent::add( $this->container );
        
        TStyle::importFromFile('vendor/lopescte/adianti-plugins/src/TBreadCrumbWithLink/css/style.css');
    }
    
    /**
     * Static constructor
     */
    public static function create( $options, $home = true)
    {
        $breadcrumb = new TBreadCrumbWithLink;
        if ($home)
        {
            $breadcrumb->addHome();
        }
        foreach ($options as $option)
        {
            $breadcrumb->addItem( $option );
        }
        return $breadcrumb;
    }
    
    /**
     * Add the home icon
     */
    public function addHome()
    {
        $li = new TElement('li');
        $li->{'class'} = 'home';
        $a = new TElement('a');
        $a->generator = 'adianti';
        
        if (self::$homeController)
        {
            $a->{'href'} = 'engine.php?class='.self::$homeController;
        }
        else
        {
            $a->{'href'} = 'engine.php';
        }
        
        $a->{'title'} = 'Home';
        
        $li->add( $a );
        $this->container->add( $li );
    }
    
    /**
     * Add an item
     * @param $path Path to be shown
     * @param $last If the item is the last one
     */
    public function addItem($path, $link=NULL, $last = FALSE)
    {
        $li = new TElement('li');
        $this->container->add( $li );
        
        $span = new TElement('span');
        $span->add( $path );
        
        $this->items[$path] = $span;
        if( $last )
        {
            $li->add( $span );
        }
        else
        {
            $a = new TElement('a');
            $a->generator = 'adianti';
            
            if( $link )
            {
                $a->{'href'} = 'engine.php?class='.$link;
            }
            
            $li->add( $a );
            $a->add( $span );
        }
            
    }
    
    /**
     * Mark one breadcrumb item as selected
     */
    public function select($path)
    {
        foreach ($this->items as $key => $span)
        {
            if ($key == $path)
            {
                $span->{'class'} = 'selected';
            }
            else
            {
                $span->{'class'} = '';
            }
        }
    }
    
    /**
     * Define the home controller
     * @param $class Home controller class
     */
    public static function setHomeController($className)
    {
        self::$homeController = $className;
    }
}
