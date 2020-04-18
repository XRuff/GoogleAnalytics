<?php

namespace XRuff\App\UI\Components\DI;

use Nette;
use XRuff\App\UI\Components;

class GoogleAnalyticsExtension extends Nette\DI\CompilerExtension
{
	/** @var array $defaults */
	private $defaults = [
		'code' => null,
		'user' => Components\GoogleAnalyticsControl::ON,
	];

	public function loadConfiguration()
	{
		$builder = $this->getContainerBuilder();
		$this->validateConfig($this->defaults);

		$config = $this->config;

		$builder->addDefinition($this->prefix('googleAnalyticsControlFactory'))
			->setClass(Components\GoogleAnalyticsControl::class)
			->setImplement(Components\IGoogleAnalyticsControlFactory::class)
			->setArguments([$config['code'], $config['user']]);
	}

	/**
	 * @param Nette\Configurator $configurator
	 */
	public static function register(Nette\Configurator $configurator)
	{
		$configurator->onCompile[] = function ($config, Nette\DI\Compiler $compiler) {
			$compiler->addExtension('googleAnalytics', new GoogleAnalyticsExtension());
		};
	}
}
