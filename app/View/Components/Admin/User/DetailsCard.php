<?php

namespace App\View\Components\Admin\User;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class DetailsCard extends Component
{
	/**
	 * User data
	 *
	 * @var string
	 */
	public $user;
	/**
	 * Create a new component instance.
	 */
	public function __construct($user)
	{
		$this->user = $user;
	}

	/**
	 * Get the view / contents that represent the component.
	 */
	public function render(): View|Closure|string
	{
		return view('components.admin.user.details-card');
	}
}
