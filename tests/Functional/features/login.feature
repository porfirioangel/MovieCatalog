Feature: Login
  As a user
  I want to login to the system
  In order to manage the movies

  Scenario: Login correct
    Given I open the login page
    And I fill porfirioads@gmail.com in <email>
    And I fill holamundo in <password>
    When I click <login>
    Then I can see the logout menu