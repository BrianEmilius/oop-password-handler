# oop-password-handler
Object oriented password handler.
This password handler can generate, hash, and verify passwords.
A generated password is by default 12 characters long and contains at least 1 letter, 1 capitalized letter, 1 number, and one symbol.

## Usage
Include the file 'password.php' in your project
 ```
<?php
require('password.php');
```
### Generate
To generate a password, run the method
```
$newPassword = Password::generate();
```
This method returns a plain object with two variables
```
$password = $newPassword->clean;
$hash = $newPassword->digested;
```
### Hash
