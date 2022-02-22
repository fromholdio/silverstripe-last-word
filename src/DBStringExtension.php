<?php

namespace Fromholdio\LastWord;

use SilverStripe\Core\Extension;

class DBStringExtension extends Extension
{
    public function getHasMoreThanOneWord()
    {
        if ($this->getOwner()->exists()) {
            $value = $this->getOwner()->RAW();
            $words = explode(' ', $value);
            $wordCount = count($words);
            return $wordCount > 1;
        }
        return false;
    }

    public function getWithoutLastWord()
    {
        if ($this->getOwner()->exists()) {
            $value = $this->getOwner()->RAW();
            $words = explode(' ', $value);
            $wordCount = count($words);
            if ($wordCount < 2) {
                return $value;
            }
            unset($words[$wordCount - 1]);
            return implode(' ', $words);
        }
        return null;
    }

    public function getLastWord()
    {
        if ($this->getOwner()->exists()) {
            $value = $this->getOwner()->RAW();
            $words = explode(' ', $value);
            $wordCount = count($words);
            if ($wordCount < 2) {
                return null;
            }
            return $words[$wordCount - 1];
        }
        return null;
    }
}
