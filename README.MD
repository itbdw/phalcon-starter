# 不好

一开始安装的时候在本地测试效果很好，因为本地机器配置很低，框架比较能榨干性能。

但是一旦上线上机器，在默认开启 OPcache 的情况下，Lumen 的响应速度比 Phalcon 更好。

线上测试机器ab phalcon
```$xslt
Concurrency Level:      100
Time taken for tests:   10.135 seconds
Complete requests:      2000
Failed requests:        0
Total transferred:      506000 bytes
HTML transferred:       204000 bytes
Requests per second:    197.33 [#/sec] (mean)
Time per request:       506.753 [ms] (mean)
Time per request:       5.068 [ms] (mean, across all concurrent requests)
Transfer rate:          48.76 [Kbytes/sec] received

```

线上测试机器ab lumen
```$xslt
Concurrency Level:      100
Time taken for tests:   14.023 seconds
Complete requests:      2000
Failed requests:        0
Total transferred:      452000 bytes
HTML transferred:       140000 bytes
Requests per second:    142.62 [#/sec] (mean)
Time per request:       701.171 [ms] (mean)
Time per request:       7.012 [ms] (mean, across all concurrent requests)
Transfer rate:          31.48 [Kbytes/sec] received
```

看起来线上测试机器phalcon还是比lumen快一下，但是chrome的监控，同一个接口 lumen 30ms，phalcon 180ms。
而本地同样一个接口，lumen 200ms，phalcon 40ms。。。（有点懵逼）

![img](https://wx2.sinaimg.cn/mw1024/6b94a2e5ly1fskl2aooz4j21kw0be0yr.jpg)
![img2](https://wx4.sinaimg.cn/mw690/6b94a2e5ly1fskl59i52kj20g00f6jsx.jpg)
![img3](https://wx4.sinaimg.cn/mw690/6b94a2e5ly1fsnf1vt87vj20u809gtbe.jpg)

# phalcon-starter
make it more convenient to use phalcon

# out of box with

 * namespace
 * composer
 
# important

 keep directory `app/storage` writable
