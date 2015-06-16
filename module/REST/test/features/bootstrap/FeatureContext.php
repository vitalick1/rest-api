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
        throw new PendingException();
    }

    /**
     * @Given request headers:
     */
    public function requestHeaders(TableNode $table)
    {
        throw new PendingException();
    }

    /**
     * @Given body:
     */
    public function body(PyStringNode $string)
    {
        throw new PendingException();
    }

    /**
     * @Given request method is :arg1
     */
    public function requestMethodIs($arg1)
    {
        throw new PendingException();
    }

    /**
     * @When I make a request to :arg1
     */
    public function iMakeARequestTo($arg1)
    {
        throw new PendingException();
    }

    /**
     * @Then response code should be :arg1
     */
    public function responseCodeShouldBe($arg1)
    {
        throw new PendingException();
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
