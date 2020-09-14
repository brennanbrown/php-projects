# Password Utilities

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
