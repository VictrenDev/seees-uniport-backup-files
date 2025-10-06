<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ResearchCard extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    public function trim_characters( $text, $length = 100, $append="…"): string
    {
        $length = (int) $length;
        $text = trim( strip_tags( $text ) );
            
        if ( strlen( $text ) > $length ) {
            $text = substr( $text, 0, $length + 1 );
            $words = preg_split( "/[\s]|&nbsp;/", $text, -1, PREG_SPLIT_NO_EMPTY );
            preg_match( "/[\s]|&nbsp;/", $text, $lastchar, 0, $length );
            if ( empty( $lastchar ) )
                array_pop( $words );
        
            $text = implode( ' ', $words ) . $append;
        }
        return $text;
    }
    
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.research-card');
    }
}
