<?phprequire __DIR__ . "/config.php";\Nemundo\App\ClassDesigner\ClassDesignerConfig::$classBuilderFormList[] = new \Nemundo\Content\ClassDesigner\ContentTypeClassBuilderForm();(new \Nemundo\App\ModelDesigner\ModelDesignerConfig())->addProject(new \Nemundo\Content\ContentProject());(new \Nemundo\App\ModelDesigner\ModelDesignerConfig())->addProject(new \Nemundo\FrameworkProject());(new \Nemundo\App\ModelDesigner\ModelDesignerConfig())->addProject(new \Nemundo\ContentTest\ContentTestProject());