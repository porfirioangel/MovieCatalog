Feature: Insert movie
  As an user
  I want to insert a movie in the catalog
  In order that the movie catalog is bigger

  Scenario: Insert Galaxy Guardians
    Given I open the login page
    And I fill porfirioads@gmail.com in <email>
    And I fill holamundo in <password>
    And I click <login>
    And I click <add new movie>
    And I fill Galaxy Guardians in <movie name>
    And I fill Fantasy in <movie genre>
    And I fill 2015 in <year>
    When I click <save movie>
    Then I can see the list of movies
