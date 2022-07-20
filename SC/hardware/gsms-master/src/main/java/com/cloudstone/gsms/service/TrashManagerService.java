package com.cloudstone.gsms.service;

import com.cloudstone.gsms.domain.TrashManager;
import com.cloudstone.gsms.repository.TrashManagerRepository;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;
import org.springframework.transaction.annotation.Transactional;

import java.util.ArrayList;
import java.util.List;

@Service
public class TrashManagerService {
    @Autowired
    private TrashManagerRepository repository;



    @Transactional
    public List<TrashManager> addTrashManagerList() {
        TrashManager trashManager1 = new TrashManager();
        trashManager1.setId(2);
        trashManager1.setAddress("test1");
        trashManager1.setName("test2");
        trashManager1.setAge(14);

        repository.save(trashManager1);
//        trashManager2.setAddress("test2");
//        TrashManager trashManager2 = new TrashManager();
//        trashManager2.setName("test2");
//        trashManager2.setAge(15);
//        repository.save(trashManager2);

        List<TrashManager> list = new ArrayList<>();
        list.add(trashManager1);
//        list.add(trashManager2);
        System.out.println("test");
        return list;
    }

    @Transactional
    public TrashManager addTrashManager(TrashManager trashManager) {
        return repository.save(trashManager);
    }
}
