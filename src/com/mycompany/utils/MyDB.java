/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package com.mycompany.utils;

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.SQLException;
//import java.sql.*;

/**
 *
 * @author ILyes
 */
public class MyDB {

    private Connection connection;
    static MyDB instance;

    private MyDB() {
        try {
            String url = "jdbc:mysql://localhost:3306/theAcesfinal";
            String password;
            password = "ILYES";
            String username = "ilyes";
            connection = DriverManager.getConnection(url, username, password);
            System.out.println("Connexion établie");
        } catch (SQLException ex) {
            System.out.println(ex.getMessage());
        }
    }

    public static MyDB getInstance() {
        if (instance == null) {
            instance = new MyDB();
        }
        return instance;
    }

    public Connection getConnection() {
        return connection;
    }
}
