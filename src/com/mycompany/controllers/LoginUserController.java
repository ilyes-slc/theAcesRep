/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/javafx/FXMLController.java to edit this template
 */
package com.mycompany.controllers;

import static com.mycompany.gui.Start.Userconnected;
import com.mycompany.entities.User;
import com.mycompany.services.UserService;
import java.io.IOException;
import java.net.URL;
import java.util.ResourceBundle;
import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.fxml.Initializable;
import javafx.scene.Node;
import javafx.scene.Parent;
import javafx.scene.Scene;
import javafx.scene.control.Alert;
import javafx.scene.control.ButtonType;
import javafx.scene.control.PasswordField;
import javafx.scene.control.TextField;
import javafx.scene.input.MouseEvent;
import javafx.stage.Stage;

/**
 * FXML Controller class
 *
 * @author ilyes
 */
public class LoginUserController implements Initializable {

    @FXML
    private TextField emailfield;
    @FXML
    private PasswordField pwdfield;
    UserService su = new UserService();

    /**
     * Initializes the controller class.
     */
    @Override
    public void initialize(URL url, ResourceBundle rb) {
        // TODO
    }    

    @FXML
    private void Login(ActionEvent event) {
        User u = new User();
        u = su.login(emailfield.getText(), pwdfield.getText());
        if(u.getId()== 0){
            Alert alert = new Alert(Alert.AlertType.ERROR, "Verifier vos donnés", ButtonType.CLOSE);
            alert.show();
            
        } else {
            
            User user1 = su.login(emailfield.getText(), pwdfield.getText());
        Userconnected.setId(user1.getId());
        Userconnected.setUsername(user1.getUsername());
        Userconnected.setEmail(user1.getEmail());
        Userconnected.setPassword(user1.getPassword());
        Userconnected.setRole(user1.getRole());
        Userconnected.setImage(user1.getImage());
        
       Userconnected=user1;
        System.out.println("this is test");
        System.out.println(Userconnected);
        
        if(u.getRole().equals("Admin"))
        {
            Alert alert = new Alert(Alert.AlertType.CONFIRMATION, "Je vous souhaite la bienvenue Mr/Mme"+ u.getUsername() +" "+ u.getEmail(), ButtonType.OK);
                alert.show();
     
                FXMLLoader LOADER = new FXMLLoader(getClass().getResource("MenuBack.fxml"));
                try {
                    Parent root = LOADER.load();
                    Scene sc = new Scene(root);
                      MenuBackController cntr = LOADER.getController();
                    Stage window =(Stage)((Node) event.getSource()).getScene().getWindow() ;
              
                    window.setScene(sc);
                    window.show();
                } catch (IOException ex) {
                  
    }
            
        }
        
        
        if(u.getRole().equals("User"))
        {
            Alert alert = new Alert(Alert.AlertType.CONFIRMATION, "Je vous souhaite la bienvenue Mr/Mme"+  u.getUsername() +" "+ u.getEmail(), ButtonType.OK);
            alert.show();
     
                FXMLLoader LOADER = new FXMLLoader(getClass().getResource("UserInterface.fxml"));
                try {
                    Parent root = LOADER.load();
                    Scene sc = new Scene(root);
                      UserInterfaceController cntr = LOADER.getController();
                    Stage window =(Stage)((Node) event.getSource()).getScene().getWindow() ;
              
                    window.setScene(sc);
                    window.show();
                } catch (IOException ex) {
                  
    }
            
        }
        
            
        }
        
    }

    @FXML
    private void GoToRegister(MouseEvent event) {
    }
    
}
