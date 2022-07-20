package com.cloudstone.gsms.utils;

import com.cloudstone.gsms.dto.Result;
import org.apache.commons.lang3.StringUtils;

public class ResultUtil {
    public static <T> Result success(T data){
        Result<T> result = new Result<>();
        result.setCode(0);
        result.setMessage("success.");
        result.setData(data);
        return result;
    }

    public static Result success(){
        return success(null);
    }

    public static  Result fail(){
        return fail("");
    }

    public static Result fail(String message){
        return fail(-1, message);
    }

    public static Result fail(Integer code, String message){
        Result result = new Result();
        result.setCode(code);
        if (StringUtils.isBlank(message)) {
            result.setMessage("fail.");
        } else {
            result.setMessage("fail:" + message);
        }
        return result;
    }
}
