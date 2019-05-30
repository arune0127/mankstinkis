<?php

      // uzduotis
      // sukurti f-ja createArticle($connection, $title, $content, $date, $user_ID)
      // sukurti f-ja editeArticle($connection, $title, $content, $date, $user_ID)
      // sukurti f-ja deleteArticle($connection, $id)
      // sukurti f-ja getArticle($connection, $id)
      // sukurti f-ja getArticles($connection)
      // sukurti f-ja getArticlesByTittle($connection, $searchTerm)
            // SELECT * FROM articles
            //   WHERE

              echo "db.php";
              echo "db.php";

                  define('HOST', 'localhost');
                  define('DB_USERNAME', 'root');
                  define('DB_PASSWORD', 'root');
                  define('DB_NAME', 'manksta');


              function connect_DB () {
                     $connection = mysqli_connect( HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
                     if ( $connection) {
                       echo " prisijungete sekmingai <br />";
                     } else {
                       echo "NEPAVYKO prisijungti!!! " . mysqli_connect_error()  . " <br />";
                     }
                     return $connection;
                   }
                   connect_DB();




                    function createArticle($title, $content, $user_ID) {
                        $sql = "INSERT INTO Articles
                                VALUES ('', '$title', '$content', NOW(), '$user_ID')";
                        $connect = connect_DB();
                        $status = mysqli_query($connect, $sql);
                        if( !$status) {
                          echo "Neapvyko sukurti straipsnio!!!  <br>";
                       } else {
                            echo "Sveikiname, Jusu straipsnis sukurtas <br>";
                       }
                    }


                      //createArticle ('', 'manktosakims', 'lalalalala', 2); - paduota mano funkcija!!!!!!
                      //createArticle ('manktosakims', 'lalalalala', 2);


                      function editeArticle($id_kuri_keiciam, $title, $content, $user_ID) {
                        $sql = "UPDATE articles
                        SET   title='$title', content='$content', user_ID ='$user_ID'
                        WHERE id = $id_kuri_keiciam";
                    $connect = connect_DB();
                    $status = mysqli_query($connect, $sql); // mysqli_query - komanda paduota duombazei, vykdoma uzklausa !!!!!!
                    if( !$status) {
                      echo "Neapvyko redaguoti straipsnio!!!  <br>";
                   } else {
                        echo "Sveikiname, Jusu straipsnis redaguotas <br>";
                   }
                }

                function deleteArticle( $id){
                          $sql = "DELETE FROM articles
                                  WHERE id = $id";
                          $connect = connect_DB();
                          $status = mysqli_query($connect, $sql);
                          if( !$status) {
                            echo "Neapvyko istrinti straipsnio!!! ". mysqli_error($connect) . " <br>";
                         } else {
                              echo "Sveikiname, Jusu straipsnis istrintas <br>";
                         }
                      }
                     //  deleteArticle(5);
                    // editeArticle(3, 'mankstosrankoms','rarara', 3); - paduota mano funkcija!!!!!!
      // editeArticle(4,"Zuvo geles", "Mociutes darzeli istrype kralikai", 2);

                  //   function deleteArticle($connection, $id) {
                  //     $sql = "DELETE FROM articles
                  //     WHERE id = $id";
                  //     $connect = connect_DB();
                  //     $status = mysqli_query($connect, $sql); // mysqli_query - komanda paduota duombazei, vykdoma uzklausa !!!!!!
                  //     if( !$status) {
                  //       echo "Nepavyko istrinti straipsnio!!!  <br>";
                  //    } else {
                  //         echo "Sveikiname, Jusu straipsnis istrintas <br>";
                  //    }
                  // }
                  //
                  // deleteArticle(1);

                //
                function getArticle($id) {
            $sql = "SELECT * FROM img
                    WHERE  id = $id";
            $connect = connect_DB();
            $results = mysqli_query($connect, $sql);

            // mysqli_fetch_assoc - suskaldo gautus rezultatus i masyva (rows)
            // $data = mysqli_fetch_assoc($results);
            // if( $data > 0 ) {
            //     // viskas gerai
            // } else {
            //     echo " NR: $id tokio  straipsnio neradome!!! <br>";
            // }
            // return $data;
      }
      $straipsnis = getArticle(2);
      echo "Straipsnio antraste:   " . $straipsnis['title'] . " <br />";


                //   function getArticle($id) { // get vienintele komanda kuri grazina komandas
                //     $sql = "SELECT *FROM articles
                //     WHERE id = $id";
                //   $connect = connect_DB();
                //   // $results = mysqli_fetch_assoc - suskaldo gautus rezultatus i masyva (rows)
                //   $results = mysqli_fetch_assoc($results);
                //   $data = mysqli_fetch_assoc($results); // mysqli_query - komanda paduota duombazei, vykdoma uzklausa !!!!!!
                //   if( $data > 0) {
                //     // viskas gerai
                //   } else {
                //   return $data
                // }
                // $Straipsnis = getArticle(3);
                //     echo "Straipsnio antraste:  " . $straipsnis[title] <br>";
                //   }

                function getArticles($straipsniuSkaicius = 9999 ) {
                           $sql = "SELECT  * FROM articles  LIMIT $straipsniuSkaicius";
                           $connect = connect_DB();
                           $results = mysqli_query($connect, $sql);

                           if( !$results) {
                             echo "Neapvyko rasti  straipsniu!!! ". mysqli_error($connect) . " <br>";
                          }  else {
                             // kadangi mums grista daug duomenu, juos reik sudalinti dalimis
                             // mysqli_num_rows - suskaldysime result'atus eilutemis ir  tikriname ar radome kazka pagal uzklausa
                             mysqli_num_rows($results);
                          }
                           return $results;
                     }
                     $visiStraipsniai = getArticles(4);

                     print_r($visiStraipsniai);
                     // $data = mysqli_fetch_assoc($results);


//                                     function getArticles($straipsniuSkaicius) { // get vienintele komanda kuri grazina komandas
//                                       $sql = "SELECT * FROM articles LIMIT
//                                       WHERE id = $id";
//                                     $connect = connect_DB();
//                                     // $results = mysqli_fetch_assoc - suskaldo gautus rezultatus i masyva (rows)
//                                     $data = mysqli_fetch_assoc($results); // mysqli_query - komanda paduota duombazei, vykdoma uzklausa !!!!!!
//
//                                     mysqli_fetch_row($results); // mysqli_fetch_row - paima sekanti masyva/nari is paduoto masyvo
//
//                                     if( $results ) {
//                                       echo "Straipsniu neradome !!!! " . mysql_error($connect) . "<br>";
//
//                                     } else {
//                                       // kazka radome
//                                   }
//                                   return $results;
//
//                                   $visiStraipsniai = getArticles(2);
//                                   print_r(visiStraipsniai);
//
// }
// function getArticlesByTittle($searchTerm) {
//            $sql = "SELECT * FROM Articles
//                     WHERE title like '%$searchTerm%' ";
//                                $connect = connect_DB();
//            $results = mysqli_query($connect, $sql);
//
//            if( !$results) {
//              echo "Nepavyko rasti  straipsniu!!! ". mysqli_error($connect) . " <br>";
//           }  else {
//              // kadangi mums grista daug duomenu, juos reik sudalinti dalimis
//              // mysqli_num_rows - suskaldysime result'atus eilutemis ir  tikriname ar radome kazka pagal uzklausa
//              mysqli_num_rows($results);
//           }
//            return $results;
//      }
//      $ieskomasStraipsnis = getArticlesByTittle("mankstos");
//
//      print_r($ieskomasStraipsnis);
//      // $data = mysqli_fetch_assoc($results);
//
//     //  $data = mysqli_num_rows($ieskomasStraipsnis);
//     //  echo "Radome. "


     function getArticlesByTittle($searchTerm) {
                $sql = "SELECT * FROM mankstosAkims
                         WHERE title like '1 PRATIMAS' ";
                $connect = connect_DB();
                $results = mysqli_query($connect, $sql);
                if( !$results) {
                  echo "Nepavyko rasti straipsnio!!! ". mysqli_error($connect) . " <br>";
               }  else {
                  // kadangi mums grista daug duomenu, juos reik sudalinti dalimis
                  // mysqli_num_rows - suskaldysime result'atus eilutemis ir  tikriname ar radome kazka pagal uzklausa
                  mysqli_num_rows($results);
               }
                return $results;
          }
          $ieskomasStraipsnis = getArticlesByTittle("akims");

          print_r($ieskomasStraipsnis);
          // $data = mysqli_fetch_assoc($results);

          $data = mysqli_num_rows($ieskomasStraipsnis);
          echo "Radome. "


 ?>
