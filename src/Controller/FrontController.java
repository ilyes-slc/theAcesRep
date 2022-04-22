/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/javafx/FXMLController.java to edit this template
 */
package Controller;

import Entities.Livraison;
import Entities.Livreur;
import gui.ItemController;
import java.io.IOException;
import java.net.URL;
import java.util.ArrayList;
import java.util.List;
import java.util.ResourceBundle;
import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.fxml.Initializable;
import javafx.geometry.Insets;
import javafx.scene.control.Button;
import javafx.scene.control.Label;
import javafx.scene.control.ScrollPane;
import javafx.scene.control.TextField;
import javafx.scene.image.ImageView;
import javafx.scene.input.MouseEvent;
import javafx.scene.layout.AnchorPane;
import javafx.scene.layout.GridPane;
import javafx.scene.layout.HBox;
import javafx.scene.layout.Region;
import javafx.scene.layout.VBox;
import Services.ServiceLivreur;
import javafx.scene.image.Image;
import Test.MyListener;
import static com.sun.media.jfxmediaimpl.MediaUtils.error;
import javafx.collections.FXCollections;
import javafx.scene.control.Alert;
import Services.ServiceLivraison;


/**
 * FXML Controller class
 *
 * @author pc
 */
public class FrontController implements Initializable {

    @FXML
    private TextField search;
    @FXML
    private VBox chosenplat;
      @FXML
    private Label prenom;

    @FXML
    private Label zone;

    @FXML
    private Button but;
    @FXML
    private ScrollPane scroll;
    @FXML
    private GridPane grid;
   
    private List<Livreur> listArt = new ArrayList<>();
    private MyListener myListener;
    Livreur liv = new Livreur();
    @FXML
    private ImageView img;
    @FXML
    private TextField tfMethod;
    @FXML
    private TextField tfIdClient;
    @FXML
    private TextField tfIdProd;
    @FXML
    private TextField tfAdresse;
    @FXML
    private Label error;
   ServiceLivraison sl = new ServiceLivraison();
    @FXML
    private Label cin;
 

    /**
     * Initializes the controller class.
     */
    @Override
    public void initialize(URL url, ResourceBundle rb) {
             showScreen();
    }   
    private void setChosenPlat(Livreur livreur) {
        
        String path = "/img/"+livreur.getImage();
        Image image = new Image(getClass().getResourceAsStream(path));
        System.out.println("test");
    
     
         System.out.println("test1");
       prenom.setText(livreur.getPrenom());
        zone.setText(livreur.getZone());
        img.setImage(image);
        cin.setText(""+livreur.getCin());
         System.out.println("test2");
       
        chosenplat.setStyle("-fx-background-radius: 30;");
    }

    @FXML
    private void searchButton(ActionEvent event) {
    }
    public void showScreen() {
       ServiceLivreur sl = new ServiceLivreur();
        listArt.addAll(sl.recuperer());

        if (listArt.size() > 0) {
            setChosenPlat(listArt.get(0));
            System.out.println(listArt.get(0).getPrenom());
            myListener = new MyListener() {
                @Override
                public void onClickListener(Livreur nomp) {
                    setChosenPlat(nomp);
                    liv.setCin(nomp.getCin());
                    liv.setName(nomp.getName());
                    liv.setPrenom(nomp.getPrenom());
                    liv.setDate_naissance(nomp.getDate_naissance());
                    liv.setImage(nomp.getImage());
                    liv.setRating(nomp.getRating());
                    liv.setZone(nomp.getZone());
                    liv.setTel(nomp.getTel());
                    System.out.println("Coach get"+liv);
                    

                }

            };
        }
                    
        int column = 0;
        int row = 1;
        grid.getChildren().clear();
        try {
            for (int i = 0; i < listArt.size(); i++) {
                FXMLLoader fxmlLoader = new FXMLLoader();
                fxmlLoader.setLocation(getClass().getResource("/gui/LivreurItem.fxml"));
                AnchorPane abc = fxmlLoader.load();
                ItemController platController = fxmlLoader.getController();
                platController.setData(listArt.get(i), myListener);

                if (column == 1) {
                    column = 0;
                    row++;
                }

                grid.add(abc, column++, row); //(child,column,row)
                //set grid width

                grid.setMinWidth(Region.USE_COMPUTED_SIZE);
                grid.setPrefWidth(Region.USE_COMPUTED_SIZE);
                grid.setMaxWidth(Region.USE_PREF_SIZE);

                //set grid height
                grid.setMinHeight(Region.USE_COMPUTED_SIZE);
                grid.setPrefHeight(Region.USE_COMPUTED_SIZE);
                grid.setMaxHeight(Region.USE_PREF_SIZE);

                GridPane.setMargin(abc, new Insets(10));
            }
        } catch (IOException e) {
            e.printStackTrace();
        }
    }

    @FXML
    private void ajouterLivraison(ActionEvent event) {
         if (tfMethod.getText().isEmpty()|| tfAdresse.getText().isEmpty()  || tfIdClient.getText().isEmpty() || tfIdProd.getText().isEmpty()){
        error.setText("Verifier les entrées s'il vous plait");}
       else
        {// FIXME: change the id user from 1 to the current logged in user.
        sl.ajouter(new Livraison(tfMethod.getText(),(Integer.parseInt(cin.getText())), Integer.parseInt(tfIdClient.getText()),Integer.parseInt(tfIdProd.getText()),tfAdresse.getText(),"en cour"));
       
       Alert alert = new Alert(Alert.AlertType.INFORMATION);
alert.setTitle("Livraison added");
alert.setContentText("Livraison added succesfuuly!");
    }
    }
}
    
    
