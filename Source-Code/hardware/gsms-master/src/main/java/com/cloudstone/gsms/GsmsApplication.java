package com.cloudstone.gsms;

import org.mybatis.spring.annotation.MapperScan;
import org.springframework.boot.SpringApplication;
import org.springframework.boot.autoconfigure.SpringBootApplication;
import org.springframework.context.annotation.ComponentScan;

@SpringBootApplication
@ComponentScan("com")
@MapperScan("com.cloudstone.gsms.mapper")
public class GsmsApplication {

    public static void main(String[] args) {
        SpringApplication.run(GsmsApplication.class, args);
    }

}
