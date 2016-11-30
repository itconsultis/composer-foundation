<?php

interface Configurable
{
    public function configure(array $options);
    public function option($key, $fallback=null);
}
