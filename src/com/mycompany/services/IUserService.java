/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package com.mycompany.services;

import java.sql.SQLException;
import com.mycompany.entities.User;

/**
 *
 * @author Ilyes
 * @param <T>
 */
public interface IUserService<T> {
     void register(T t)throws SQLException;
    boolean update(T t, int id)throws SQLException;
    boolean ResetPassword(String pass, int id)throws SQLException;
    User login(String email, String password) throws SQLException;
    boolean delete(T t) throws SQLException;
    User FindById(int id) throws SQLException;
    
}
