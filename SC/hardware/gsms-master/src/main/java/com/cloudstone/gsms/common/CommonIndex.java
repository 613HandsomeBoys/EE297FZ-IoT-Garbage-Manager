package com.cloudstone.gsms.common;

import com.cloudstone.gsms.dto.DefaultConfig;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.beans.factory.annotation.Value;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestParam;
import org.springframework.web.bind.annotation.RestController;

@RestController
public class CommonIndex {
    @Value("${default.name}")
    private String defaultName;

    @Autowired
    private DefaultConfig defaultConfig;

    @GetMapping({"getWelcome"})
    public String getWelcome(@RequestParam(value = "name", required = false, defaultValue = "jinyannan") String name) {
        return "Welcome to Get GSS." + name + defaultConfig.getName() + defaultConfig.getAge() + defaultConfig.getDescription();
    }

    @PostMapping({"postWelcome"})
    public String getPostMessage() {
        return "Welcome to Post GSS.";
    }

    @GetMapping({"hello"})
    public String hello(@RequestParam String name, @RequestParam String id) {
        return "Welcome to Get GSS." + name + id + defaultName;
    }

}
