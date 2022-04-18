/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package com.mycompany.services;
import com.mycompany.entities.User;
import com.mycompany.utils.MyDB;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;
import java.util.logging.Level;
import java.util.logging.Logger;

/**
 *
 * @author Ilyes
 */
public class UserService implements IUserService<User> {
    private final Connection con;

    public UserService() {
        con = MyDB.getInstance().getConnection();
    }

    @Override
    public void register(User t) throws SQLException {
        Statement ste = con.createStatement();
        String requeteInsert = "INSERT INTO user ( username , roles , password , nom , prenom , email , sex ) VALUES ( '" + t.getUsername() + "' , '" + t.getRole() + "', '" + t.getPassword() + "', '" + t.getNom() + "', '" + t.getPrenom() + "' , '"+t.getEmail() + "' , '"+t.getSex()+"');";
        ste.executeUpdate(requeteInsert);

    }



    @Override
    public User login(String username, String password) throws SQLException {
        User u = new User();
        try {
            String sql = "SELECT * from user WHERE username='" + username + "' AND password='" + password + "'";

            PreparedStatement ps = con.prepareStatement(sql);
            ResultSet rs = ps.executeQuery(sql);
            if (rs.next()) {
                int id = rs.getInt(1);
                u = getUser(id, rs);
                //User(id, Username, Email, Image, Nom, Prenom, Password, Sex, Role, IsVerified)
                System.out.println(" |||  user  connected  |||");
                System.out.println(u);
              
            } else {
                System.out.println("not found");
            }
            

        } catch (SQLException ex) {
            Logger.getLogger(IUserService.class.getName()).log(Level.SEVERE, null, ex);
        }
        return u;
    }

    @Override
    public boolean update(User t, int id) throws SQLException {
        String sql = "UPDATE user SET email=? , image=? , nom=? , prenom=? WHERE id=?";

        PreparedStatement statement = con.prepareStatement(sql);
        statement.setString(1, t.getEmail());
        statement.setString(2, t.getImage());
        
        statement.setString(3, t.getNom());
        statement.setString(4, t.getPrenom());
        statement.setInt(5, id);
       

        int rowsUpdated = statement.executeUpdate();
        if (rowsUpdated > 0) {
            System.out.println("An existing User was updated successfully!");
        }
        return true;
    }

    @Override
    public boolean ResetPassword(String pass, int id) throws SQLException {
        String sql = "UPDATE user SET password=? WHERE id=?";

        PreparedStatement statement = con.prepareStatement(sql);
        statement.setString(1, pass);
        statement.setInt(2, id);
        
       

        int rowsUpdated = statement.executeUpdate();
        if (rowsUpdated > 0) {
            System.out.println("An existing User has reset his password !");
        }
        return true;
    }

    @Override
    public boolean delete(User t) throws SQLException {
        PreparedStatement pre = con.prepareStatement("DELETE FROM user where id =? AND username =?");
        pre.setInt(1, t.getId());
        pre.setString(2, t.getUsername());
        pre.executeUpdate();
        int rowsDeleted = pre.executeUpdate();
        if (rowsDeleted > 0) {
            System.out.println("A User was deleted successfully!");
        }
        return true;    }

    @Override
    public User FindById(int id) throws SQLException {
        String req = "select * from user where id = ?";
        User u = null;
        try {
            PreparedStatement ps = con.prepareStatement(req);
            ps.setInt(1, id);
            ResultSet rs = ps.executeQuery();
            if (rs.next()) u = getUser(id, rs);
        } catch (Exception e) {
            e.printStackTrace();
        }
        return u;
    }

    private User getUser(int id, ResultSet rs) throws SQLException {
        String Username = rs.getString(2);
        String Roles = rs.getString(3);
        String Password = rs.getString(4);
        String Nom = rs.getString(5);
        String Prenom = rs.getString(6);
        String Email = rs.getString(7);
        String Image = rs.getString(8);
        String Sex = rs.getString(9);
        boolean IsVerified = rs.getBoolean(10);
        boolean IsAdmin = Roles.contains("ROLE_ADMIN");
        return new User(id, Username, Email, Image, Nom, Prenom, Password, Sex, Roles, IsVerified , IsAdmin);
    }

}
