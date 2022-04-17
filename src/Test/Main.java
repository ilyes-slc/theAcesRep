/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Test;
import Entities.Livreur;
import Services.ServiceLivreur;
import Entities.Livraison;
import Services.ServiceLivraison;

/**
 *
 * @author hp
 */

public class Main {
    public static void main(String[] args) {
//        Livreur l =new Livreur(1111, "nabil", "kallel", 0, "2000-06-29", "tunis", "test", "+21625700763");
//         Livreur l1 =new Livreur(1221, "span", "kallel", 0, "2000-06-29", "sounii", "test", "+21625700763");
//          Livreur l3 =new Livreur(1515, "test", "test", 0, "2000-06-29", "test", "test", "+21625700763");
//        ServiceLivreur s= new ServiceLivreur();
//       
//        System.out.println(s.recuperer());  
        ServiceLivraison s = new ServiceLivraison();
        Livraison L = new Livraison(27,"aaaa", 1221, 0, 0, "test", "bon");
         Livraison L1 = new Livraison(27,"bbbb", 1221, 30, 10, "test", "bon");
//        System.out.println(s1.recuperer()); 
//        s1.modifier( L1);
//         System.out.println(s1.recuperer()); 
System.out.println(s.getCinL());
        
    }
}
