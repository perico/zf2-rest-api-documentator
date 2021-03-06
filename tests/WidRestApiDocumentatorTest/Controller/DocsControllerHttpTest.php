<?php
namespace WidRestApiDocumentatorTest\Controller;

use Zend\Test\PHPUnit\Controller\AbstractHttpControllerTestCase;

class DocsControllerHttpTest extends AbstractHttpControllerTestCase
{
    protected $traceError = true;

    public function setUp()
    {
        $this->setApplicationConfig(
            include 'tests/config/application.config.php'
        );
        parent::setUp();
    }

    public function testListAction()
    {
        $this->dispatch('/rest-api-docs');
        $this->assertResponseStatusCode(200);
        $this->assertModuleName('WidRestApiDocumentator');
        $this->assertActionName('list');
        $this->assertControllerName('WidRestApiDocumentator\Controller\Docs');
        $this->assertControllerClass('DocsController');
        $this->assertMatchedRouteName('rest-api-docs');
    }

    public function testShowAction()
    {
        $this->dispatch('/rest-api-docs/simple');
        $this->assertResponseStatusCode(200);
        $this->assertModuleName('WidRestApiDocumentator');
        $this->assertActionName('show');
        $this->assertControllerName('WidRestApiDocumentator\Controller\Docs');
        $this->assertControllerClass('DocsController');
        $this->assertMatchedRouteName('rest-api-docs/show');
    }
}