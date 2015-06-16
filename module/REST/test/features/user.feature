Feature:
  User CRUD methods

  Scenario: Create user
    Given User table is empty
    And request headers:
      |name  |value           |
      |Accept|application/json|
    And body:
      """
      {'username':'vitalick','first_name':'Vitalie','last_name':'Lisnic','email':'lisnicvitalie@yahoo.com'}
      """
    And request method is 'post'
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
    And request method is 'get'
    When I make a request to '/rest/user/id'
    Then response code should be '200'
    And response body should be a valid json string
    And response should contain:
    """
    {'id':'2','username':'vitalick','first_name':'Vitalie','last_name':'Lisnic','email':'lisnicvitalie@yahoo.com'}
    """