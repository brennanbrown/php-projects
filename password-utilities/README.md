# Password Utilities

**Table of Content:**

- [Password Utilities](#password-utilities)
  - [Password Generator](#password-generator)
  - [Random Characters](#random-characters)
  - [Function Options](#function-options)
  - [Human-friendly Passwords](#human-friendly-passwords)

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

## Function Options

- Ideally, you want your functions to be self-contained.
  - That is, you want to pass in the arguments that they need to do their job, and then they'll return back a result at the end.
  - What you want to try not to do is to reference global or super-global variables inside the function.
  - It keeps them from being independent, and they're less flexible then.
  - Functions are a self-contained unit if all the knowledge they need is passed in as an argument.
- In PHP specifically, a function should _not_ use the super global `$_GET`, for instance.
  - This would require the function to have the specific context of retrieving values from GET requests only.
  - Instead, you could pass in `$options` as a parameter into the function to set things.

## Human-friendly Passwords

- Completely random passwords are secure. They contain letters, numbers, and symbols.
  - You can easily get to billions and trillions of possible combinations.
  - That makes them impossible to guess and very slow for even the best computers to try all possible combinations.
  - But they don't take into account that humans are terrible at remembering complicated strings of letters and numbers.
- Becauseo of this, we end up writing them down, which in turn makes them less secure.
  - Eg. The Wi-Fi password at your house is a secure password. It uses uppercase and lowercase letters with numbers mixed in.
  - But if you can't remember it, then it's written down on a piece of paper.
  - Written down passwords can be weaker than having a less secure password to start with.
  - Now that statement requires qualification: At home, writing down a password is secure from the general public because you still control access to the piece of paper inside your house.
- But at work, you may not have that much control over who sees the Post-it note stuck to your computer monitor.
  - And that's different still from an email account or a server that's on the internet where anyone in the world can run a hacking script for days or weeks, trying all possible combinations until they get in.
  - In that case, you'd want the most secure password possible.
  - If you write it down, the hackers of the world can't see that paper, so the type and the strength of your password very much depends on your situation and your security concerns.
- But to go back to the previous example, you don't need my home WiFi to be _that_ secure.
  - You're not really worried that someone in your neighborhood is going to try to figure out your password to either get free internet or to watch you surf the web.
  - In that case, you'd rather have a friendlier, still somewhat secure password that you could easily remember.
- These passwords are going to be generated from dictionary words combined with numbers and symbols.
  - For example, we might have `nice42password`, `boots395wind`, `chase\*59rabbit`.
  - You can see how these are much easier to read, much easier to remember, much easier to communicate to someone else than the random strings.
