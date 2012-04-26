# Yii with HTML5 Boilerplate,Responsive Bootstrap And Semantic Grid System.
 Copyright 2012 Spiros Kabasakalis
 Licensed under the Apache License v2.0  
 http://www.apache.org/licenses/LICENSE-2.0  
 Designed and built by [Spiros Kabasakalis](http://www.reverbnation.com/spiroskabasakalis)  

A starter project template for Yii  built with Html5 Boilerplate,Bootstrap and Semantic Grid.  
### [See a live demo](http://wdeio-kal.gr/app/)

## Quick start
Clone the git repo - `git clone git://github.com/drumaddict/Yii_Html5.git` - or [download it](https://github.com/drumaddict/Yii_Html5/zipball/master)  
To install,just hook up your Yii framework path in index.php.Tested with version 1.1.10.

## Features/Information

   LESS is used.See http://lesscss.org/  for info.  
   If you use the default bootstrap non-semantic layout,there is no need for less,just use the default css files.  
   WinLess is recommended  to compile less into css.See http://winless.org/ for info.  
   All less files are compiled into the css folder.Just  include the less folder in WinLess  
   and then define for each less file you compile "/css" as your output folder.  
   css/styles.css (with HTML5 Boilerplate code)  is always used ,regardless of the grid layout.  
   One main layout is used, /views/layouts/main.php  

 You have the choice of three grid layouts,defined in SiteController.php
### 1.Non-Semantic,responsive  layout with Bootstrap (default).

  Uncomment    public $layout='//layouts/grid_bs';   in SiteController.php
  You must compile these less files into css:
- less/bs/bootstrap.less
- less/bs/responsive.less
- less/responsive_custom.less

### 2.Semantic,responsive  layout with Semantic Grid ( http://semantic.gs/)

  Uncomment public $layout='//layouts/grid_sg';  in SiteController.php
  You must compile these less files into css:
- less/sg/layout.less
- less/sg/responsive_sg  
  We still use bootstrap for non-layout design so you must also compile
  less/bs/bootstrap.less,with layout related code optionally excluded.

### 3.Semantic layout  with  Boostrap.(Must code a responsive.less file if needed.)

   Uncomment public $layout='//layouts/grid_bs_sem';  in SiteController.php 
   You must compile these less files into css:
-  less/sem_layout.less
-  less/bs/bootstrap.less    
   We still use bootstrap for non-layout design so you must also compile
   less/bs/bootstrap.less,with layout related code optionally excluded.
   The downside is that you have to code a custom responsive less or css file (if responsive layout is desired).The default bootstrap responsive.less
   file will not work,since it produces the non-semantic classes .span* which are not used in this semantic layout.

#### Basic Menu instead of Bootstrap navbar.
   You can use a basic menu instead of Bootstrap  navbar.In that case you have to replace the
   bootstrap navbar markup with 
<pre>
    <?php $this->widget('zii.widgets.CMenu', array(
    'items' => array(
     array('label' => 'Home', 'url' => array('/site/index')),
     array('label' => 'About', 'url' => array('/site/page', 'view' => 'about')),
     array('label' => 'Contact', 'url' => array('/site/contact')),
     array('label' => 'Login',
           'url' => array('/site/login'), 
           'visible' => Yii::app()->user->isGuest),
     array('label' => 'Logout (' . Yii::app()->user->name . ')', 
             'url' => array('/site/logout'),
           'visible' => !Yii::app()->user->isGuest)
                                                          ),
    'htmlOptions' => array('class' => 'main-menu')
     )); ?>
    
</pre> 

   Uncomment the Main Navigation code in styles.css to style the above markup. 
   Include  js/libs/jquery.mobilemenu.js plugin in main layout file  to make the basic menu responsive.(https://github.com/mattkersley/Responsive-Menu)
   You  also have to uncomment the javascript  code that targets .main-menu  in js/script.js.
   The plugin will hide the  unordered list and insert  a select element instead, for mobile/tablet widths(configurable).

   The popular Yii-Bootstrap extension is included in the extensions folder but is not registered as a component.
   (It is commented out in the configuration file config/main.php).By default,the original boostrap files are used (in less/bs ,js/bs folders).
   You can always switch the extension on,according to your needs.

## RESOURCES

- [HTML5 Boilerplate](http://html5boilerplate.com/)
- [Bootstrap](http://twitter.github.com/bootstrap/)
- [Yii Bootstrap Extension](http://www.yiiframework.com/extension/bootstrap/)
- [Yii-Bootstrap](http://www.cniska.net/yii-bootstrap/)
- [The Semantic Grid System](http://semantic.gs/)
- [LESS]( http://lesscss.org/)
- [WinLess](http://winless.org/)
- [Responsive Menu](https://github.com/mattkersley/Responsive-Menu)
