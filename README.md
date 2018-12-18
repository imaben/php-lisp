# PHP - lisp
php-lisp is a lisp interpreter written in PHP (just for fun)



[![Build Status](https://travis-ci.org/php-lisp/php-lisp.svg?branch=master)](https://travis-ci.org/php-lisp/php-lisp)
[![codecov.io](http://codecov.io/github/php-lisp/php-lisp/coverage.svg?branch=master)](http://codecov.io/github/php-lisp/php-lisp?branch=master)
[![Code Intelligence Status](https://scrutinizer-ci.com/g/php-lisp/php-lisp/badges/code-intelligence.svg?b=master)](https://scrutinizer-ci.com/code-intelligence)
![StyleCI](https://github.styleci.io/repos/161591252/shield?branch=master)
[![Latest Stable Version](https://poser.pugx.org/php-lisp/php-lisp/v/stable)](https://packagist.org/packages/php-lisp/php-lisp)
[![Licence](https://poser.pugx.org/php-lisp/php-lisp/license.svg)](https://packagist.org/packages/php-lisp/php-lisp)
[![Total Downloads](https://poser.pugx.org/php-lisp/php-lisp/downloads.svg)](https://packagist.org/packages/php-lisp/php-lisp)
[![Gitter chat](https://badges.gitter.im/phplisp/Lobby.png)](https://gitter.im/phplisp/Lobby)



**[简体中文](https://github.com/php-lisp/php-lisp/blob/master/README_zh.md)**

# introduction

1. Unit test coverage is 93%
2. All use ``` PHP declare (strict_types = 1); ```  strict mode
3. Core interpreter 0 relies on only 57K packaged phar files

# installation

1. Install using composer
``` composer require  php-lisp/php-lisp ```

Download the Phar file
``` wget https://github.com/php-lisp/php-lisp/releases/download/v1.0.1/psp```

3. The clone code      
```git clone git@github.com:php-lisp/php-lisp.git```     
```cd php-lisp && composer install && ./bin/psp -h ```

# use
1. Use the REPL
```bash
./psp 
```

2. Check out help
```bash
 ./bin/psp -h
```

3. Execute PSP code
```bash
echo '(define zero (lambda (f) (lambda (x) x))) 
      (define one (lambda (f) (lambda (x) (f x)))) 
      (define plus (lambda (m n) (lambda (f) (lambda (x) ((n f) ((m f) x)))))) 
      (define mult (lambda (m n) (lambda (f) (lambda (x) ((n (m f)) x))))) 
      (define xp (lambda (m n) (lambda (f) (lambda (x) (((n m) f) x))))) 
      (define pr (lambda (x) (do (echo x) x))) 
      (define prn (lambda (n) (do ((n pr) ".") (echo "\n")))) 
      (define two (plus one one)) 
      (define three (plus two one)) 
      (define six (mult two three)) 
      (define sixty-four (xp two six)) 
      (prn sixty-four)'  >> church-encoding.psp  && ./bin/psp church-encoding.psp

```
More Demo look at https://github.com/php-lisp/php-lisp/tree/master/examples

# reference
[REPL](https://zh.wikipedia.org/zh-hans/%E8%AF%BB%E5%8F%96%EF%B9%A3%E6%B1%82%E5%80%BC%EF%B9%A3%E8%BE%93%E5%87%BA%E5%BE%AA%E7%8E%AF)
[LISP](https://zh.wikipedia.org/wiki/LISP)
[pharen](http://www.pharen.org/reference.html#object-integration)
[lispphp](http://lisphp.org/)
[mal](https://github.com/kanaka/mal)
[pEigthP](https://github.com/cninja/pEigthP)

Communication and feedback

Email: itwujunze#gamil.com