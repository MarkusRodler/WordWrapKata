# Word Wrap Kata by Robert C. Martin
[![Build Status](https://img.shields.io/travis/MarkusRodler/WordWrapKata.svg?style=flat-square)](https://travis-ci.org/MarkusRodler/WordWrapKata)
[![Coverage Status](https://img.shields.io/coveralls/MarkusRodler/WordWrapKata.svg?style=flat-square)](https://coveralls.io/github/MarkusRodler/WordWrapKata?branch=master)

My attempt at the kata which was suggested by Robert Martin on his blog. I used the following [description](http://codingdojo.org/cgi-bin/index.pl?KataWordWrap):

  > You write a class called Wrapper, that has a single static function named wrap that takes two arguments, a string, and a column number. The function returns the string, but with line breaks inserted at just the right places to make sure that no line is longer than the column number. You try to break lines at word boundaries.

  > Like a word processor, break the line by replacing the last space in a line with a newline.

I modified the kata a little bit to make more sense (no static and better naming):

  > You write a class called *WordWrap*, that has a single function named wrap that takes two arguments, a string, and a column number. The function returns the string, but with line breaks inserted at just the right places to make sure that no line is longer than the column number. You try to break lines at word boundaries.

  > Like a word processor, break the line by replacing the last space in a line with a newline.

## Getting started

 ```bash
# get the code
git clone https://github.com/MarkusRodler/WordWrapKata
cd WordWrapKata

# install dependencies using composer (if installed globally)
composer install

# run tests
.\vendor\bin\phpunit --colors=always
 ```

