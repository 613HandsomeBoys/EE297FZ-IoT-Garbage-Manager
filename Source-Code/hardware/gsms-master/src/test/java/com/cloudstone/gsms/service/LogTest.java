package com.cloudstone.gsms.service;


import org.junit.Test;
import org.junit.runner.RunWith;
import org.slf4j.Logger;
import org.slf4j.LoggerFactory;
import org.springframework.boot.test.context.SpringBootTest;
import org.springframework.test.context.junit4.SpringRunner;

@RunWith(SpringRunner.class)
@SpringBootTest
public class LogTest {
    private final Logger logger = LoggerFactory.getLogger(getClass());

    @Test
    public void testLogger(){
        logger.info("info");
        logger.error("error");
    }
}
