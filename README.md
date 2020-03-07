# Statamic Oh Dear - Monitor your Website
![Statamic 3.0+](https://img.shields.io/badge/Statamic-3.0+-FF269E?style=for-the-badge&link=https://statamic.com)
[![Latest Version on Packagist](https://img.shields.io/packagist/v/jonassiewertsen/statamic-oh-dear.svg?style=flat-square)](https://packagist.org/packages/jonassiewertsen/statamic-oh-dear)

A [OhDear](https://ohdear.app) integration for Statamic v3. 

Check your monitored uptime, SSL certificates, mixed content and broken links easily from your Statamic control panel. 

## Oh Dear 
To use this addon, you need to have an [OhDear](https://ohdear.app) account. 

## Installation
### Step 1
Pull in your package with composer
```bash
composer require jonassiewertsen/statamic-oh-dear
```

### Step 2
Create an Oh Dear API Key

### Step 3
Add your [Oh Dear API](https://ohdear.app/docs/integrations/api/authentication#get-your-api-token) key and the site id to your .env file
```yaml
OH_DEAR_API_KEY="XXXXXXXX"
OH_DEAR_SITE_ID=XXXXXXXXX
```
## Add the Widget
To add a small widget to your dashboard, tell your config file to do so. 
Open `config/statamic/cp.php` and look for the "Dashboard widgets" section and add it. 

```php
'widgets' => [
  'oh_dear', 
  // mabye other widgets
],
``` 