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
public class User {
    private int id;
    private String username;
    private String email;
    private String image;
    private String nom;
    private String prenom;
    private String password;
    private String sex;
    private String role;
    private boolean isVerified,isAdmin;

    public User(int id, String username, String email, String photo, String nom, String prenom, String password, String sex) {
        this.id = id;
        this.username = username;
        this.email = email;
        this.image = photo;
        this.nom = nom;
        this.prenom = prenom;
        this.password = password;
        this.sex = sex;
    }

    public User(int id, String username, String email, String image, String nom, String prenom, String password, String sex, String role, boolean isVerified, boolean isAdmin) {
        this.id = id;
        this.username = username;
        this.email = email;
        this.image = image;
        this.nom = nom;
        this.prenom = prenom;
        this.password = password;
        this.sex = sex;
        this.role = role;
        this.isVerified = isVerified;
        this.isAdmin = isAdmin;
    }

    public User(String username, String password) {
        this.username = username;
        this.password = password;
    }
    
    public User() {
        
    }

    public User(String username, String email, String photo, String nom, String prenom, String motdepasse, String sex) {
        this.username = username;
        this.email = email;
        this.image = photo;
        this.nom = nom;
        this.prenom = prenom;
        this.password = motdepasse;
        this.sex = sex;
    }

    @Override
    public String toString() {
        return "User{" +
                "id=" + id +
                ", username='" + username + '\'' +
                ", email='" + email + '\'' +
                ", photo='" + image + '\'' +
                ", nom='" + nom + '\'' +
                ", prenom='" + prenom + '\'' +
                ", motdepasse='" + password + '\'' +
                ", sex='" + sex + '\'' +
                ", isVerified=" + isVerified +
                ", isAdmin=" + isAdmin +
                '}';
    }

    public int getId() {
        return id;
    }

    public void setId(int id) {
        this.id = id;
    }
    
    public String getRole() {
        return role;
    }

    public void setRole(String role) {
        this.role = role;
    }

    public String getUsername() {
        return username;
    }

    public void setUsername(String username) {
        this.username = username;
    }

    public String getEmail() {
        return email;
    }

    public void setEmail(String email) {
        this.email = email;
    }

    public String getImage() {
        return image;
    }

    public void setImage(String image) {
        this.image = image;
    }

    public String getNom() {
        return nom;
    }

    public void setNom(String nom) {
        this.nom = nom;
    }

    public String getPrenom() {
        return prenom;
    }

    public void setPrenom(String prenom) {
        this.prenom = prenom;
    }

    public String getPassword() {
        return password;
    }

    public void setPassword(String password) {
        this.password = password;
    }

    public boolean getIsVerified() {
        return isVerified;
    }

    public void setIsVerified(boolean isVerified) {
        this.isVerified = isVerified;
    }

    public boolean getIsAdmin() {
        return isAdmin;
    }

    public void setIsAdmin(boolean isAdmin) {
        this.isAdmin = isAdmin;
    }

    public String getSex() {
        return sex;
    }

    public void setSex(String sex) {
        this.sex = sex;
    }


}
