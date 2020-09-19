# Password Utilities

**Table of Content:**

- [Password Utilities](#password-utilities)
  - [Password Generator](#password-generator)
  - [Random Characters](#random-characters)

## Password Generator

- In most cases, you would let a user pick their own password. However, there remain some situations where you still need to use PHP to generate one for them:
  - You might want to send a new password out whenever a user creates a new account or for a lost password.
  - One benefit of generating it is that we can generate a password that might be harder to guess than the password that a user might pick on their own.
  - Or, you might be generating passwords for fake users while running software tests.
- **Character Set** is the set of characters that are allowed in the password.
  - When we're generating a password, what that means for us is that it's the pool of characters from which PHP can choose.
  - Now, that pool of characters can either be a PHP array or a string.
  - PHP makes it easy to work with either one.
  - A string mostly because it's simpler and we won't need any of the other extra features that an array offers us.
  - The character sets we'll be looking at come into four main categories:
    - uppercase letters
    - lowercase letters
    - numbers
    - symbols
- It matters how many characters we pick.
  - It makes the password impossible to guess and very slow to try all combinations, even with a very fast computer.
  - Now, there is a downside that larger character sets are harder to remember and can be harder to type as well.
  - If they're hard to remember, it can lead to users writing their passwords down, making it insecure.
- There's another point that often gets overlooked which is that it can be harder to type the passwords as well.
  - It can require changing character sets during input.
  - Eg. iPhone, iPad, Android, or TV software like Apple TV, Netflix, Hulu, game consoles like PlayStation Xbox and other devices.
  - And when the input becomes more complicated, it also makes it easier to make mistakes during that process.

## Random Characters

- There are three different ways to get random values in PHP using three PHP functions, `rand()`, `mt_rand()` and `random_int()`.
- `rand($low, $high)` takes two arguments: a low value, and a high value, and it returns a random integer between those two values, inclusive of the values themselves.
  - Eg. If the low value is 1 and the high value is 3, we would expect to get back a random integer that is either a one, a two or a three. It includes both the low and the high.
  - rand() generates its random number by using the libc random number generator. That's a library that comes bundled with the C programming language.
- `mt_rand()` instead generates its random numbers using another algorithm called "Mersenne Twister".
  - `mt_rand()` is meant to be a drop-in replacement for `rand()`. If you want to use `mt_rand()`, all you have to do is put that `mt_` in front of it, and you'll be using this new number generator instead.
  - Why use mt_rand() instead of rand()? It's up to four times faster than rand(), and it's more random than rand().
- It can be argued that mt_rand() is not random enough either, however.
  - If you plan to generate a lot of passwords quickly, or, let's say, security tokens, then it's not secure enough.
  - The current server time is used as part of the calculation, so if a hacker can figure that out, cracking the pattern becomes a lot easier.
  - And after a few hundred runs in a row, it's possible to deduce what the future values will be.
- Instead, there's another possibility, which is the function called `random_int`, or random integer.
  - It uses different random sources, depending on the platform that you're using, Windows, Unix, etc.
  - It is considered cryptographically secure. That means that the dice are not heavier on any one side; they're truly random.
  - At least, as far as we know so far.
- In the future, it may be possible that we'll find out that there's some other weakness to them, but it is much, much more secure than using either `rand()` or `mt_rand()`.
  - The problem with it, though, is that it's a new function that's going to be part of PHP 7.
  - If you have PHP 7 or later, you have it available to you, and you should use it.
