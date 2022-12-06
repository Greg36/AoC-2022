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