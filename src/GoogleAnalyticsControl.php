<?php

namespace XRuff\App\UI\Components;

use Nette\Application\UI\Control;
use Nette\Security\User;

class GoogleAnalyticsControl extends Control
{
	/** @var string */
	private $code;

	/** @var string */
	private $showLoggedUserId;

	/** @var */
	private $user;

	/** @var string */
	const ON = true;

	/** @var string */
	const OFF = false;

	/**
	 * @param string $code
	 * @param bool $showLoggedUserId
	 * @param Nette\Security\User $user Nette application user
	 */
	public function __construct($code, $showLoggedUserId, User $user)
	{
		parent::__construct();
		$this->code = $code;
		$this->user = $user;
		$this->showLoggedUserId = $showLoggedUserId === true;
	}

	public function render($code = null, $showLoggedUserId = null)
	{
		$this->template->code = $code !== null ? $code : $this->code;
		$this->template->user = $this->user;

		if ($showLoggedUserId !== null) {
			$showUserId = $showLoggedUserId;
		} else {
			$showUserId = $this->showLoggedUserId;
		}

		$this->template->showLoggedUserId = $showUserId && $this->user->isLoggedIn();

		$this->template->setFile(dirname(__FILE__) . '/templates/default.latte');
		$this->template->render();
	}
}
