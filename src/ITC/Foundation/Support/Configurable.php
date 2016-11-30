<?php

namespace ITC\Foundation\Support;

use RuntimeException;

/**
 * You can mix this trait into any class that consumes configuration
 */
trait Configurable
{
    /**
     * @var array
     * @default null
     */
    private $options = null;

    /**
     * Return default options
     * @param void
     * @return array
     */
    public function defaults()
    {
        return [];
    }

    /**
     * Merge supplied options into the current configuration
     * @param array $options
     * @return void
     */
    public function configure(array $options)
    {
        $this->options = array_merge($this->options(), $options);
    }

    /**
     * Return the option value matching supplied $key
     * @param string $key
     * @param mixed $fallback
     * @return mixed
     */
    public function option($key, $fallback='__undefined__')
    {
        $options = $this->options();

        if (!isset($options[$key])) {
            if ($fallback === '__undefined__') {
                throw new RuntimeException('key not found: '.$key);
            }
            return $fallback;
        }

        return $options[$key];
    }

    /**
     * @ignore
     * @param void
     * @return array
     */
    private function &options()
    {
        if ($this->options === null) {
            $this->options = $this->defaults();
        }

        return $this->options;
    }
}
