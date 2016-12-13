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
Generate a password

Password::generate([PARAM INT])
```
$newPassword = Password::generate();
```
This method returns a plain object with two variables
```
$password = $newPassword->clean;
$hash = $newPassword->digested;
```
You can regulate the length of the password with an INT parameter
```
$newPassword = Password::generate(8); // this will generate a password 8 characters long
$newPassword = Password::generate(25); // this will generate a password 25 characters long
```
### Hash
Get the hash of a (for example) user defined password

Password::hash(PARAM STR)
```
$hash = Password::hash("somepassword");
```
### Verify
Verify a password against a stored hash

Password::verify(PARAM STR password, PARAM STR hash)

The method returns true or false.
```
if (Password::verify("1234", "$2y$09$P9F3cqb1c.nqf0UhwRf/wOkM.fT6QQINIBv8UAkrbghk/FdoPN2fi"):
  // password is verified
endif;
```
### Options
You can change the bcrypt cost in 'password.php' line 35.

The value 10 is default. Higher is safer, lower is faster.
