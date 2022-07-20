package Bean;

public class bin {
    int alarm=0;
    int messageId;
    float height;
    int CID;
    float per;
//alarm 默认为0，也就是不报警，per超过70报警，设置为1
    public bin(int alarm, float height, int CID, float per) {
        this.alarm = alarm;
        this.height = height;
        this.CID = CID;
        this.per = per;
    }

    public bin(float height, int CID, float per) {
        this.height = height;
        this.CID = CID;
        this.per = per;
        if (per>0.7){
            this.alarm=1;
        }
    }
}
