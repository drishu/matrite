Feature: Users
  In order to protect the integrity of the website
  As a product owner
  I want to make sure only authenticated users can access the site administration

  Scenario: User login ok
    Given I go to "/"
  	Then I should see "Va rugam sa va logati"
  	Then I fill in "email" with "szilagyi_an@yahoo.com"
  		And I fill in "password" with "admin"
	Then I press "Login"
	Then I should see "Logout"

  Scenario: User login not
    Given I go to "/"
    Then I should see "Va rugam sa va logati"
    Then I fill in "email" with "asd@asd.com"
      And I fill in "password" with "123"
  Then I press "Login"
  Then I should see "datele introduse nu sunt corecte"

  Scenario: User logout
    Given I go to "/"
    Then I should see "Va rugam sa va logati"
    Then I fill in "email" with "szilagyi_an@yahoo.com"
      And I fill in "password" with "admin"
  Then I press "Login"
  Then I should see "Logout"
  Then I press "Logout"
  Then I should see "Va rugam sa va logati"
