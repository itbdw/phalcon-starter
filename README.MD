# 不好

一开始安装的时候在本地测试效果很好，因为本地机器配置很低，框架比较能榨干性能。

但是一旦上线上机器，在默认开启 OPcache 的情况下，Lumen 的响应速度比 Phalcon 更好。

phalcon
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

lumen
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

看起来phalcon还是比lumen快一下，但是chrome的监控，同一个接口 lumen 30ms，phalcon 180ms

![img](https://wx2.sinaimg.cn/mw1024/6b94a2e5ly1fskl2aooz4j21kw0be0yr.jpg)

# phalcon-starter
make it more convenient to use phalcon

# out of box with

 * namespace
 * composer
 
# important

 keep directory `app/storage` writable
