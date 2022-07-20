package com.cloudstone.gsms.repository;

import com.cloudstone.gsms.domain.TraceLogEntity;
import org.springframework.data.jpa.repository.JpaRepository;

public interface TraceLogRepository  extends JpaRepository<TraceLogEntity,Integer> {
}
