package com.example.demo;

import com.example.demo.Bean.bin;
import com.example.demo.mapper.userInfMapper;
import com.example.demo.util.sqlMaker;
import org.apache.ibatis.session.SqlSession;
import org.mybatis.spring.annotation.MapperScan;

import java.io.IOException;
public class das {
    public static void main(String[] args) throws IOException {
        SqlSession session1 = sqlMaker.getSession();
        userInfMapper mapper = session1.getMapper(userInfMapper.class);
        bin oneBinInf = mapper.getOneBinInf(1);
        System.out.println(oneBinInf);
        System.out.println(oneBinInf.getPer() * 100);
        session1.commit();
    }
}
