<?php

namespace HelloPackagist;

use Closure;

class HelloPackagist {
	
	private $items;
	
	public function __construct(array $items)
	{
		$this->items = $items;
	}
	
	public function select(Closure $callback, $flag = 0)
	{
		$this->items = array_filter($this->items, $callback, $flag);
		return new static($this->items);
	}
	
	public function map(Closure $callback)
	{
		$this->items = array_map($callback, $this->items);
		return new static($this->items);
	}
	
	public function all()
	{
		return array_merge($this->items);
	}
}