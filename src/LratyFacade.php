<?php namespace VahanMargaryan\Lraty;
 
use Illuminate\Support\Facades\Facade;
 
class LratyFacade extends Facade {
 
  /**
   * Get the registered name of the component.
   *
   * @return string
   */
  protected static function getFacadeAccessor() { return 'lraty'; }
 
}