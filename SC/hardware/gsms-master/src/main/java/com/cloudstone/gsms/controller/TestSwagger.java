package com.cloudstone.gsms.controller;

import com.cloudstone.gsms.dto.PeopleDto;
import com.cloudstone.gsms.dto.Result;
import com.cloudstone.gsms.utils.ReflectUtil;
import com.cloudstone.gsms.utils.ResultUtil;
import io.swagger.annotations.Api;
import io.swagger.annotations.ApiOperation;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.RestController;

import java.util.HashMap;
import java.util.Map;

@Api
@RestController
public class TestSwagger {
    @ApiOperation("test1")
    @GetMapping("/test1")
    public Result test1(){
        PeopleDto peopleDto = new PeopleDto();
        peopleDto.setId(1);
        peopleDto.setName("jin");

        Map<String,Object> map = new HashMap();
        map.put("name","yannan");
        Object o = ReflectUtil.getTarget(peopleDto,map);

        return ResultUtil.success(o);
    }
}
