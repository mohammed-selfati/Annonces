<?php



/**
 * Description of Achat
 *
 * @author pc
 */

class product
 {
    private $id;
    
    
    
    
    function id() {
        return $this->id;
    }

    function setId($id) {
        $this->id = $id;
    }

    function __construct($id) {
        $this->id = $id;
    }

}
