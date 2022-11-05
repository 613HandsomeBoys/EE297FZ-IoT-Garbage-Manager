package com.cloudstone.gsms.domain;

import javax.persistence.*;
import java.util.Objects;

@Entity
@Table(name = "trash_manager", schema = "gsms")
public class TrashManagerEntity {
    private int id;
    private String address;
    private Integer age;
    private String identityCardNumber;
    private String name;
    private String phoneNumber;

    @Id
    @Column(name = "id")
    public int getId() {
        return id;
    }

    public void setId(int id) {
        this.id = id;
    }

    @Basic
    @Column(name = "address")
    public String getAddress() {
        return address;
    }

    public void setAddress(String address) {
        this.address = address;
    }

    @Basic
    @Column(name = "age")
    public Integer getAge() {
        return age;
    }

    public void setAge(Integer age) {
        this.age = age;
    }

    @Basic
    @Column(name = "identity_card_number")
    public String getIdentityCardNumber() {
        return identityCardNumber;
    }

    public void setIdentityCardNumber(String identityCardNumber) {
        this.identityCardNumber = identityCardNumber;
    }

    @Basic
    @Column(name = "name")
    public String getName() {
        return name;
    }

    public void setName(String name) {
        this.name = name;
    }

    @Basic
    @Column(name = "phone_number")
    public String getPhoneNumber() {
        return phoneNumber;
    }

    public void setPhoneNumber(String phoneNumber) {
        this.phoneNumber = phoneNumber;
    }

    @Override
    public boolean equals(Object o) {
        if (this == o) return true;
        if (o == null || getClass() != o.getClass()) return false;
        TrashManagerEntity that = (TrashManagerEntity) o;
        return id == that.id &&
                Objects.equals(address, that.address) &&
                Objects.equals(age, that.age) &&
                Objects.equals(identityCardNumber, that.identityCardNumber) &&
                Objects.equals(name, that.name) &&
                Objects.equals(phoneNumber, that.phoneNumber);
    }

    @Override
    public int hashCode() {
        return Objects.hash(id, address, age, identityCardNumber, name, phoneNumber);
    }
}
