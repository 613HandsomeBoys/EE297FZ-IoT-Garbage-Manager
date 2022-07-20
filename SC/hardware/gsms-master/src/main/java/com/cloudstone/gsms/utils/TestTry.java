package com.cloudstone.gsms.utils;

import com.cloudstone.gsms.exception.GsmsException;

public class TestTry {
    public String testTry1(String param) throws Exception {
        if (param == null) {
            throw new Exception("hello1");
        }
        return "hello";
    }

    public void test2(){
        try {
            String i = testTry1("2");
        } catch (Exception e) {
            throw new GsmsException(1,"test");
        }
    }

    public void test3(){
        test2();
    }
}
