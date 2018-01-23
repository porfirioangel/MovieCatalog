Feature: Delete movie
  As an user
  I want to delete a movie from catalog
  In order that the movie is longer available

  Scenario: Movie deleted
    Given I open the login page
    And I fill porfirioads@gmail.com in <email>
    And I fill holamundo in <password>
    And I click <login>
    When I click <delete> for the first movie in the list
    And I click <accept> in the delete confirmation
    Then I can see the list of movies
    And the movie that I deleted dissapear from the list

