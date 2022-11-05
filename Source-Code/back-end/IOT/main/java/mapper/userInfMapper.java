package mapper;


import Bean.bin;

import java.util.List;
import java.util.Map;

public interface userInfMapper {
    void addBinInf(bin bin);
    List<bin> getUserStarBooks();
    bin getOneBinInf(int CID);

}
