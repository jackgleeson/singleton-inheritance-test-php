# Testing out Singleton Inheritance in PHP (it doesn't work)


This is a small test to see how a typical PHP Singleton implementation handles inheritance

# Files included

| File | Implemetation Style | Test Outcome |
| ------ | ------ | ------ |
| Test1.php | Typical PHP Singleton implementation using Static keyword | Fail |
| Test2.php | Instances array with get_called_class() usage | Pass |

### How to run tests
```sh
$ git clone https://github.com/jackgleeson/singleton-inheritance-test-php.git
$ php Test1.php
$ php Test2.php
```


