package com.cloudstone.gsms.controller;

import com.cloudstone.gsms.domain.TrashManager;
import com.cloudstone.gsms.dto.Result;
import com.cloudstone.gsms.enums.ResultEnum;
import com.cloudstone.gsms.exception.GsmsException;
import com.cloudstone.gsms.repository.TrashManagerRepository;
import com.cloudstone.gsms.service.TrashManagerService;
import com.cloudstone.gsms.utils.ResultUtil;
import io.swagger.annotations.Api;
import io.swagger.annotations.ApiOperation;
import org.slf4j.Logger;
import org.slf4j.LoggerFactory;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.data.domain.Example;
import org.springframework.validation.BindingResult;
import org.springframework.web.bind.annotation.*;

import javax.validation.Valid;
import java.util.List;
import java.util.Optional;
@Api
@RestController
@RequestMapping(value = "/trashmanager")
public class TrashManagerController {
    @Autowired
    private TrashManagerRepository trashManagerRepository;
    @Autowired
    private TrashManagerService trashManagerService;

    Logger logger = LoggerFactory.getLogger(getClass());

    @ApiOperation("根据id获取垃圾桶信息")
    @GetMapping("/findTrashManagerById/{id}")
    public TrashManager findTrashManagerById(@PathVariable Integer id){
        return trashManagerRepository.findById(id).orElse(null);
    }

    @GetMapping("/findTrashManagerAll")
    public List<TrashManager> findTrashManagerAll(){
        return trashManagerRepository.findAll();
    }

    @PostMapping("findTrashManagerByIdAndName/{id}")
    public List<TrashManager> findTrashManagerByIdAndName(@PathVariable Integer id, @RequestParam String name ){
        TrashManager trashManager = new TrashManager();
        //trashManager.setId(Id);
        trashManager.setName(name);
        trashManager.setAge(1);
        Example<TrashManager> example = Example.of(trashManager);
        return trashManagerRepository.findAll(example);
    }

    @PostMapping("/saveTrashManager/{id}")
    public TrashManager saveTrashManager(@PathVariable Integer id,@RequestParam String address){
        Optional<TrashManager> optional = trashManagerRepository.findById(id);

        TrashManager trashManager = null;
        if (optional.isPresent()){
            trashManager = optional.get();
            trashManager.setAddress(address);
            trashManagerRepository.save(trashManager);
        }
        return trashManager;
    }

    @GetMapping("/addTrashManagerList")
    public List<TrashManager> addTrashManagerList(){
        List<TrashManager> list = trashManagerService.addTrashManagerList();
        return list;
    }

    @PostMapping("/addTrashManager")
    public Result<TrashManager> addTrashManager(@Valid TrashManager trashManager, BindingResult bindingResult) throws Exception{
        Result<TrashManager> result = new Result<>();
        if (bindingResult.hasErrors()) {
            //result = ResultUtil.fail(Objects.requireNonNull(bindingResult.getFieldError()).getDefaultMessage());
            throw new GsmsException(ResultEnum.AGE_ERROR.getCode(), bindingResult.getFieldError().getDefaultMessage());
        } else {
            try {
                result = ResultUtil.success(trashManagerRepository.save(trashManager));
            } catch (Exception e) {
                throw e;
            }
        }
        logger.info("test");
        return result;
    }

}
