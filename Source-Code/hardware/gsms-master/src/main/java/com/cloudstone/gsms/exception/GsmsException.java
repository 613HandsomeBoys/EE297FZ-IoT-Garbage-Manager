package com.cloudstone.gsms.exception;

public class GsmsException extends RuntimeException{
    public GsmsException(Integer code, String message) {
        super(message);
        this.code = code;
    }

    private Integer code;

    public Integer getCode() {
        return code;
    }

    public void setCode(Integer code) {
        this.code = code;
    }
}
