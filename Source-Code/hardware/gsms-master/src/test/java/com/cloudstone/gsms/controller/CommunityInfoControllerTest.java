package com.cloudstone.gsms.controller;

import org.junit.Test;
import org.junit.runner.RunWith;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.boot.test.autoconfigure.web.servlet.AutoConfigureMockMvc;
import org.springframework.boot.test.context.SpringBootTest;
import org.springframework.test.context.junit4.SpringRunner;
import org.springframework.test.web.servlet.MockMvc;
import org.springframework.test.web.servlet.request.MockMvcRequestBuilders;
import org.springframework.test.web.servlet.result.MockMvcResultMatchers;

@RunWith(SpringRunner.class)
@SpringBootTest
@AutoConfigureMockMvc
public class CommunityInfoControllerTest {
    @Autowired
    private MockMvc mvc;

    @Test
    public void addCommunityInfo() {
    }

    @Test
    public void findCommunityInfo() throws Exception {
        //检查返回状态
        mvc.perform(MockMvcRequestBuilders.get("/communityinfo/findCommunityInfo/20"))
                .andExpect(MockMvcResultMatchers.status().isOk());
        //检查返回值是否包含字符串
//        mvc.perform(MockMvcRequestBuilders.get("/communityinfo/findCommunityInfo/20"))
//                .andExpect(MockMvcResultMatchers.status().isOk()).andExpect(MockMvcResultMatchers.content().string("0"));
    }
}