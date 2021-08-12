<?php

class WP_Footer_Walker extends Walker_Nav_Menu
{
    public function start_el(&$output, $item, $depth = 0, $args = null, $id = 0)
    {
        if ($depth == 0) {
            $output .= "<div class='footer__menu-item'>";
            $output .= '<div class="footer__menu-header">' . $item->title . '</div>';
            
            return;
        }
        
        $output .= '<li>';
        $output .= '<a href="' . $item->url . '">' . $item->title . '</a>';
    }
    
    public function end_el(&$output, $item, $depth = 0, $args = null)
    {
        if ($depth == 0) {
            $output .= "</div>";
        } else {
            parent::end_el($output, $item, $depth = 0, $args = null);
        }
    }
    
    public function start_lvl(&$output, $depth = 0, $args = null)
    {
        if ($depth == 0) {
            $output .= '<ul class="footer__menu-list">';
        }
    }
    
    public function end_lvl(&$output, $depth = 0, $args = null)
    {
        if ($depth == 0) {
            $output .= '</ul>';
        }
    }
    
}
