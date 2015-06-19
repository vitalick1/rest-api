<?php

use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use Behat\Behat\Tester\Exception\PendingException;
use Zend\Http\Headers;

/**
 * Defines application features from the specific context.
 */
class FeatureContext implements Context, SnippetAcceptingContext
{
    protected $app;
    protected $serviceManager;
    /**
     * @var \Doctrine\ORM\EntityManager
     */
    protected $entityManager;

    public function __construct()
    {
        $this->app = new \RESTTest\Controller\ControllerTest();

        $this->app->setApplicationConfig(include __DIR__ . '/../../config/application.config.php');
        $this->serviceManager = $this->app->getApplicationServiceLocator();
        $this->entityManager = $this->serviceManager->get('Doctrine\ORM\EntityManager');
    }

    /**
     * @Given User table is empty
     */
    public function emptyUserTable()
    {
        $this->entityManager->getConnection()->exec('TRUNCATE users');
    }

    /**
     * @Given request headers:
     */
    public function setRequestHeaders(TableNode $table)
    {
        $headers = new Headers();
        foreach($table as $row) {
            $headers->addHeaderLine($row['name'], $row['value']);
        }
        $this->app->getRequest()->setHeaders($headers);
    }

    /**
     * @Given request body:
     */
    public function setRequestBody(PyStringNode $string)
    {
        $this->app->getRequest()->setContent((string) $string);
    }

    /**
     * @Given request method is :arg1
     */
    public function setRequestMethod($arg1)
    {
        $this->app->getRequest()->setMethod($arg1);
    }

    /**
     * @When I make a request to :arg1
     */
    public function makeRequestTo($arg1)
    {
        $this->app->dispatch($arg1);
    }

    /**
     * @Then response code should be :arg1
     */
    public function checkResponseBody($arg1)
    {
        $this->app->assertResponseStatusCode($arg1);
    }

    /**
     * @Then response body should be a valid json string
     */
    public function checkValidJSON()
    {
        $this->app->assertJson($this->app->getResponse()->getContent());
    }

    /**
     * @Then Json response should contain :arg1 parameter
     */
    public function checkJsonObjectHasParam($arg1)
    {
        $this->app->assertObjectHasAttribute($arg1, json_decode($this->app->getResponse()->getContent()));
    }

    /**
     * @Given User table has the following records:
     */
    public function setUserTableRows(TableNode $table)
    {
        $this->emptyUserTable();
        $hydrator = new \Zend\Stdlib\Hydrator\ClassMethods();
        foreach ($table as $row) {
            $entity = new \REST\Entity\User();
            $hydrator->hydrate($row, $entity);

            $this->entityManager->persist($entity);
            $this->entityManager->getClassMetaData(get_class($entity))->setIdGeneratorType(\Doctrine\ORM\Mapping\ClassMetadata::GENERATOR_TYPE_NONE);
        }

        $this->entityManager->flush();

    }

    /**
     * @Then Json response should have param :arg1 equal to :arg2
     */
    public function jsonResponseShouldHaveParamEqualTo($arg1, $arg2)
    {
        /*$responseData = json_decode($this->app->getResponse()->getContent(), true);
        $this->app->assertArrayHasKey($arg1, $responseData);
        $this->app->assertEquals($responseData[$arg1], $arg2);*/
    }

    /**
     * @Then response should contain header :arg1 with value matching :arg2
     */
    public function responseHeaderShouldMatchRegexp($arg1, $arg2)
    {
        $this->app->assertHasResponseHeader($arg1);

        $this->app->assertRegExp($arg2, $this->app->getResponse()->getHeaders()->get($arg1)->getFieldValue());
    }


}
