# Content
Content Framework


### Installation
```
composer config repositories.content vcs https://github.com/nemundo/content
composer require nemundo/content
```

### Class Designer
```
\Nemundo\App\ClassDesigner\ClassDesignerConfig::$classBuilderFormList[] = new \Nemundo\Content\ClassDesigner\ContentTypeClassBuilderForm();
```


### Content Check
Delete Invalid Content Item
```
php bin/cmd.php content-check
```


### Search ReIndexing
```
php bin/cmd.php content-reindex
```








### Clean Search Word
```
php bin/cmd.php search-word-clean
```




