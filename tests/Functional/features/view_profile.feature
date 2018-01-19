Feature: View profile
  As a user
  I want to open my profile
  In order to see my personal information

  Scenario: View Porfirio's profile
    Given I open the login page
    And I fill porfirioads@gmail.com in <email>
    And I fill holamundo in <password>
    And I click <login>
    When I open the profile page
    Then I can see my personal information