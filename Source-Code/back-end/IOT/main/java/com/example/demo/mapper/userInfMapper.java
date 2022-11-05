package com.example.demo.mapper;


import com.example.demo.Bean.bin;
import org.apache.ibatis.annotations.Mapper;

import java.util.List;

@Mapper
public interface userInfMapper {

    void addBinInf(bin bin);

    List<bin> getBinInf(int CID);

    bin getOneBinInf(int CID);
}
