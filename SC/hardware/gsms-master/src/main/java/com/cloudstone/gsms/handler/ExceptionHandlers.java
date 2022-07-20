package com.cloudstone.gsms.handler;

import com.cloudstone.gsms.dto.Result;
import com.cloudstone.gsms.enums.ResultEnum;
import com.cloudstone.gsms.exception.GsmsException;
import com.cloudstone.gsms.utils.ResultUtil;
import org.slf4j.Logger;
import org.slf4j.LoggerFactory;
import org.springframework.web.bind.annotation.ControllerAdvice;
import org.springframework.web.bind.annotation.ExceptionHandler;
import org.springframework.web.bind.annotation.ResponseBody;

@ControllerAdvice
public class ExceptionHandlers {

    private final static Logger logger = LoggerFactory.getLogger(ExceptionHandler.class);

    @ExceptionHandler(value = Exception.class)
    @ResponseBody
    public Result handler(Exception e) {
        if (e instanceof GsmsException) {
            GsmsException exception = (GsmsException) e;
            //logger.error("程序异常: {}", exception);
            return ResultUtil.fail(exception.getCode(), exception.getMessage());
        } else {
            logger.error("系统异常：{}", e);
            return ResultUtil.fail(ResultEnum.UNKNOW_ERROR.getCode(),
                    ResultEnum.UNKNOW_ERROR.getMessage() + e.getMessage());
        }
    }

}
