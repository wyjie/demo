面向对象设计的五大原则

单一职责原则
    强调各模块之间功能分离，模块中高度内聚，模块之间应仅有一个使他们变化的原因
    例：命令模式，工厂模式，MVC

接口隔离原则

替换原则

依赖倒置原则

开放封闭原则

UserEntity
{
    uid =23,
    username=null,
    passwd=null,
    email=null,
    lastlogin=0,
    regtime=0,
    list
    {
        ReviewEntity {id=1, body=dcd, user=null, uid=0}, ReviewEntity {id=3, body=xzs, user=null, uid=0}
    }
}


mail:[0-9a-zA-Z]+@(?<suffix>[0-9a-zA-Z]+.)+com
ip: ((2[0-4]\d|25[0-5]|[01]?\d\d?)\.){3}(2[0-4]{2}|25[0|5]|[01]?\d\d?)


