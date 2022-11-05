package com.example.demo.controller;


import com.alibaba.fastjson.JSONObject;
import com.example.demo.Bean.bin;
import com.example.demo.mapper.userInfMapper;
import com.example.demo.util.sqlMaker;
import org.apache.ibatis.session.SqlSession;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestParam;
import org.springframework.web.bind.annotation.RestController;
import org.springframework.web.servlet.ModelAndView;

import java.io.IOException;
import java.util.Iterator;
import java.util.List;


@RestController
@RequestMapping("/getData")
public class collection {
    @RequestMapping("/GO")
    public int deleteCollection() throws IOException {
        SqlSession session1 = sqlMaker.getSession();
        userInfMapper mapper = session1.getMapper(userInfMapper.class);
        return 13;
    }

    @RequestMapping("/show")
    public float show() throws IOException {
        SqlSession session1 = sqlMaker.getSession();
        userInfMapper mapper = session1.getMapper(userInfMapper.class);
        bin oneBinInf = mapper.getOneBinInf(1);
        System.out.println(oneBinInf);
        return oneBinInf.getPer() * 100;
    }

}
