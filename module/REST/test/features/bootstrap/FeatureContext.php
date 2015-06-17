<?php

use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use RESTTest\ControllerTestCase;
use Behat\Behat\Tester\Exception\PendingException;

require __DIR__ . '/../../RESTTest/ControllerTest.php';

/**
 * Defines application features from the specific context.
 */
class FeatureContext implements Context, SnippetAcceptingContext
{
    protected $app;


    public function __construct()
    {
        $this->app = new ControllerTestCase();
    }

    /**
     * @Given User table is empty
     */
    public function userTableIsEmpty()
    {
        /**
         * @var Doctrine\ORM\EntityManager $em
         */
        $em = $this->app->getApplication()->getServiceManager()->getServiceLocator()->get('Doctrine\ORM\EntityManager');
        $em->getRepository('REST\Entity\User')->clear();
    }

    /**
     * @Given request headers:
     */
    public function requestHeaders(TableNode $table)
    {
        $headers = new \Zend\Http\Headers();
        foreach($table as $row){
            $headers->addHeader(new Zend\Http\Header\GenericHeader($row['name'], $row['value']));
        }

        $this->app->getRequest()->setHeaders($headers);
    }

    /**
     * @Given request body:
     */
    public function body(PyStringNode $string)
    {
        $this->app->getRequest()->setBody($string);
    }

    /**
     * @Given request method is :arg1
     */
    public function requestMethodIs($arg1)
    {
        $this->app->getRequest()->setMethod($arg1);
    }

    /**
     * @When I make a request to :arg1
     */
    public function iMakeARequestTo($arg1)
    {
        $this->app->dispatch($arg1);
    }

    /**
     * @Then response code should be :arg1
     */
    public function responseCodeShouldBe($arg1)
    {
        $this->app->assertResponseStatusCode($arg1);
    }

    /**
     * @Then response body should be a valid json string
     */
    public function responseBodyShouldBeAValidJsonString()
    {
        throw new PendingException();
    }

    /**
     * @Then Json response should contain :arg1 parameter
     */
    public function jsonResponseShouldContainParameter($arg1)
    {
        throw new PendingException();
    }

    /**
     * @Given User table has the following records:
     */
    public function userTableHasTheFollowingRecords(TableNode $table)
    {
        //throw new PendingException();
    }

    /**
     * @Then response should contain:
     */
    public function responseShouldContain(PyStringNode $string)
    {
        throw new PendingException();
    }

}
