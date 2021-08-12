<?php

class WP_Top_Header_Walker extends Walker_Nav_Menu
{
    
    private $is_weglot = false;
    
    public function get_weglot_link($item)
    {
        return ' <li class="top-langs__item"><a data-wg-notranslate="true" href="' . $item->url . '">' . $item->attr_title . ' </a></li>';
    }
    
    public function start_el(&$output, $item, $depth = 0, $args = null, $id = 0)
    {
        
        if (($this->is_weglot == false) && in_array('weglot-lang', $item->classes)) {
            $this->is_weglot = true;
            
            $english_name = Context_Weglot::weglot_get_context()->get_service('Request_Url_Service_Weglot')->get_current_language()->getLocalName();
            
            $output .= '<li class="top-header__langs top-langs">';
            
            $output .= '<a href="'.$item->url.'" class="top-langs__button top-header__link" data-wg-notranslate="true">
                            ' . $english_name . '
                            <svg width="10" height="10">
                                <use xlink:href="#arrow-down"></use>
                            </svg>
                        </a>';
            
            $output .= '<ul class="top-langs__list">';
            $output .= $this->get_weglot_link($item);
            
            return;
        }
        
        if ($this->is_weglot && ! (in_array('weglot-lang', $item->classes))) {
            $output .= '</ul></li>';
        }
        
        if (($this->is_weglot == true) && in_array('weglot-lang', $item->classes)) {
            $output .= $this->get_weglot_link($item);
            
            return;
        }
        
        $icon     = get_field('svg_ico', $item);
        
        if ($icon) {
            $item->title = '<img src="' . $icon . '" />' . $item->title;
        }
        
        $output .= '<li class="top-nav__item">';
        $output .= '<a class="top-header__link ' . '" href="' . $item->url . '">' . $item->title . '</a>';
    }
    
    public function end_el(&$output, $item, $depth = 0, $args = null)
    {
        if ($this->is_weglot && ! (in_array('weglot-lang', $item->classes))) {
            $this->is_weglot = false;;
            parent::end_el($output, $item, $depth = 0, $args = null);
        }
    }
    
    public function start_lvl(&$output, $depth = 0, $args = null)
    {
        
    }
    
    public function end_lvl(&$output, $depth = 0, $args = null)
    {
        
    }
    
}
