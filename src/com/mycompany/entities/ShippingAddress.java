/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package com.mycompany.entities;

/**
 *
 * @author ilyes
 */
public class ShippingAddress {
    private int id,postalCode;
    private String address,city,state,country;

    public ShippingAddress(int id, int postalCode, String address, String city, String state, String country) {
        this.id = id;
        this.postalCode = postalCode;
        this.address = address;
        this.city = city;
        this.state = state;
        this.country = country;
    }

    public ShippingAddress(int postalCode, String address, String city, String state, String country) {
        this.postalCode = postalCode;
        this.address = address;
        this.city = city;
        this.state = state;
        this.country = country;
    }

    public int getId() {
        return id;
    }

    public void setId(int id) {
        this.id = id;
    }

    public int getPostalCode() {
        return postalCode;
    }

    public void setPostalCode(int postalCode) {
        this.postalCode = postalCode;
    }

    public String getAddress() {
        return address;
    }

    public void setAddress(String address) {
        this.address = address;
    }

    public String getCity() {
        return city;
    }

    public void setCity(String city) {
        this.city = city;
    }

    public String getState() {
        return state;
    }

    public void setState(String state) {
        this.state = state;
    }

    public String getCountry() {
        return country;
    }

    public void setCountry(String country) {
        this.country = country;
    }
}
