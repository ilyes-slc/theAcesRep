/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/javafx/FXMLController.java to edit this template
 */
package com.mycompany.controllers;

import java.net.URL;
import java.util.ResourceBundle;
import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.fxml.Initializable;
import javafx.scene.control.Button;
import javafx.scene.control.Label;
import javafx.scene.control.TextField;
import javafx.scene.image.ImageView;
import javafx.scene.input.MouseEvent;

/**
 * FXML Controller class
 *
 * @author ilyes
 */
public class RegisterUserController implements Initializable {

    @FXML
    private TextField NomField;
    @FXML
    private TextField EmailField;
    @FXML
    private TextField PasswordField;
    @FXML
    private Label ImageName;
    @FXML
    private Button upload;
    @FXML
    private Button RegisterButton;
    @FXML
    private ImageView UserImg;

    /**
     * Initializes the controller class.
     */
    @Override
    public void initialize(URL url, ResourceBundle rb) {
        // TODO
    }    

    @FXML
    private void uploadImage(ActionEvent event) {
    }

    @FXML
    private void register(ActionEvent event) {
    }

    @FXML
    private void GoToLogin(MouseEvent event) {
    }
    
}
