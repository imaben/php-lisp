# php-lisp
php-lisp  是一个用PHP写的lisp解释器


[![Build Status](https://travis-ci.org/php-lisp/php-lisp.svg?branch=master)](https://travis-ci.org/php-lisp/php-lisp)
[![codecov.io](http://codecov.io/github/php-lisp/php-lisp/coverage.svg?branch=master)](http://codecov.io/github/php-lisp/php-lisp?branch=master)
[![Code Intelligence Status](https://scrutinizer-ci.com/g/php-lisp/php-lisp/badges/code-intelligence.svg?b=master)](https://scrutinizer-ci.com/code-intelligence)
![StyleCI](https://github.styleci.io/repos/161591252/shield?branch=master)
[![Latest Stable Version](https://poser.pugx.org/php-lisp/php-lisp/v/stable)](https://packagist.org/packages/php-lisp/php-lisp)
[![Licence](https://poser.pugx.org/php-lisp/php-lisp/license.svg)](https://packagist.org/packages/php-lisp/php-lisp)
[![Total Downloads](https://poser.pugx.org/php-lisp/php-lisp/downloads.svg)](https://packagist.org/packages/php-lisp/php-lisp)
[![Gitter chat](https://badges.gitter.im/phplisp/Lobby.png)](https://gitter.im/phplisp/Lobby)



# 简介

1. 单元测试覆盖率 93%
2. 全部使用 ```php declare(strict_types=1);``` 严格模式 
3. 核心解释器0依赖 打包好的 phar 文件只有 57K

# 安装

1. 使用 composer 安装
``` composer require  php-lisp/php-lisp ```

2. 下载 Phar 文件
``` wget https://github.com/php-lisp/php-lisp/releases/download/v1.0.1/psp```

3. clone 代码
```git clone git@github.com:php-lisp/php-lisp.git```
```cd php-lisp && composer install && ./bin/psp -h ```

# 使用
1. 使用 REPL  
```bash
./psp 
```

2. 查看帮助
```bash
 ./bin/psp -h
```

3. 执行 psp 代码
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
更多 Demo 查看 https://github.com/php-lisp/php-lisp/tree/master/examples

# 参考
[REPL](https://zh.wikipedia.org/zh-hans/%E8%AF%BB%E5%8F%96%EF%B9%A3%E6%B1%82%E5%80%BC%EF%B9%A3%E8%BE%93%E5%87%BA%E5%BE%AA%E7%8E%AF)
[LISP](https://zh.wikipedia.org/wiki/LISP)
[pharen](http://www.pharen.org/reference.html#object-integration)
[lispphp](http://lisphp.org/)
[mal](https://github.com/kanaka/mal)
[pEigthP](https://github.com/cninja/pEigthP)

# 交流与反馈

Email: itwujunze#gamil.com