Feature: List movies
  As a user
  I want to see the list of movies
  In order to decide which I will watch with my girlfriend

  Scenario: Movies existing
    Given I open the login page
    And I fill porfirioads@gmail.com in <email>
    And I fill holamundo in <password>
    When I click <login>
    Then I can see the list of movies