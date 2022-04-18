/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/javafx/FXMain.java to edit this template
 */
package com.mycompany.gui;

import com.mycompany.entities.User;
import java.io.IOException;
import javafx.application.Application;
import javafx.fxml.FXMLLoader;
import javafx.scene.Parent;
import javafx.scene.Scene;
import javafx.stage.Stage;

/**
 *
 * @author ilyes
 */
public class Start extends Application {
     public static User Userconnected = new User();
    @Override
    public void start(Stage primaryStage) {
        
        try {
            Parent root = FXMLLoader.load(getClass().getResource("LoginUser.fxml"));
            Scene scene = new Scene(root);
            
            primaryStage.setTitle("Ajouter Personne");
            primaryStage.setScene(scene);
            primaryStage.show();
        } catch (IOException ex) {
            System.out.println(ex.getMessage());
        }
    }


    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        launch(args);
    }
    
}
