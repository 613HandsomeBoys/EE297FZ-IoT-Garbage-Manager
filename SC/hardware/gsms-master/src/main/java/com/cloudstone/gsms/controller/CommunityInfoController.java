package com.cloudstone.gsms.controller;

import com.cloudstone.gsms.domain.CommunityInfoEntity;
import com.cloudstone.gsms.dto.Result;
import com.cloudstone.gsms.repository.CommunityInfoRepository;
import com.cloudstone.gsms.service.CommunityInfoService;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.validation.BindingResult;
import org.springframework.web.bind.annotation.*;

import javax.validation.Valid;

@RestController
@RequestMapping(value = "/communityinfo")
public class CommunityInfoController {

    @Autowired
    private CommunityInfoRepository communityInfoRepository;
    @Autowired
    private CommunityInfoService communityInfoService;
    @PostMapping("/addCommunityInfo")
    public Result<CommunityInfoEntity> addCommunityInfo(@Valid CommunityInfoEntity communityInfo, BindingResult bindingResult) throws Exception{
        return communityInfoService.addCommunity(communityInfo,bindingResult);
    }

    @GetMapping("/findCommunityInfo/{id}")
    public Result<CommunityInfoEntity> findCommunityInfo(@PathVariable Integer id){
        return communityInfoService.findCommunityInfoById(id);
    }

    @GetMapping("/findCommunityInfoByNameLike")
    public Result<CommunityInfoEntity> findCommunityInfoByNameLike(@RequestParam String name){
        return communityInfoService.findByNameLike(name);
    }
}
