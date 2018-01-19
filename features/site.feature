Feature: Users
  In order to protect the integrity of the website
  As a product owner
  I want to make sure only authenticated users can access the site administration

  Scenario: User login
    Given I go to "/"
  	Then I should see "Va rugam sa va logati"
  	Then I fill in "email" with "szilagyi_an@yahoo.com"
  		And I fill in "password" with "admin"
	Then I press "Login"
	Then I should see "Logout"
