<?php

namespace Aubruz\Mainframe\UI\Components;

use Aubruz\Mainframe\Exceptions\UIException;
use Aubruz\Mainframe\UI\ChildComponent;

/**
 * Class TextStyle
 * @package Aubruz\Mainframe\UI\Components
 *
 * Styled text field.
 *
 */
class TextStyle extends ChildComponent
{

    /**
     * TextStyle constructor.
     * @param $type
     */
    public function __construct($type)
    {
        if(!in_array($type, ["bold", "code", "italic", "strike"])) {
            throw new UIException('The type of a TextStyle must be either "bold", "code", "italic" or "strike"!');
        }

        parent::__construct();
        $this->setType("TextStyle");
        $this->canHaveChildren();
        $this->addProps([
            "type"    => $type
        ]);
        return $this;
    }

    /**
     * @return array
     * @throws UIException
     */
    public function toArray()
    {
        if($this->getProp("children") === null){
            throw new UIException('A TextStyle must have at least one children!');
        }
        return parent::toArray();
    }

}