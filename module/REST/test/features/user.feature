Feature:
  User CRUD methods

  Scenario: Create user
    Given User table is empty
    And request headers:
      |name  |value           |
      |Accept|application/json|
    And request body:
      """
      {"username":"vitalick","first_name":"Vitalie","last_name":"Lisnic","email":"lisnicvitalie@yahoo.com"}
      """
    And request method is 'POST'
    When I make a request to '/rest/user'
    Then response code should be '200'
    And response body should be a valid json string
    And Json response should contain 'id' parameter


  Scenario: Get user
    Given User table has the following records:
      |id|username|first_name|last_name|email                  |
      |2 |vitalick|Vitalie   |Lisnic   |lisnicvitalie@yahoo.com|
    And request headers:
      |name  |value           |
      |Accept|application/json|
    And request method is 'GET'
    When I make a request to '/rest/user/2'
    Then response code should be '200'
    And response body should be a valid json string
    And Json response should have param 'id' equal to '2'
    And Json response should have param 'username' equal to 'vitalick'
    And Json response should have param 'first_name' equal to 'Vitalie'
    And Json response should have param 'last_name' equal to 'Lisnic'
    And Json response should have param 'email' equal to 'lisnicvitalie@yahoo.com'