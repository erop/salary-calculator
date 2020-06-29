### Salary calculator

#### Build
Execute `composer install` in project root directory.

#### Run
See example in `./public/client.php`.

#### Test
Run tests with `./vendor/bin/phpunit` or `make test` if `make` is installed on your system.

#### Business logic explanation
The main idea is to represent each bonus/deduction as `RuleInterface` implementation. 
Its  `RuleInterface::supports()` method uses Person instance to check if this rule should be applied to salary calculation.
The salary of the `Person` is represented with `SalaryTerms` class with required constructor argument for salary. 
Tax property in this class has default value but can be modified through constructor as well. That let us to use specific tax rates for some kind of Persons.
All the rules needed for calculation should be assembled in a typed collection `CalculationRules`. 
`Calculator` uses it to get rule collection filtered by exact Person. 
Since Person's salary data is stored in SalaryTerms object we iterate over filtered collection of calculation rules and instatiate new `SalaryTerms` object calling `RuleInterface::modify` on each iteration.
Last SalaryTerms object stores value of gross salary and tax rate after all rules were applied and can be used for final calculation of net salary and tax.
The expandability of the app can be achieved by adding new classes implementing `RuleInterface` and lately using them for `CalculationRules` instantiation.
There is a branch `es` in the repo where sort of "event sourcing" was implemented by storing history of calculations.

