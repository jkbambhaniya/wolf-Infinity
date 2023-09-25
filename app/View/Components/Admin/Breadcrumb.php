<?php

namespace App\View\Components\Admin;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Breadcrumb extends Component
{

	/**
	 * Breadcrumb data
	 *
	 * @var string
	 */
	public $breadcrumb, $title;

	/**
	 * Create a new component instance.
	 */
	public function __construct($breadcrumb, $title)
	{
		$this->breadcrumb = $breadcrumb;
		$this->title = $title;
	}

	/**
	 * Get the view / contents that represent the component.
	 */
	public function render(): View|Closure|string
	{
		return view('components.admin.breadcrumb');
	}
}
