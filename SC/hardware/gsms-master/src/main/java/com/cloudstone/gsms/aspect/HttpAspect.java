package com.cloudstone.gsms.aspect;

import org.aspectj.lang.JoinPoint;
import org.aspectj.lang.annotation.*;
import org.slf4j.Logger;
import org.slf4j.LoggerFactory;
import org.springframework.stereotype.Component;
import org.springframework.web.context.request.RequestContextHolder;
import org.springframework.web.context.request.ServletRequestAttributes;

import javax.servlet.http.HttpServletRequest;

@Aspect
@Component
public class HttpAspect{

    private final static Logger logger = LoggerFactory.getLogger(HttpAspect.class);

    //拦截单个方法
    //@Before("execution(public * com.cloudstone.gsms.controller.TrashManagerController.addTrashManager(..))")
    //拦截类中所有方法
    @Before("execution(public * com.cloudstone.gsms.controller.TrashManagerController.*(..))")
    public void log(){
        logger.info("成功拦截。");
    }

    @Pointcut("execution(public * com.cloudstone.gsms.controller.TrashManagerController.addTrashManager(..))")
    public void pubLog(){

    }
    @Before("pubLog()")
    public void doBefore(JoinPoint joinPoint){
        ServletRequestAttributes servletRequestAttributes = (ServletRequestAttributes) RequestContextHolder.getRequestAttributes();
        HttpServletRequest httpServletRequest = servletRequestAttributes.getRequest();
        logger.info("url={}", httpServletRequest.getRequestURI());
        logger.info("method={}", httpServletRequest.getMethod());
        logger.info("ip={}", httpServletRequest.getRemoteAddr());
        logger.info("class_method={}", joinPoint.getSignature().getDeclaringTypeName() + "." + joinPoint.getSignature().getName());
        logger.info("args={}", joinPoint.getArgs());
    }
    @After("pubLog()")
    public void doAfter() {

    }
    @AfterReturning(returning ="object", pointcut = "pubLog()")
    public void doAfterReturn(Object object){
        logger.info("response={}", object);
    }
}
