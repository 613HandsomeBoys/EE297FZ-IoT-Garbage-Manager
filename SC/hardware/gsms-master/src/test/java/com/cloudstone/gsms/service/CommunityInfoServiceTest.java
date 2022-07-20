package com.cloudstone.gsms.service;

import com.cloudstone.gsms.domain.CommunityInfoEntity;
import com.cloudstone.gsms.dto.Result;
import org.junit.Assert;
import org.junit.Test;
import org.junit.runner.RunWith;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.boot.test.context.SpringBootTest;
import org.springframework.test.context.junit4.SpringRunner;

@RunWith(SpringRunner.class)
@SpringBootTest
public class CommunityInfoServiceTest {
    @Autowired
    private CommunityInfoService communityInfoService;

    @Test
    public void addCommunityInfoTest(){
        Result<CommunityInfoEntity> result =  communityInfoService.findCommunityInfoById(20);
        Integer code = result.getCode();
        Assert.assertEquals(code, Integer.valueOf(0));
    }
}