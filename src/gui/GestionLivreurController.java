/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package gui;

import Entities.Livreur;
import java.awt.image.BufferedImage;
import java.io.File;
import java.io.IOException;
import static java.lang.String.valueOf;
import java.net.URL;
import java.util.ResourceBundle;
import java.util.stream.Collectors;
import javafx.collections.FXCollections;
import javafx.collections.ObservableList;
import javafx.embed.swing.SwingFXUtils;
import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.fxml.Initializable;
import javafx.scene.Node;
import javafx.scene.Parent;
import javafx.scene.control.Alert;
import javafx.scene.control.Alert.AlertType;
import javafx.scene.control.Button;
import javafx.scene.control.ComboBox;
import javafx.scene.control.Label;
import javafx.scene.control.TableColumn;
import javafx.scene.control.TableRow;
import javafx.scene.control.TableView;
import javafx.scene.control.TextField;
import javafx.scene.control.cell.PropertyValueFactory;
import javafx.scene.image.Image;
import javafx.stage.FileChooser;
import javafx.stage.Stage;
import javax.imageio.ImageIO;
import Services.ServiceLivreur;
import Services.ServiceLivraison;
import java.sql.Date;
import javafx.scene.control.DatePicker;

/**
 *
 * @author bouss
 */
public class GestionLivreurController implements Initializable {
    
    ServiceLivreur sl = new ServiceLivreur();
      @FXML
    private Button retour;

    @FXML
    private TableView<Livreur> tblLiv;

    @FXML
    private TableColumn<Livreur, Integer> tbCin;

    @FXML
    private TableColumn<Livreur, String> tbNom;

    @FXML
    private TableColumn<Livreur, String> tbPrenom;
     @FXML
    private TableColumn<Livreur, Date> tbDate;

    @FXML
    private TableColumn<Livreur, String> tbImage;

    @FXML
    private TableColumn<Livreur, String> tbZone;

    @FXML
    private TableColumn<Livreur, String> tbTel;

    @FXML
    private TextField tfCin;

    @FXML
    private TextField tfNom;

    @FXML
    private TextField tfPrenom;

    @FXML
    private TextField tfimg;

    @FXML
    private Button AddP;

    @FXML
    private Button DelP;

    @FXML
    private Button EdP;

    @FXML
    private Button AddC;

    private ComboBox<Livreur> combCat;

    @FXML
    private Label error;

    @FXML
    private TextField tfZone;

    @FXML
    private TextField tfTel;

  

    ObservableList<Livreur> list;

    ServiceLivreur servLiv;
    
    File selectedImage;

    private int selectedLivCIN;
    @FXML
    private DatePicker dateP;

    @Override
    public void initialize(URL location, ResourceBundle resources) {
         list = FXCollections.observableArrayList(sl.recuperer());

        tbCin.setCellValueFactory(new PropertyValueFactory<>("cin"));
        tbNom.setCellValueFactory(new PropertyValueFactory<>("name"));
        tbPrenom.setCellValueFactory(new PropertyValueFactory<>("prenom"));
        tbDate.setCellValueFactory(new PropertyValueFactory<>("date_naissance"));
        tbImage.setCellValueFactory(new PropertyValueFactory<>("image"));
         tbZone.setCellValueFactory(new PropertyValueFactory<>("zone"));
          tbTel.setCellValueFactory(new PropertyValueFactory<>("tel"));
         
       
       

        tblLiv.setItems(list);
        
        tblLiv.setRowFactory(tv -> {

            TableRow<Livreur> row = new TableRow<>();

            row.setOnMouseClicked(event -> {

                if (!row.isEmpty()) {
                    final Livreur selectedItem = tblLiv.getSelectionModel().getSelectedItem();
                    tfCin.setText(""+selectedItem.getCin());
                    tfNom.setText(selectedItem.getName());
                   tfPrenom.setText(selectedItem.getPrenom());
                   
                   dateP.setValue(selectedItem.getDate_naissance().toLocalDate());
                    tfimg.setText(selectedItem.getImage());
                     tfZone.setText(selectedItem.getZone());
                      tfTel.setText(selectedItem.getTel());
                    
                    //combCat.setValue(selectedItem.getCategory());
                    AddC.setDisable(false);

                    selectedLivCIN = selectedItem.getCin();
                }
            });

            return row;
        });

        servLiv = new ServiceLivreur();

        ObservableList<String> catNames = FXCollections
                .observableArrayList(
                        servLiv.recuperer().stream().map(c -> c.getName()).collect(Collectors.toList())
                );
        
        System.out.println(catNames);

        //combCat.setItems(catNames);
    }
    
    @FXML
    private void returnb(ActionEvent event) {
        try {
            FXMLLoader loader = new FXMLLoader(getClass().getResource("Home.fxml"));
            Parent root = loader.load();
            retour.getScene().setRoot(root);
        } catch (IOException ex) {
            System.out.println(ex.getMessage());
        }
    }
    
    @FXML
    private void AddP(ActionEvent event) {

    //  final int cin = servCat.getIdByCategoryName(combCat.getValue());
        if (tfCin.getText().isEmpty()){
        error.setText("Verifier les entrées s'il vous plait");}
       else
        {// FIXME: change the id user from 1 to the current logged in user.
        sl.ajouter(new Livreur(Integer.parseInt(tfCin.getText()),tfNom.getText(), tfPrenom.getText(),java.sql.Date.valueOf(dateP.getValue()), tfZone.getText(),tfimg.getText(),tfTel.getText()));
        tblLiv.setItems(FXCollections.observableArrayList(sl.recuperer()));
       Alert alert = new Alert(AlertType.INFORMATION);
alert.setTitle("Product added");
alert.setContentText("Product added succesfuuly!");
        tblLiv.refresh();
}

    }

    @FXML
    private void DelP(ActionEvent event) {
       final Livreur selectedItem = tblLiv.getSelectionModel().getSelectedItem();
       Livreur liv = sl.GetByCin(selectedItem.getCin());
       sl.supprimer(liv.getCin());
        
        list.remove(selectedItem);
        tblLiv.setItems(FXCollections.observableArrayList(sl.recuperer()));
        tblLiv.refresh();
    }

    @FXML
    private void EdP(ActionEvent event) {
        //final int cin = servLiv.getIdByCategoryName(combCat.getValue());

        // FIXME: change the id user from 1 to the current logged in user.
        final Livreur selectedItem = tblLiv.getSelectionModel().getSelectedItem();
        Livreur liv = sl.GetByCin(selectedItem.getCin());
        liv.setCin(Integer.parseInt(tfCin.getText()));
        liv.setName(tfNom.getText());
        liv.setPrenom(tfPrenom.getText());
         liv.setDate_naissance(java.sql.Date.valueOf(dateP.getValue()));
          liv.setImage(tfimg.getText());
          liv.setZone(tfZone.getText());
          liv.setTel(tfTel.getText());
        
     
        sl.modifier(liv);
        tblLiv.setItems(FXCollections.observableArrayList(sl.recuperer()));
        tblLiv.refresh();
        
        
    }

    @FXML
    private void AddC(ActionEvent event) {

        try {

            FXMLLoader loader = new FXMLLoader(getClass().getResource("Promo.fxml"));

            Parent root = loader.load();
            retour.getScene().setRoot(root);

           

        } catch (IOException ex) {
            
        }
    }
    
    
     @FXML
    private void chooseImage(ActionEvent event) {
        final FileChooser fileChooser = new FileChooser();
        Node node = (Node) event.getSource();
        Stage thisStage = (Stage) node.getScene().getWindow();
        selectedImage = fileChooser.showOpenDialog(thisStage);

        if (selectedImage != null) {
            String selectedImagePath = selectedImage.toURI().toString();
           Image image = new Image(selectedImage.toURI().toString());
            
            File outputFile = new File("C:\\Users\\bouss\\Desktop\\piDesk\\PidevDeskM");

            BufferedImage bImage = SwingFXUtils.fromFXImage(image, null);
            try {
                ImageIO.write(bImage, "png", outputFile);
            } catch (IOException e) {
                throw new RuntimeException(e);
            }

        }
    }

    
    
}
