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
    code: UA-123456789-1
    user: on # on/off - display user ID is user is logged in
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

@layout.latte:

```smarty
    ...
</head>
<body>
    {control googleAnalytics}
    ...
```

You can invoke parameters into control in latte template. 1st parameter is GA code. 2nd parameter should be boolean and manage displaying GA directive for user's session - `ga('set', 'userId', {$user->id});`. Both parameters are optioanl.

```smarty
    ...
</head>
<body>
    {control googleAnalytics 'UA-123456789-2', false}
    ...
```

-----

Repository [https://github.com/XRuff/GoogleAnalytics](https://github.com/XRuff/GoogleAnalytics).