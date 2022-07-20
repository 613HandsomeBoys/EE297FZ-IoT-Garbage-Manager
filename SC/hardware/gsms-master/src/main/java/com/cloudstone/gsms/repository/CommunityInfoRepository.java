package com.cloudstone.gsms.repository;

import com.cloudstone.gsms.domain.CommunityInfoEntity;
import org.springframework.data.jpa.repository.JpaRepository;

import java.util.List;

public interface CommunityInfoRepository  extends JpaRepository<CommunityInfoEntity, Integer> {
    public List<CommunityInfoEntity> findByNameLike(String name);
    public List<CommunityInfoEntity> findByName(String name);
}
