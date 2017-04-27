Google Analytics component for Nette Framework application
======

Requirements
------------

Package requires PHP 5.6 or higher

- [nette/security](https://github.com/nette/security)
- [nette/application](https://github.com/nette/application)

Installation
------------

The best way to install XRuff/GoogleAnalytics is using  [Composer](http://getcomposer.org/):

```sh
$ composer require xruff/googleanalytics
```

Documentation
------------

Configuration in config.neon. Both parameters are optional.

If parameter `code` is missing, GA code will not be rendered in template. If parameter `user` is missing, default settings will be used - value `on`. If paramter `user` is `on` and user is logged in, google analytics code will contain directive `ga('set', 'userId', {$user->id});`

```yml
extensions:
    googleAnalytics: XRuff\App\UI\Components\DI\GoogleAnalyticsExtension

googleAnalytics:
    code: UA-4564988-3
    user: on # on/off - dispalay user ID
```

Base presenter:

```php
use XRuff\App\UI\Components\IGoogleAnalyticsControlFactory;

abstract class BasePresenter extends Nette\Application\UI\Presenter
{
	/** @var IGoogleAnalyticsControlFactory $googleAnalyticsControlFactory @inject */
	public $googleAnalyticsControlFactory;

	protected function createComponentGoogleAnalytics()
	{
		return $this->googleAnalyticsControlFactory->create();
	}
}
```

```smarty
    ...
</head>
<body>
    {control googleAnalytics}
    ...
```

-----

Repository [https://github.com/XRuff/GoogleAnalytics](https://github.com/XRuff/GoogleAnalytics).