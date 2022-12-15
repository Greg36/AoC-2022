# AoC 2022

### Some highlights from this year

#### Day 3 - Rucksack Reorganization
The combination of array intersect and unique pretty much solved both cases, then it was just using ord to convert char into ASCII int and subtracting correct amount to match the goal.

#### Day 4 - Camp Cleanup
Only clever bit this day was in the second part to check for pairs that do not overlap and subtract that from number of all pairs.

#### Day 5 - Supply Stacks
Crate stacks so a just a simple array without need to use something fancy. Luckily I optimized first part to use array_splice instead of loop with array_pop and second part required just not reversing the spliced part.

#### Day 6 - Tuning Trouble
Instead of going for any type of array I kept all processing in first part as a string using count_chars with mode 3 that returns string of unique characters if its length was 4 it meant all 4 were unique. It was perfect for the second part with minimal alternations.

#### Day 7 - No Space Left On Device
The obvious solution would be to create tree, but I went with an associative array in which key was directory path. The traversing was very simple as I used array to keep current directory path adding to the end or popping last element to go level up.
But then I needed to update size of each directory to contain its parent, and that again was done without recursive tree traversing but with double loop to check every directory against each other checking if the path contains one another i.e. path ./a should contain size of child directory ./a/b/c - all of that with simple strpos.
Last tricky bit was adding missing directories that have not been initially in array of paths as task required to take any directory into considreation.