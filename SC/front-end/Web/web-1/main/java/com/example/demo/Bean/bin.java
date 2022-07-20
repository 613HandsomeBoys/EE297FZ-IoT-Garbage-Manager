package com.example.demo.Bean;

public class bin {
    int alarm;
    int messageId;
    float height;
    int CID;
    float per;

    public bin() {
    }

    public bin(int alarm, float height, int CID, float per) {
        this.alarm = alarm;
        this.height = height;
        this.CID = CID;
        this.per = per;
    }

    @Override
    public String toString() {
        return "bin{" +
                "alarm=" + alarm +
                ", messageId=" + messageId +
                ", height=" + height +
                ", CID=" + CID +
                ", per=" + per +
                '}';
    }


    public int getAlarm() {
        return alarm;
    }

    public void setAlarm(int alarm) {
        this.alarm = alarm;
    }

    public int getMessageId() {
        return messageId;
    }

    public void setMessageId(int messageId) {
        this.messageId = messageId;
    }

    public float getHeight() {
        return height;
    }

    public void setHeight(float height) {
        this.height = height;
    }

    public int getCID() {
        return CID;
    }

    public void setCID(int CID) {
        this.CID = CID;
    }

    public float getPer() {
        return per;
    }

    public void setPer(float per) {
        this.per = per;
    }
}
