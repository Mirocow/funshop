<?php
/**
 * @author Alexey Samoylov <alexey.samoylov@gmail.com>
 */

namespace mirocow\eav\inputs;

use mirocow\eav\handlers\AttributeHandler;

class TextInput extends AttributeHandler
{
    public function init()
    {
        parent::init();
        
        $this->owner->addRule($this->getAttributeName(), 'string', ['max' => 255]);
    }

    public function run()
    {
        return $this->owner->activeForm->field($this->owner, $this->getAttributeName())
            ->textInput();
    }
}