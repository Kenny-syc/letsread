# README

## 项目

数据库文件Untitled.sql用于快速创建与项目相匹配的数据库；


## 工具简介

ThinkPHP 是一个免费开源的，快速、简单的面向对象的 轻量级PHP开发框架 ，创立于2006年初，遵循Apache2开源协议发布，是为了敏捷WEB应用开发和简化企业应用开发而诞生的。ThinkPHP从诞生以来一直秉承简洁实用的设计原则，在保持出色的性能和至简的代码的同时，也注重易用性。并且拥有众多的原创功能和特性，在社区团队的积极参与下，在易用性、扩展性和性能方面不断优化和改进，已经成长为国内最领先和最具影响力的WEB应用开发框架，众多的典型案例确保可以稳定用于商业以及门户级的开发。

ThinkCMF是一款基于PHP+MYSQL开发的中文内容管理框架。ThinkCMF提出灵活的应用机制，框架自身提供基础的管理功能，而开发者可以根据自身的需求以应用的形式进行扩展。每个应用都能独立的完成自己的任务，也可通过系统调用其他应用进行协同工作。在这种运行机制下，开发商场应用的用户无需关心开发SNS应用时如何工作的，但他们之间又可通过系统本身进行协调，大大的降低了开发成本和沟通成本。
官网:http://www.thinkcmf.com
文档:http://www.thinkcmf.com/document

**ThinkCMF2.2.3**基于**ThinkPHP3.2.3**。

ThinkCMF2.2.3官方文档：https://www.thinkcmf.com/document/index.html
ThinkCMF2.2.3操作指南：https://www.kancloud.cn/d113211/mf/278795

教程推荐：网易云课堂thinkcmf,（很好建议前端和后台都看一下）
        http://www.91freeweb.com/article/index/id/2.shtml；

##快速入门

###ThinkCMF目录结构：

|--admin                                /管理后台URL重定向目录，你可以将文件夹名改为任何你喜欢的

        |--themes                      /后台模板文件目录

|--api                                    /主要是放 ucenter

|--application                        /应用目录

|--data                                  /各类数据存放目录，包括缓存数据

|--simplewind                        /核心包，无特殊情况请勿改动

|--public                               /静态文件存放包，包含bootstrap资源

|--themes                                     /前台模板文件目录                     

application 目录结构：

|--application 

            |--Admin                    /后台管理应用

            |--Api                        /公共接口

            |--Asset                    /资源管理应用

            |--Comment                /评论应用

            |--Common                /应用公共模块

            |--Portal                    /门户应用

###应用的目录结构规范：

|--Portal

    |--Common

        |--funtion.php                //应用函数库

    |--Conf

        |--config.php                // 应用配置文件

    |--Controller

        |--ArticleController.class.php   //文章内页控制器

        |--ListController.class.php      //文章列表控制器

        |--IndexController.class.php     //应用首页控制器

        |--PageController.class.php    //页面控件器

    |--Lang                            //多语言文件

    |--Menu                          //1.0.4版本目录，默认为空用来存放备份的此应用的后台菜单

    |--nav.php                    //1.0.4新加，用于开发者控制返回前台菜单的文件
            
###模板目录

|--themes

    |--simplebootx                        //模板目录

        |--Comment

            |--comment.html           //评论模板，{:Comments()}中会调用

            |--index.html            //用户中心评论模板（链接:comment/comment/index）

        |--Portal

            |--404.html              //错误模板

            |--article.html          //默认文章页模板

            |--contact.html         //联系我们页面模板，可以后台页面编辑里更改，只需写文件名contact

            |--index.html           //首页模板

            |--list_masonry.html        //文章列表页瀑布流模板

            |--list.html               //文章列表页模板

            |--page.html           //默认页面模板

            |--product.html       //产品列表页模板，可以在后台分类编辑里设置列表页模板，只需写文件名product

            |--search.html           //文章搜索页模板

        |--Public                     //模板公共资源目录

        |--User

            |--Profile

                |--avatar.html  //头像编辑界面

                |--bang.html    //第三方账号绑定界面

                |--edit.html    //资料编辑界面

                |--password.html //密码修改界面

            |--active.html           //用户激活模板

            |--center.html        //用户中心模板

            |--disable.html          //用户未激活，重发激活邮件模板

            |--favorite.html      //我的收藏模板

            |--forgot_password.html //忘记密码模板

            |--index.html          //用户主页，公开主页

            |--login.html          //用户登录模板

            |--password_reset.html  //密码重置模板

            |--register.html        //用户注册模板

        |--config.html            //模板配置文件

        |--jump.html              //系统跳转页模板

        |--error.html               //系统action错误模板

        |--success.html            //系统action操作成功模板
