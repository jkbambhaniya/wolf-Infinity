<?php

namespace App\View\Components\Admin\Profile;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class DetailsCard extends Component
{
	/**
	 * Admin data
	 *
	 * @var string
	 */
	public $admin;

	/**
	 * Create a new component instance.
	 */
	public function __construct($admin)
	{
		$this->admin = $admin;
	}

	/**
	 * Get the view / contents that represent the component.
	 */
	public function render(): View|Closure|string
	{
		return view('components.admin.profile.details-card');
	}
}
